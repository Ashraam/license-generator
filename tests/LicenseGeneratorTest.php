<?php

use Ashraam\LicenseGenerator\LicenseGenerator;

test('generates a license key with default template', function () {
    $generator = new LicenseGenerator();
    $key = $generator->generateOne();
    expect($key)->toMatch('/^[A-Z]{4}-[0-9]{4}-[A-Z][0-9][A-Z][0-9]-[0-9]{2}[A-Z]{2}$/');
});

test('generates a license key with a custom template', function () {
    $generator = new LicenseGenerator();
    $key = $generator->template('9999-XXXX')->generateOne();
    expect($key)->toMatch('/^[0-9]{4}-[A-Z]{4}$/');
});

test('generates a license key with a prefix', function () {
    $generator = new LicenseGenerator();
    $key = $generator->prefix('PRE-')->generateOne();
    expect($key)->toStartWith('PRE-')
        ->and(substr($key, 4))->toMatch('/^[A-Z]{4}-[0-9]{4}-[A-Z][0-9][A-Z][0-9]-[0-9]{2}[A-Z]{2}$/');
});

test('generates a lower case license key', function () {
    $generator = new LicenseGenerator();
    $key = $generator->lowerCase()->generateOne();
    expect($key)->toMatch('/^[a-z]{4}-[0-9]{4}-[a-z][0-9][a-z][0-9]-[0-9]{2}[a-z]{2}$/');
});

test('generates an upper case license key after lowerCase()', function () {
    $generator = new LicenseGenerator();
    $key = $generator->lowerCase()->upperCase()->generateOne();
    expect($key)->toMatch('/^[A-Z]{4}-[0-9]{4}-[A-Z][0-9][A-Z][0-9]-[0-9]{2}[A-Z]{2}$/');
});

test('generates multiple unique license keys', function () {
    $generator = new LicenseGenerator();
    $keys = $generator->generate(10);
    expect($keys)->toBeArray()
        ->and(count($keys))->toBe(10)
        ->and(count(array_unique($keys)))->toBe(10);
});

test('returns a single key as string when count is 1', function () {
    $generator = new LicenseGenerator();
    $result = $generator->generate(1);
    expect($result)->toBeString();
});

test('returns an array of keys when count > 1', function () {
    $generator = new LicenseGenerator();
    $result = $generator->generate(3);
    expect($result)->toBeArray()
        ->and(count($result))->toBe(3);
});
