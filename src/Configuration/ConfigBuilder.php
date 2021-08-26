<?php

namespace App\Configuration;

class ConfigBuilder
{
    /**
     * Length of Letters in the code
     * @var int
     */
    private int $length = 12;
    /**
     * Precise if the code will contain digits [0-9]
     * @var boolean
     */
    private bool $withDigits = true;
    /**
     * Precise if the code will contain letters [a-z]
     * @var boolean
     */
    private bool $withLetters = false;
    /**
     * Precise if the code will be in uppercase [A-Z|0-9]
     * @var boolean
     */
    private bool $upperCase = false;
    /**
     * Precise if the code will be in lowercase [a-z|0-9]
     * @var boolean
     */
    private bool $lowerCase = false;

    /**
     * Suffix of the code
     * @var string
     */
    private string $suffix = '';

    /**
     * Prefix on the code
     * @var string
     */
    private string $prefix = '';

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return ConfigBuilder
     */
    public function setLength(int $length): self
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return bool
     */
    public function getWithDigits(): bool
    {
        return $this->withDigits;
    }

    /**
     * @param bool $withDigits
     * @return ConfigBuilder
     */
    public function setWithDigits(bool $withDigits): self
    {
        $this->withDigits = $withDigits;
        return $this;
    }

    /**
     * @return bool
     */
    public function getWithLetters(): bool
    {
        return $this->withLetters;
    }

    /**
     * @param boolean $withLetters
     * @return ConfigBuilder
     */
    public function setWithLetters(bool $withLetters): self
    {
        $this->withLetters = $withLetters;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getUpperCase(): bool
    {
        return $this->upperCase;
    }

    /**
     * @param string $upperCase
     * @return ConfigBuilder
     */
    public function setUpperCase(string $upperCase): self
    {
        $this->upperCase = $upperCase;
        return $this;
    }

    /**
     * @return bool
     */
    public function getLowerCase(): bool
    {
        return $this->lowerCase;
    }

    /**
     * @param mixed $lowerCase
     * @return ConfigBuilder
     */
    public function setLowerCase($lowerCase): self
    {
        $this->lowerCase = $lowerCase;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    /**
     * @param string $suffix
     * @return ConfigBuilder
     */
    public function setSuffix(string $suffix): self
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return ConfigBuilder
     */
    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function build() : Config{
        return new Config($this);
    }
}
