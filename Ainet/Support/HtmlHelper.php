<?php namespace Ainet\Support;

class HtmlHelper
{
    public static function e($raw)
    {
        return htmlspecialchars($raw, ENT_QUOTES, 'UTF-8');
    }

    public static function error($key, $errors)
    {
        if ($errors && array_key_exists($key,$errors)) {
            return '<span class="error">'.$errors[$key].'</span>';
        }
    }
}