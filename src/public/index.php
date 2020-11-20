<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = 'localhost';
$config['db']['user']   = 'root';
$config['db']['pass']   = '';
$config['db']['dbname'] = 'timtests';

class DemoMiddleware
{
	public function __invoke(Slim\Http\Request $request, \Slim\Http\Response $response, $next) {
		$response->write('<h1>Bienvenue</h1>');
		$response = $next($request, $response );
		$response->write('<h1>Bye bye</h1>');
		return $response;
	}
}

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$app = new \Slim\App(['settings' => $config]);
// Alter the request
$app->add(new DemoMiddleware());

$app->get('/', \App\Controllers\PagesController::class . ':home');

$app->get('/users', function (Request $request, Response $response) {    
    $mapper = new UserMapper($this->db);
    $users = $mapper->getUsers();

    $response->getBody()->write(var_export($tickets, true));
    return $response;
});

$app->run();