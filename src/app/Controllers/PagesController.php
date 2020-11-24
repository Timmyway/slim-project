<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface; 

class PagesController extends Controller
{
	public function home(RequestInterface $request, ResponseInterface $response) {		
		$response->getBody()->write('I am comming HOME');
	}

	public function b64(RequestInterface $request, ResponseInterface $response) {		
		$this->render($response, 'pages/b64.twig');
	}

	public function zc(RequestInterface $request, ResponseInterface $response) {		
		$this->render($response, 'pages/zc.twig');
	}

	public function contrastchecker(RequestInterface $request, ResponseInterface $response) {		
		$this->render($response, 'pages/contrastchecker.twig');
	}

	public function resources(RequestInterface $request, ResponseInterface $response) {		
		$this->render($response, 'pages/resources.twig');
	}

	public static function encodeEntities(RequestInterface $request, ResponseInterface $response, $max_textsize=50000)
	{
		$data = $request->getParsedBody();		
		if (strlen($data['str']) > $max_textsize) {
			return $response->withJson(array(
				'response' => 'The length of the text should not exceed ' . $max_textsize . ' characters.'
			), 500);
		}
		if ($data['mode'] == 'encode') {
			$string = str_replace(array("&lt;", "&gt;"), array("<", ">"), htmlentities($data['str'], ENT_NOQUOTES, 'UTF-8', FALSE));
			$response_as_array = array('response' => $string);
		} else {
			$response_as_array = array('response' => html_entity_decode($data['str']));
		}		
		return $response->withJson($response_as_array, 200);
	}

	public function convertIsolatin(RequestInterface $request, ResponseInterface $response) {
		$data = $request->getParsedBody();		
		$response_as_array = array('response' => IsoLatinTable::IsoLatinToUTF8($data['str']));
		return $response->withJson($response_as_array, 200);
	}
}

