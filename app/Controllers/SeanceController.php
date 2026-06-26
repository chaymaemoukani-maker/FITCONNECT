<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Repositories/SeanceRepository.php';
require_once __DIR__ . '/../Services/SeanceService.php';

class SeanceController
{
    private $service;

    public function __construct()
    {
        $db = (new Database())->connect();

        $repository = new SeanceRepository($db);

        $this->service = new SeanceService($repository);
    }

    public function index()
    {
        $result = $this->service->getAll();

        require __DIR__ . '/../../views/seances/index.php';
    }

    public function create()
    {
        if(isset($_POST['ajouter']))
        {
            $success = $this->service->add(
                $_POST['date_seance'],
                $_POST['duree'],
                $_POST['id_adherent'],
                $_POST['id_salle']
            );

            if(!$success)
            {
                echo "L'adhérent ne possède pas un abonnement valide.";
                return;
            }

            header("Location: index.php?module=seance");
            exit();
        }

        require __DIR__ . '/../../views/seances/ajouter.php';
    }

    public function edit($id)
    {
        if(isset($_POST['modifier']))
        {
            $this->service->update(
                $id,
                $_POST['date_seance'],
                $_POST['duree'],
                $_POST['id_salle']
            );

            header("Location: index.php?module=seance");
            exit();
        }

        $data = $this->service->getById($id);

        require __DIR__ . '/../../views/seances/modifier.php';
    }

    public function delete($id)
    {
        $this->service->delete($id);

        header("Location: index.php?module=seance");
        exit();
    }
}