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


?>
