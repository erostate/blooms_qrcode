<?php

// USE
use \Symfony\Component\Routing\Route;
use \Symfony\Component\Routing\RouteCollection;
use \Symfony\Component\Routing\Matcher\UrlMatcher;
use \Symfony\Component\Routing\RequestContext;
use \Symfony\Component\Routing\Exception\ResourceNotFoundException;
use \Symfony\Component\Routing\Generator\UrlGenerator;

// Autoload file's call
require __DIR__ . "/vendor/autoload.php";

// Route
$homeRoute = new Route('/');
$redirectRoute = new Route('/{id}');

// Add route into collection
$collection = new RouteCollection();
$collection->add('home', $homeRoute);
$collection->add('redirect', $redirectRoute);

// Match link and route
$matcher = new UrlMatcher($collection, new RequestContext('', $_SERVER['REQUEST_METHOD']));

// Create link (Call this variable)
$generator = new UrlGenerator($collection, new RequestContext());

// Obtain PathInfo -> Current Page
$pathInfo = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Check if page exist
try {
    // Obtain Route info (Array)
    $currentRoute = $matcher->match($pathInfo);

    // Obtain current Route name
    $page = $currentRoute['_route'];

    echo $page;
    return;

    // Display page
    require_once "qrcode/$page.png";
} catch (ResourceNotFoundException $e) {
    // Display page Error : 404 Not Found
    require 'qrcode/error.png';
    return;
}