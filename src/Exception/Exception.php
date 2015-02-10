<?php

namespace yii_tc_pho\Exception;

abstract class Exception extends \Exception
{
    protected $type;

    /**
     * Returns the type of the exception. Either a string indicating the class
     * or the error constant.
     *
     * @return string The exception type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns a string containing the Exception type, message, filename and
     * line in human readable form for use by Reporters and the command line
     * runner.
     *
     * @return string A human readable description of the exception
     */
    public function __toString()
    {
        return "{$this->file}:{$this->line}\n" .
               "{$this->type} with message \"{$this->message}\"";
    }
}