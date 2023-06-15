##@ [Application: QA]

PHP_QA_CONT= $(DOCKER_COMP) run --rm php_qa-runnner

# variables
CORES?=$(shell (nproc  || sysctl -n hw.ncpu) 2> /dev/null)

# constants
## files
ALL_FILES=./
APP_FILES=src/
TEST_FILES=tests/

# Tool CLI config
PHPCSFIXER_CMD=php-cs-fixer fix
PHPCSFIXER_ARGS=--dry-run
PHPCSFIXER_FILES=

PHPSTAN_CMD=phpstan analyse
PHPSTAN_ARGS=
PHPSTAN_FILES=$(APP_FILES)

PSALM_CMD=psalm
PSALM_ARGS=--config=psalm.xml
PSALM_FILES=

RECTOR_CMD=rector
RECTOR_ARGS=--dry-run
RECTOR_FILES=

# call with NO_PROGRESS=true to hide tool progress (makes sense when invoking multiple tools together)
NO_PROGRESS?=false
ifeq ($(NO_PROGRESS),true)
	PHPCSFIXER_ARGS+= --show-progress=none
	PHPSTAN_ARGS+= --no-progress
	PSALM_ARGS+= --no-progress
	RECTOR_ARGS+= --no-progress-bar
else
	PHPCSFIXER_ARGS+= --show-progress=dots
endif

# Use NO_PROGRESS=false when running individual tools.
# On  NO_PROGRESS=true  the corresponding tool has no output on success
#                       apart from its runtime but it will still print
#                       any errors that occured.
define execute
	if [ "$(NO_PROGRESS)" = "false" ]; then \
		eval "$(PHP_QA_CONT) $(1) $(2) $(3) $(4)"; \
	else \
		START=$$(date +%s); \
		printf "%-35s" "$@"; \
		if OUTPUT=$$(eval "$(PHP_QA_CONT) $(1) $(2) $(3) $(4)" 2>&1); then \
			printf " $(GREEN)%-6s$(NO_COLOR)" "done"; \
			END=$$(date +%s); \
			RUNTIME=$$((END-START)) ;\
			printf " took $(YELLOW)$${RUNTIME}s$(NO_COLOR)\n"; \
		else \
			printf " $(RED)%-6s$(NO_COLOR)" "fail"; \
			END=$$(date +%s); \
			RUNTIME=$$((END-START)) ;\
			printf " took $(YELLOW)$${RUNTIME}s$(NO_COLOR)\n"; \
			echo "$$OUTPUT"; \
			printf "\n"; \
			exit 1; \
		fi; \
	fi
endef

# -----
# Targets:

## —— CodeStyle ——————————————————————————————————
.PHONY: cs
cs: ## Run code style check
	@$(call execute,$(PHPCSFIXER_CMD),$(PHPCSFIXER_ARGS),$(PHPCSFIXER_FILES), $(ARGS))

.PHONY: cs_fix
cs_fix: ## Run code style fix
	@"$(MAKE)" -j $(CORES) -k --no-print-directory cs PHPCSFIXER_ARGS=

## —— Static analysis ——————————————————————————————————

.PHONY: phpstan
phpstan: ## Run PHPStan check
	@$(call execute,$(PHPSTAN_CMD),$(PHPSTAN_ARGS),$(PHPSTAN_FILES), $(ARGS))

.PHONY: psalm
psalm: ## Run Psalm check
	@$(call execute,$(PSALM_CMD),$(PSALM_ARGS),$(PSALM_FILES), $(ARGS))

.PHONY: rector
rector: ## Run Rector
	@$(call execute,$(RECTOR_CMD),$(RECTOR_ARGS),$(RECTOR_FILES), $(ARGS))

.PHONY: rector_fix
rector_fix: ## Run Rector in fix mode
	@"$(MAKE)" -j $(CORES) -k --no-print-directory rector RECTOR_ARGS=

.PHONY: qa
qa: ## Run code quality tools on all files
	@"$(MAKE)" -j $(CORES) -k --no-print-directory qa-exec NO_PROGRESS=true

.PHONY: qa-exec
qa-exec: cs \
	phpstan \
	psalm \
	rector \
