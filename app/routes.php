<?php
// Routes

use MyApp\Action\Error\NotFoundAction;
use MyApp\Action\Error\ServerErrorAction;

$app->get('/404', NotFoundAction::class . ':dispatch')
    ->setName('notfound');

$app->get('/oops', ServerErrorAction::class . ':dispatch')
    ->setName('server-error');