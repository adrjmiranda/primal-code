<?php

require_once __DIR__ . '/../bootstrap.php';

require_once __DIR__ . '/../App/Routes/Users/main.php';
require_once __DIR__ . '/../App/Routes/Authors/main.php';

// API Routes

require_once __DIR__ . '/../App/Api/V1/Routes/main.php';

$router->run();