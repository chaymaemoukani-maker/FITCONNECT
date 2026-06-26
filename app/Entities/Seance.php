<?php

class Seance
{
    public $id_seance;
    public $date_seance;
    public $duree;
    public $id_adherent;
    public $id_salle;
    public $id_activite;
    public $id_equipement;

    public function __construct(
        $id_seance = null,
        $date_seance = null,
        $duree = null,
        $id_adherent = null,
        $id_salle = null,
        $id_activite = null,
        $id_equipement = null
    ){
        $this->id_seance = $id_seance;
        $this->date_seance = $date_seance;
        $this->duree = $duree;
        $this->id_adherent = $id_adherent;
        $this->id_salle = $id_salle;
        $this->id_activite = $id_activite;
        $this->id_equipement = $id_equipement;
    }
}