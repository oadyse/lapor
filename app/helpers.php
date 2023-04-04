<?php

if (! function_exists('is_active_menu')) {
    function is_active_menu($active, $url) {
        return $active == $url ? 'active' : '';
    }
}