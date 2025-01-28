<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->ignoreDotFiles(false)
    ->ignoreVCSIgnored(true)
    ->exclude(['vendor'])
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
$config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHPUnit75Migration:risky' => true,
        '@PSR12' => true,
        'no_unused_imports' => true,
        'heredoc_indentation' => false,
        'use_arrow_functions' => false,
        'array_syntax' => ['syntax' => 'short'],
        'declare_strict_types' => true,
    ])
    ->setLineEnding("\n")
    ->setFinder($finder)
;

return $config;
