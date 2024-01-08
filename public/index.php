<?php

include_once __DIR__ . "/./functions.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
functions::dd($uri);
