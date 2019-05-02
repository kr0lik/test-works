<?php
namespace app\exception;

class CommandNotExistException extends \Exception
{
    protected $message = 'Unknown command';
}