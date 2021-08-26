<?php

namespace App\Generator;

use App\Configuration\BasicCodeConfig;
use App\Configuration\Config;

class Generator implements GeneratorInterface
{

    use BasicCodeConfig;

    /**
     * @var Config|null
     */
    private     ?Config $config;

    public function __construct(Config $config = null)
    {
        $this->config = $config;
    }

    /**
     * Generate code
     * @return string
     */
    public function generate(): string
    {
        if ($this->config === null){
            return $this->generateBasicCode();
        }else{
            return $this->generateConfigured();
        }
    }

    private function generateBasicCode(): string
    {
        $code = "";

        if (trim($this->prefix) != '')
            $code .= $this->prefix;

        for ($i = 0; $i < $this->length; $i++){
            $code .= str_shuffle($this->getCharList())[0];
        }

        if (trim($this->suffix) != '')
            $code .= $this->suffix;

        return $code;
    }

    private function getCharList(): string{
        $pattern = '';
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        if ($this->config == null){
            if ($this->withDigits)
                $pattern .= '0123456789';
            if ($this->withLetters){
                if($this->upperCase)
                    $pattern .= strtoupper($chars);
                if($this->lowerCase)
                    $pattern .= strtolower($chars);

                if($this->lowerCase == false and $this->upperCase == false){
                    $pattern .= strtolower($chars);
                }
            }
        }else{
            if ($this->config->isWithDigits())
                $pattern .= '0123456789';
            if ($this->config->isWithLetters()){
                if($this->config->isUpperCase())
                    $pattern .= strtoupper($chars);
                if($this->config->isLowerCase())
                    $pattern .= strtolower($chars);

                if($this->config->isLowerCase() == false and $this->config->isUpperCase() == false){
                    $pattern .= strtolower($chars);
                }
            }
        }
        return $pattern;
    }

    private function generateConfigured(): string
    {
        $code = "";

        if (trim($this->config->getPrefix()) != '')
            $code .= $this->config->getPrefix();

        for ($i = 0; $i < $this->config->getLength(); $i++){
            $code .= str_shuffle($this->getCharList())[0];
        }

        if (trim($this->config->getSuffix()) != '')
            $code .= $this->config->getSuffix();

        return $code;
    }
}
