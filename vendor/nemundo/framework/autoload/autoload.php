<?php

ini_set('error_prepend_string', '<pre>');
ini_set('error_append_string', '</pre>');


class Library
{

    /**
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $namespace;


    public function __construct(Autoloader $autoloader)
    {
        $autoloader->addLibrary($this);
    }

}


class Autoloader
{

    /**
     * @var Library[]
     */
    private $libraryList;


    public function __construct()
    {
        $this->register();
    }


    public function addLibrary(Library $library)
    {
        $this->libraryList[] = $library;
    }


    private function autoload($className)
    {

        foreach ($this->libraryList as $library) {

            $filename = $className;

            $prefix = $library->namespace . '\\';
            if (substr($filename, 0, strlen($prefix)) == $prefix) {
                $filename = substr($filename, strlen($prefix));
            }

            $filename = $library->source . $filename . '.php';
            $filename = str_replace('\\', DIRECTORY_SEPARATOR, $filename);
            $filename = str_replace('/', DIRECTORY_SEPARATOR, $filename);

            if (file_exists($filename)) {
                require_once($filename);
            }

        }
    }


    private function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

}
