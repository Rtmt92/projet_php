<?php
function route_request(){
    $route = $_SERVER['REQUEST_URI'];

    if ($route === "/home"){

        require_once('./DisplayTasks/controller.php');
        display_tasks();

        return;
    }
    if ($route === "/sign"){

        require_once('./inscription/controller.php');
        display_tasks();

        return;
    }
    if ($route === "/stream"){

        require_once('./streamsite/controller.php');
        display_tasks();

        return;
    }


    echo "<h1>404 NOT FOUND</h1>";

}
route_request();