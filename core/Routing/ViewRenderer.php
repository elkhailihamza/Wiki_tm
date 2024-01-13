<?php

namespace core\Routing;
use app\Controller\Functions;

class ViewRenderer {
    public static function view($view, $data = []) {
        $data;
        require Functions::base_path($view);
    }
}