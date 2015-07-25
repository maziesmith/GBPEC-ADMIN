<?php
/*
// initialize logger
include("logger.php");

$logger = new Logger(array(
    "file" => APP_PATH . "/logs/" . date("Y-m-d") . ".txt"
));

// log cache events

Framework\Events::add("Framework.cache.initialize.before", function($type, $options) use ($logger) {
    $logger->log("Framework.cache.initialize.before: " . $type);
});

Framework\Events::add("Framework.cache.initialize.after", function($type, $options) use ($logger) {
    $logger->log("Framework.cache.initialize.after: " . $type);
});

// log configuration events

Framework\Events::add("Framework.configuration.initialize.before", function($type, $options) use ($logger) {
    $logger->log("Framework.configuration.initialize.before: " . $type);
});

Framework\Events::add("Framework.configuration.initialize.after", function($type, $options) use ($logger) {
    $logger->log("Framework.configuration.initialize.after: " . $type);
});

// log controller events

Framework\Events::add("Framework.controller.construct.before", function($name) use ($logger) {
    $logger->log("Framework.controller.construct.before: " . $name);
});

Framework\Events::add("Framework.controller.construct.after", function($name) use ($logger) {
    $logger->log("Framework.controller.construct.after: " . $name);
});

Framework\Events::add("Framework.controller.render.before", function($name) use ($logger) {
    $logger->log("Framework.controller.render.before: " . $name);
});

Framework\Events::add("Framework.controller.render.after", function($name) use ($logger) {
    $logger->log("Framework.controller.render.after: " . $name);
});

Framework\Events::add("Framework.controller.destruct.before", function($name) use ($logger) {
    $logger->log("Framework.controller.destruct.before: " . $name);
});

Framework\Events::add("Framework.controller.destruct.after", function($name) use ($logger) {
    $logger->log("Framework.controller.destruct.after: " . $name);
});

// log database events

Framework\Events::add("Framework.database.initialize.before", function($type, $options) use ($logger) {
    $logger->log("Framework.database.initialize.before: " . $type);
});

Framework\Events::add("Framework.database.initialize.after", function($type, $options) use ($logger) {
    $logger->log("Framework.database.initialize.after: " . $type);
});

// log request events

Framework\Events::add("Framework.request.request.before", function($method, $url, $parameters) use ($logger) {
    $logger->log("Framework.request.request.before: " . $method . ", " . $url);
});

Framework\Events::add("Framework.request.request.after", function($method, $url, $parameters, $response) use ($logger) {
    $logger->log("Framework.request.request.after: " . $method . ", " . $url);
});

// log router events

Framework\Events::add("Framework.router.dispatch.before", function($url) use ($logger) {
    $logger->log("Framework.router.dispatch.before: " . $url);
});

Framework\Events::add("Framework.router.dispatch.after", function($url, $controller, $action, $parameters) use ($logger) {
    $logger->log("Framework.router.dispatch.after: " . $url . ", " . $controller . ", " . $action);
});

// log session events

Framework\Events::add("Framework.session.initialize.before", function($type, $options) use ($logger) {
    $logger->log("Framework.session.initialize.before: " . $type);
});

Framework\Events::add("Framework.session.initialize.after", function($type, $options) use ($logger) {
    $logger->log("Framework.session.initialize.after: " . $type);
});

// log view events

Framework\Events::add("Framework.view.construct.before", function($file) use ($logger) {
    $logger->log("Framework.view.construct.before: " . $file);
});

Framework\Events::add("Framework.view.construct.after", function($file, $template) use ($logger) {
    $logger->log("Framework.view.construct.after: " . $file);
});

Framework\Events::add("Framework.view.render.before", function($file) use ($logger) {
    $logger->log("Framework.view.render.before: " . $file);
});*/