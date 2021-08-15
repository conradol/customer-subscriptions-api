<?php

use Slim\App;

return function (App $app) {
    require __DIR__ . '/../src/routes/routes.php';
};

