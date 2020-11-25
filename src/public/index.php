<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

class DemoMiddleware
{
	public function __invoke(Slim\Http\Request $request, \Slim\Http\Response $response, $next) {
		$response->write('<h1>Bienvenue</h1>');
		$response = $next($request, $response );
		$response->write('<h1>Bye bye</h1>');
		return $response;
	}
}

$settings = [
    'session' => [
        // Session cookie settings
        'name'           => 'slim_session',
        'lifetime'       => 24,
        'path'           => '/',
        'domain'         => null,
        'secure'         => false,
        'httponly'       => true,

        // Set session cookie path, domain and secure automatically
        'cookie_autoset' => true,

        // Path where session files are stored, PHP's default path will be used if set null
        'save_path'      => null,

        // Session cache limiter
        'cache_limiter'  => 'nocache',

        // Extend session lifetime after each user activity
        'autorefresh'    => false,

        // Encrypt session data if string is set
        'encryption_key' => null,

        // Session namespace
        'namespace'      => 'slim_app'
    ]
];

$settings['displayErrorDetails'] = true;
$settings['addContentLengthHeader'] = false;

$settings['db']['host']   = 'localhost';
$settings['db']['user']   = 'root';
$settings['db']['pass']   = '';
$settings['db']['dbname'] = 'timtests';

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

// create APP INSTANCE
$app = new \Slim\App(['settings' => $settings]);

require('../app/container.php');

// Add MIDLEWARE
/** Csrf */
// $app->add($app->getContainer()->get('csrf'));
/** Session */
$app->add(new \Adbar\SessionMiddleware($container->get('settings')['session']));
// $app->add(new DemoMiddleware());

// Set ROUTES
$app->get('/', \App\Controllers\PagesController::class . ':home')->setName('home');
$app->get('/b64', \App\Controllers\PagesController::class . ':b64')->setName('b64');
$app->get('/zc', \App\Controllers\PagesController::class . ':zc')->setName('zc');
$app->get('/contact', \App\Controllers\PagesController::class . ':contact')->setName('contact');
$app->post('/contact', \App\Controllers\PagesController::class . ':postContact');
$app->get('/contrastchecker', \App\Controllers\PagesController::class . ':contrastchecker')->setName('contrastchecker');
$app->get('/resources', \App\Controllers\PagesController::class . ':resources')->setName('resources');
$app->post('/api/hentities', \App\Controllers\PagesController::class . ':encodeEntities');
$app->post('/api/isolatin', \App\Controllers\PagesController::class . ':convertIsolatin');

// $app->get('/users', function (Request $request, Response $response) {    
//     $mapper = new UserMapper($this->db);
//     $users = $mapper->getUsers();

//     $response->getBody()->write(var_export($tickets, true));
//     return $response;
// });

$app->run();