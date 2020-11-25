<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * 
 */
class Controller
{
	
	private $container;

	public function __construct($container) {		
		$this->container = $container;
	}

	public function render(ResponseInterface $response, $file, $params=[])
	{
		$this->container->view->render($response, $file, $params);
	}

	public function mailer()
	{
		return $this->container->mailer;
	}

	public function flash($message, $type='success')
	{
		if (isset($_SESSION['flash'])) {
			$_SESSION['flash'] = [];
		}
		return $_SESSION['flash'][$type] = $message;
	}

	public function redirect($response, $name) {
		return $response->withStatus(302)->withHeader('Location', $this->container->router->pathFor($name));
	}
}