<?php

class Abonnement
{
    public $id_abonnement;
    public $type_abonnement;
    public $prix;
    public $date_debut;
    public $date_fin;
    public $statut;
    public $id_adherent;

    public function __construct(
        $id_abonnement = null,
        $type_abonnement = null,
        $prix = null,
        $date_debut = null,
        $date_fin = null,
        $statut = null,
        $id_adherent = null
    ){
        $this->id_abonnement = $id_abonnement;
        $this->type_abonnement = $type_abonnement;
        $this->prix = $prix;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->statut = $statut;
        $this->id_adherent = $id_adherent;
    }
}
