<?php
use Illuminate\Support\Str;
use App\Models\Logs;

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


if (!function_exists('createLog')) {
    function createLog($modelID, $type, $name = '', $text = '', $params = [])
    {
        $log = new Logs();
        // Fill the attributes of the model
        $log->users_id = auth()->id(); // Assuming the user ID for the log
        $log->name = $name; // Assuming the user ID for the log
        $log->model_id = $modelID; // Assuming the related model ID for the log
        $log->type = $type; // Assuming the type of log
        $log->text = $text; // Assuming the text for the log
        $log->params = $params; // Assuming additional parameters for the log
        // Save the model to the database
        $log->save();
    }
}

?>
