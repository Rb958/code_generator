<?php

namespace App\Configuration;

trait BasicCodeConfig
{
    /**
     * Length of Letters in the code
     * @var int
     */
    protected $length = 12;
    /**
     * Precise if the code will contain digits [0-9]
     * @var boolean
     */
    protected $withDigits = true;
    /**
     * Precise if the code will contain letters [a-z]
     * @var boolean
     */
    protected $withLetters = false;
    /**
     * Precise if the code will be in uppercase [A-Z|0-9]
     * @var boolean
     */
    protected $upperCase = false;
    /**
     * Precise if the code will be in lowercase [a-z|0-9]
     * @var boolean
     */
    protected $lowerCase = false;

    /**
     * Suffix of the code
     * @var string
     */
    protected $suffix = '';

    /**
     * Prefix on the code
     * @var string
     */
    protected $prefix = '';
}