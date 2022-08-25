<?php

if (!function_exists('menu_open') ) {
    function menu_open($uri, $output = 'menu-open')
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


