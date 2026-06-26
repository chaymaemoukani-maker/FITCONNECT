<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Repositories/AdherentRepository.php';
require_once __DIR__ . '/../Services/AdherentService.php';

class AdherentController
{
    private $service;

    public function __construct()
    {
        $db = (new Database())->connect();

        $repository = new AdherentRepository($db);

        $this->service = new AdherentService($repository);
    }

    public function index()
    {
        $result = $this->service->getAll();

require __DIR__ . '/../../views/adherents/index.php';    }
public function create()
{
    $salles = $this->service->getSalles();
    if(isset($_POST['ajouter']))
    {
        $this->service->add(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['date_inscription'],
            $_POST['id_salle']
        );

        header("Location: index.php?module=adherent");
        exit();
    }

    require __DIR__ . '/../../views/adherents/ajouter.php';
}
public function edit($id)
{
    if(isset($_POST['modifier']))
    {
        $this->service->update(
            $id,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['id_salle']
        );

       header("Location: index.php?module=adherent");
        exit();
    }

    $data = $this->service->getById($id);

    require __DIR__ . '/../../views/adherents/modifier.php';
}
public function delete($id)
{
    $this->service->delete($id);

    header("Location: index.php?module=adherent");
    exit();
}
}