<?php

class functions {
    public static function dd($term) {
        echo'<br>';
        var_dump($term);
        echo'<br>';
        die();
    }
}