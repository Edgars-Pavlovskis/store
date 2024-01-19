<?php
use Illuminate\Support\Str;

if (!function_exists('convertToLatin')) {
    function convertToLatin($string)
    {
        $transliteratedString = Str::slug($string, '-');
        // Remove special characters and spaces
        $urlFriendlyString = preg_replace('/[^a-z0-9\-]/', '', $transliteratedString);
        return $urlFriendlyString;
    }
}


if (!function_exists('defaultLocaleActive')) {
    function defaultLocaleActive()
    {
        return (app()->getLocale() == app('config')->get('shop')['languages']['default']);
    }
}


if (!function_exists('getLocalesWithoutDefault')) {
    function getLocalesWithoutDefault()
    {
        return array_diff( app('config')->get('shop')['languages']['list'], array(app('config')->get('shop')['languages']['default']) );
    }
}

if (!function_exists('getDefaultLocale')) {
    function getDefaultLocale()
    {
        return app('config')->get('shop')['languages']['default'];
    }
}

if (!function_exists('getLocales')) {
    function getLocales()
    {
        return app('config')->get('shop')['languages']['list'];
    }
}

?>
