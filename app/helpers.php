<?php

use App\Models\CMS\Locale;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return \App\Models\Setting::where('key', $key)->value('value') ?? $default;
    }
}


if (!function_exists('active_locals')) {
    function active_locals(){
        return Locale::pluck('code')->toArray() ?? ['en'];
    }
}

if(!function_exists("convertStringToSlug"))
{
    function convertStringToSlug($string)
    {
        // Remove HTML tags and get plain text content
        $string = strip_tags($string);
        // Remove '&nbsp;' entity
        $string = str_replace('&nbsp;', ' ', $string);

        // Convert to lowercase and remove leading/trailing whitespaces
        $trimmedText = strtolower(trim($string));

        // Replace non-alphanumeric characters with hyphens
        $trimmedText = preg_replace('/[^a-z0-9]+/', '-', $trimmedText);

        // Remove consecutive hyphens
        $trimmedText = preg_replace('/-+/', '-', $trimmedText);

        // Remove leading and trailing hyphens
        $trimmedText = trim($trimmedText, '-');

        return $trimmedText;
    }
}
