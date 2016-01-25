<?php

require('../vendor/autoload.php');
use Symfony\Component\HttpFoundation\Request;

define('TOKEN_URI', 'https://connect.stripe.com/oauth/token');
define('AUTH_URI',  'https://connect.stripe.com/oauth/authorize');

$dotenv = (new josegonzalez\Dotenv\Loader('../.env'))
  ->raiseExceptions(false)
  ->parse();

if ($dotenv) {
  $dotenv->toEnv();
}

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->get('/', function() use($app) {

  $data = array(
    'response_type' => 'code',
    'scope' => 'read_write',
    'client_id' => $_ENV['CLIENT_ID']
  );

  $query = http_build_query($data);
  $url = AUTH_URI . '?' . $query;

  return $app['twig']->render('index.twig', array(
    'connect_url' => $url
  ));

});

$app->get('/callback', function(Request $request) use($app) {

  if ($request->query->get('error')) {
    // For more fine-grained control inspect
    // $request->query->get('error'); here
    return $app['twig']->render('error.twig');
  }

  $data = array(
    'client_secret' => $_ENV['API_KEY'],
    'grant_type' => 'authorization_code',
    'code' => $request->query->get('code')
  );

  $opts = array(
    'http' => array(
      'method' => 'POST',
      'content' => http_build_query($data)
    )
  );

  $ctx    = stream_context_create($opts);
  $result = file_get_contents(TOKEN_URI, false, $ctx);

  if (!$result) {
    return $app['twig']->render('error.twig');
  }

  // Once here, the user has been connected and will appear in your Stripe account
  // Inspect $result to find out more, typically $result->stripe_user_id
  return $app['twig']->render('success.twig', array('result' => $result));

});

$app->run();
