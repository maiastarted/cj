<?php

namespace helpers;

class Environment
{
    /**
     * This method load all group variables from environment.ini file based in
     * global var "ENVIRONMENT".
     * 
     * @see environment.ini
     */
    public static function load()
    {
        $path = dirname(__DIR__);

        $parsed = parse_ini_file($path . '/.env', true);

        $_ENV['ENVIRONMENT'] = $parsed['ENVIRONMENT'];

        foreach ($parsed[$parsed['ENVIRONMENT']] as $key => $value) {
            $_ENV[$key] = $value;
        }
    }
}
