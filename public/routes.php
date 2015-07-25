<?php
// define routes
$routes = array(
        array(
        "pattern" => "index",
        "controller" => "home",
        "action" => "index"
    ),
        array(
        "pattern" => "academics",
        "controller" => "academics",
        "action" => "index"
    ),
        array(
        "pattern" => "academics/myProfile",
        "controller" => "academics",
        "action" => "index"
    ),
        array(
        "pattern" => "academics/studentProfile",
        "controller" => "academics",
        "action" => "studentProfile"
    ),
        array(
        "pattern" => "accounts",
        "controller" => "accounts",
        "action" => "index"
    ),
        array(
        "pattern" => "accounts/profile",
        "controller" => "academics",
        "action" => "index"
    ),
        array(
        "pattern" => "logout",
        "controller" => "home",
        "action" => "logout"
    ),
        array(
        "pattern" => "academics/tDirectory", 
        "controller" => "academics", 
        "action" => "tDirectory"
    ),
        array(
        "pattern" => "academics/Export", 
        "controller" => "academics", 
        "action" => "exportCenter"
    ),
        array(
        "pattern" => "academics/Exam", 
        "controller" => "academics", 
        "action" => "Exam"
    ),
        array(
        "pattern" => "logout",
        "controller" => "home",
        "action" => "logout"
    ),
        array(
        "pattern" => "library",
        "controller" => "library",
        "action" => "index"
    ),
        array(
        "pattern" => "libray/profile",
        "controller" => "library",
        "action" => "profile"
    ),
        array(
        "pattern" => "libray/books",
        "controller" => "library",
        "action" => "books"
    ),
        array(
        "pattern" => "libray/newBook",
        "controller" => "library",
        "action" => "newBook"
    ),
        array(
        "pattern" => "academics/Workdesk/Noticepad",
        "controller" => "academics",
        "action" => "updatenotice"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);

?>