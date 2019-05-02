<?php
namespace app\exception;

class DirectionNotExistException extends \Exception
{
    protected $message = 'Unknown direction';
}