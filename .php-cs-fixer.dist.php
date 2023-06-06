<?php

$finder = PhpCsFixer\Finder::create()
//    ->exclude('somedir')
//    ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__ . '/src');

$config = new PhpCsFixer\Config();
$config->setCacheFile(__DIR__.'/var/.php-cs-fixer.cache');

return $config->setRules([
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        'strict_param' => true,
        'declare_strict_types' => true,
        'array_syntax' => ['syntax' => 'short'],
        'concat_space' => ['spacing' => 'one']
    ])
    ->setFinder($finder)
;
