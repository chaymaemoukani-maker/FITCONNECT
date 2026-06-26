<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Repositories/AbonnementRepository.php';
require_once __DIR__ . '/../Services/AbonnementService.php';

class AbonnementController
{
    private $service;

    public function __construct()
    {
        $db = (new Database())->connect();

        $repository = new AbonnementRepository($db);

        $this->service = new AbonnementService($repository);
    }

    public function index()
    {
        $result = $this->service->getAll();

        require __DIR__ . '/../../views/abonnements/index.php';
    }

    public function create()
    {
        if(isset($_POST['ajouter']))
        {
            $success = $this->service->add(
                $_POST['type_abonnement'],
                $_POST['prix'],
                $_POST['date_debut'],
                $_POST['date_fin'],
                $_POST['statut'],
                $_POST['id_adherent']
            );

            if(!$success){
                echo "Cet adhérent possède déjà un abonnement actif.";
                return;
            }

            header("Location: index.php?module=abonnement");
            exit();
        }

        require __DIR__ . '/../../views/abonnements/ajouter.php';
    }

    public function edit($id)
    {
        if(isset($_POST['modifier']))
        {
            $this->service->update(
                $id,
                $_POST['type_abonnement'],
                $_POST['prix'],
                $_POST['date_debut'],
                $_POST['date_fin'],
                $_POST['statut']
            );

            header("Location: index.php?module=abonnement");
            exit();
        }

        $data = $this->service->getById($id);

        require __DIR__ . '/../../views/abonnements/modifier.php';
    }

    public function delete($id)
    {
        $this->service->delete($id);

        header("Location: index.php?module=abonnement");
        exit();
    }
}