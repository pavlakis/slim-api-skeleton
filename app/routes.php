<?php
// Routes

use MyApp\Action\Error\NotFoundAction;

$app->get('/404', NotFoundAction::class . ':dispatch')
    ->setName('notfound');