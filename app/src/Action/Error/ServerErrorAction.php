<?php

namespace MyApp\Action\Error;


use Crell\ApiProblem\ApiProblem;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class ServerErrorAction
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * NotFoundAction constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function dispatch(Request $request, Response $response, $args) : Response
    {
        $error = new ApiProblem("500");
        $error->setType('resource');
        $error->setDetail("Oops... This should not have happened. Have a coffee and come back later...");

        return $response->withJson($error->asArray(), 500, JSON_PRETTY_PRINT);
    }
}