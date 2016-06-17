<?php


class Redirect
{
    public static function to(String $url)
    {
        header('Location: '+url);
        exit();
    }
}