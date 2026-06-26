<?php

require_once "../app/Controllers/AdherentController.php";
require_once "../app/Controllers/AbonnementController.php";
require_once "../app/Controllers/SeanceController.php";

$module = $_GET['module'] ?? 'home';
$action = $_GET['action'] ?? 'list';

if($module == 'home')
{
    require "../views/home.php";
    exit;
}
switch($module)
{
    case 'abonnement':
        $controller = new AbonnementController();
        break;

    case 'seance':
        $controller = new SeanceController();
        break;

    default:
        $controller = new AdherentController();
        break;
}

switch($action)
{
    case 'create':
        $controller->create();
        break;

    case 'edit':
        $controller->edit($_GET['id']);
        break;

    case 'delete':
        $controller->delete($_GET['id']);
        break;

    default:
        $controller->index();
}