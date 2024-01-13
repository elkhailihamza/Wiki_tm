<?php

namespace core\Routing;
use core\Routing\functions;

class ViewRenderer {
    public static function view($view, $data = []) {
        $data;
        require functions::base_path($view);
    }
}