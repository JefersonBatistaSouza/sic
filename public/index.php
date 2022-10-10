<?php
require_once '../../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

include  '../themes/header.php';

$page =  filter_input(1, 'page', FILTER_DEFAULT);

include '../themes/includes/form-login.php';
