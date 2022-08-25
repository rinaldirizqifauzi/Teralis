<?php

if (!function_exists('filter-active') ) {
    function filter_active($uri, $output = 'filter-active')
    {
     if (is_array($uri)) {
        foreach ($uri  as $u) {
            if(Route::is($u)){
                return $output;
            }
        }

     } else {
        if(Route::is($uri)){
            return $output;
        }
     }

    }
}
