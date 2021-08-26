<?php

namespace App\Tests\Generator;

use App\Configuration\ConfigBuilder;
use App\Generator\Generator;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{

    /**
     * Default Config
     */
    public function testGenerate()
    {
        $config = (new ConfigBuilder())->build();

        $pattern = "/^[0-9]{12}$/i";
        $generatedCode = (new Generator($config))->generate();
        self::assertEquals(1,preg_match($pattern, $generatedCode), "Generated code : ". $generatedCode);
    }

    public function testGenerateMixedLower()
    {
        $config = (new ConfigBuilder())
            ->setLength(12)
            ->setWithDigits(true)
            ->setWithLetters(true)
            ->setLowerCase(true)
            ->build();

        $pattern = "/^[a-z0-9]{12}$/i";
        $generatedCode = (new Generator($config))->generate();
        self::assertEquals(1,preg_match($pattern, $generatedCode), "Generated code : ". $generatedCode);
    }

    public function testGenerateMixed()
    {
        $config = (new ConfigBuilder())
            ->setLength(12)
            ->setWithDigits(true)
            ->setWithLetters(true)
            ->setLowerCase(true)
            ->setUpperCase(true)
            ->build();

        $pattern = "/^[a-zA-Z0-9]{12}$/i";
        $generatedCode = (new Generator($config))->generate();
        self::assertEquals(1,preg_match($pattern, $generatedCode), "Generated code : ". $generatedCode);
    }

    public function testGeneratePrefixed()
    {
        $config = (new ConfigBuilder())
            ->setPrefix("ABC")
            ->build();

        $pattern = "/^ABC[0-9]{12}$/i";
        $generatedCode = (new Generator($config))->generate();
        self::assertEquals(1,preg_match($pattern, $generatedCode), "Generated code : ". $generatedCode);
    }

    public function testGeneratePrefixedFailed()
    {
        $config = (new ConfigBuilder())
            ->setPrefix("ABC")
            ->build();

        $pattern = "/^CBA[0-9]{12}$/i";
        $generatedCode = (new Generator($config))->generate();
        self::assertEquals(0,preg_match($pattern, $generatedCode), "Generated code : ". $generatedCode);
    }

    public function testGenerateSuffixed()
    {
        $config = (new ConfigBuilder())
            ->setSuffix("XYZ")
            ->build();

        $pattern = "/^[0-9]{12}XYZ$/i";
        $generatedCode = (new Generator($config))->generate();
        self::assertEquals(1,preg_match($pattern, $generatedCode), "Generated code : ". $generatedCode);
    }

    public function testGenerateSuffixedFailed()
    {
        $config = (new ConfigBuilder())
            ->setSuffix("XYZ")
            ->build();

        $pattern = "/^[0-9]{12}ZYX$/i";
        $generatedCode = (new Generator($config))->generate();
        self::assertEquals(0,preg_match($pattern, $generatedCode), "Generated code : ". $generatedCode);
    }
}
