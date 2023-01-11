<?php


class ErrorHandler
{
    public static function renderError($error)
    {
        require_once 'assets\Views\Errors.php';
    }
}