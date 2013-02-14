<?php

/**
 * Set up very simple env
 */
define('BASEDIR', __DIR__);

class GeneralException extends Exception { }

spl_autoload_register(function ($class) {
            $filename = realpath(BASEDIR . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . strtolower(str_replace('_', DIRECTORY_SEPARATOR, $class)) . '.php');
            if ($filename)
                include($filename);
            else
                throw new GeneralException('Can not find file ' . $class);
        });

