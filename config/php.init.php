<?php

define('SITE_MODE', call_user_func(function(){
    $host = ((isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : '');
    if(in_array($host,['DOMAIN_NAME','DOMAIN_NAME'])) {
        return 'live';
    }
    return 'dev';
}));

## ICL_LANGUAGE_CODE
load_theme_textdomain('THEME_NAME_LANGUAGE', get_template_directory() . '/languages');

function _t($text, $covert = TRUE) {
    $message = __($text, 'THEME_NAME_LANGUAGE');
    return ($covert == TRUE) ? htmlspecialchars($message, ENT_QUOTES) : addslashes($message);
}
