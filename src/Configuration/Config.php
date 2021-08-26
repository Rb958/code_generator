<?php

namespace App\Configuration;

 class Config
{
    /**
     * Length of Letters in the code
     * @var int
     */
    protected int $length = 12;
    /**
     * Precise if the code will contain digits [0-9]
     * @var boolean
     */
    protected bool $withDigits = true;
    /**
     * Precise if the code will contain letters [a-z]
     * @var boolean
     */
    protected bool $withLetters = false;
    /**
     * Precise if the code will be in uppercase [A-Z|0-9]
     * @var boolean
     */
    protected bool $upperCase = false;
    /**
     * Precise if the code will be in lowercase [a-z|0-9]
     * @var boolean
     */
    protected bool $lowerCase = false;

    /**
     * Suffix of the code
     * @var string|null
     */
    protected ?string $suffix = '';

    /**
     * Prefix on the code
     * @var string|null
     */
    protected ?string $prefix = '';

    public function __construct(ConfigBuilder $builder = null)
    {
        if($builder!= null) {
            $this->length = $builder->getLength();
            $this->withDigits = $builder->getWithDigits();
            $this->withLetters = $builder->getWithLetters();
            $this->upperCase = $builder->getUpperCase();
            $this->lowerCase = $builder->getLowerCase();
            $this->suffix = $builder->getSuffix();
            $this->prefix = $builder->getPrefix();
        }
    }

    /**
     * @return int
     */
    public function getLength(): ?int
    {
        return $this->length;
    }

    /**
     * @return bool
     */
    public function isWithDigits(): ?bool
    {
        return $this->withDigits;
    }

    /**
     * @return bool
     */
    public function isWithLetters(): ?bool
    {
        return $this->withLetters;
    }

    /**
     * @return bool
     */
    public function isUpperCase(): ?bool
    {
        return $this->upperCase;
    }

    /**
     * @return bool
     */
    public function isLowerCase(): ?bool
    {
        return $this->lowerCase;
    }

    /**
     * @return string
     */
    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    /**
     * @return string
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }
}