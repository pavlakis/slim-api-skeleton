<?php

namespace MyApp\Action\Error;

use Crell\ApiProblem\ApiProblem;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;


class NotFoundAction
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
        $error = new ApiProblem("404 not found");
        $error->setType('resource');
        $error->setDetail("This is not the resource you're looking for...#waveofhand");

        return $response->withJson($error->asArray(), 404, JSON_PRETTY_PRINT);
    }
}