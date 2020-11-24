<?php
$container = $app->getContainer();

$container['view'] = function ($container) {
	$dir = dirname(__DIR__);	
    $view = new \Slim\Views\Twig($dir . '/app/views', [
        'cache' => false //$dir . 'tmp/cache'
    ]);
    $view->getEnvironment()->addGlobal('current_uri', $container['request']->getUri());

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    // $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};