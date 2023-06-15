SHELL := bash
.SHELLFLAGS := -euo pipefail -c

OS?=$(shell uname)

MAKEFLAGS += --warn-undefined-variables
MAKEFLAGS += --no-builtin-rules

# Executables (local)
DOCKER_COMP = docker compose -f docker-compose.yaml -f docker-compose.dev.yaml
ifneq (,$(wildcard ./docker-compose.override.yaml))
    DOCKER_COMP := $(DOCKER_COMP) -f docker-compose.override.yaml
endif

# Docker containers
PHP_CONT = $(DOCKER_COMP) exec php
PHP_RUN_CONT = $(DOCKER_COMP) run --rm php

# Executables
PHP      = $(PHP_CONT) php
COMPOSER = $(PHP_RUN_CONT) composer
SYMFONY  = $(PHP_CONT) bin/console
ROAD_RUNNER  = $(PHP_CONT) rr

# Misc
.DEFAULT_GOAL = help

# Define common args variable
ARGS ?=

# bash colors
RED:=\033[0;31m
GREEN:=\033[0;32m
YELLOW:=\033[0;33m
NO_COLOR:=\033[0m

help:
	@awk 'BEGIN {FS = ":.*##"; printf "\n\033[1mUsage:\033[0m\n  make \033[36m<target>\033[0m\n"} /^[a-zA-Z0-9_-]+:.*?##/ { printf "  \033[36m%-40s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' Makefile .make/*.mk

##@ [Make]
## —— Docker ————————————————————————————————————
DOCKER_BUILD = $(DOCKER_COMP) build --pull
build: ## Builds the Docker images
	@$(DOCKER_BUILD)

rebuild: ## Builds the Docker images without cache
	@$(DOCKER_BUILD) --no-cache

up: ## Start the docker hub in detached mode (no logs)
	@$(DOCKER_COMP) up --detach

start: build up ## Build and start the containers

down: ## Stop the docker hub
	@$(DOCKER_COMP) down --remove-orphans

logs: ## Show live logs
	@$(DOCKER_COMP) logs --tail=0 --follow

sh: ## Connect to the PHP container
	@$(PHP_CONT) sh

run: ## Run the PHP container with command
	@$(eval c ?=)
	@$(PHP_RUN_CONT) $(c)

## —— Composer ————————————————————————————————————
composer: ## Run composer, pass the parameter "c=" to run a given command, example: make composer c='req symfony/orm-pack'
	@$(eval c ?=)
	@$(COMPOSER) $(c)

vendor: ## Install vendors according to the current composer.lock file
vendor: c=install --prefer-dist --no-dev --no-progress --no-scripts --no-interaction
vendor: composer

## —— Symfony —————————————————————————————————————
sf: ## List all Symfony commands or pass the parameter "c=" to run a given command, example: make sf c=about
	@$(eval c ?=)
	@$(SYMFONY) $(c)

cc: c=c:c ## Clear the cache
cc: sf

-include .make/*.mk
