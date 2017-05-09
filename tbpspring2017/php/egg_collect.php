<?php
// oAuth2 token, client ID
// HTTP requests to the coop API
include __DIR__.'/vendor/autoload.php';
use Guzzle\Http\Client;

// Guzzle created, our http client
// Download guzzle dependency through Composer
$http = new Client('http://coop.apps.knpuniversity.com', array(
	'request.options' => array(
		'exceptions' => false,
		)));

$request = $http->post('/token', null, array(
	'client_id' => '', # Need to find client ID token
	'client_secret' => '', # Need to find client secret token
	'grant_type' => 'client_credentials',
));

$response = $request->send();
$responseBody = $response->getBody(true);
# var_dump($responseBody);die;
$responseArr = json_decode($responseBody, true);
$accessToken = $responseArr['access-token'];

// Using the coop API
$request = $http->post('/api/2/eggs-collect');
// Client credentials
$request->addHeader('Authorization', 'Bearer ', $accessToken);	
### Replaced credentials with access token
$response = $request->send();

echo $response->getBody();

echo "\n\n";

/*
 *	To request client credentials, which allows access to token directly,
 *	requires a client secret (stored on a web server) that cannot be exposed.
 *	That's why grant types are important.
 */

?>
