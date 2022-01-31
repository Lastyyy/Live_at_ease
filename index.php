<?php

require 'Routing.php';

$name = "Szymon";

$path = trim($_SERVER['REQUEST_URL'], '/');
echo "Hi";

Router::run($path);