<?php

namespace App\Utils;

class FlashMessage{
    
    public static function set(string $key, string $message):void{
        $_SESSION['flash'][$key] = $message;
    }

    public static function get(string $key): ?string{
        if (isset($_SESSION['flash'][$key])){
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }
        return null;
    }
}