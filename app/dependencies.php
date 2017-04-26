<?php
// DIC configuration

use MyApp\Action\Error\NotFoundAction;
use Slim\Http\Request;
use Slim\Http\Response;

$container = $app->getContainer();

$container['notFoundHandler'] = function ($c) {

    return function (Request $request, Response $response) use ($c) {

        return $response
            ->withStatus(404)
            ->withRedirect('/404');
    };
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\ErrorLogHandler(0, $settings['level']));
    return $logger;
};

// see example at: http://blog.sub85.com/slim-3-with-doctrine-2.html
$container['em'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return \Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};

// Actions
$container[NotFoundAction::class] = function ($c) {
    return new \MyApp\Action\Error\NotFoundAction($c['logger']);
};