<?php

class Adherent
{
    public $id_adherent;
    public $nom;
    public $prenom;
    public $email;
    public $password;
    public $telephone;
    public $date_inscription;
    public $id_salle;

    public function __construct(
        $id_adherent = null,
        $nom = null,
        $prenom = null,
        $email = null,
        $password = null,
        $telephone = null,
        $date_inscription = null,
        $id_salle = null
    ){
        $this->id_adherent = $id_adherent;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->date_inscription = $date_inscription;
        $this->id_salle = $id_salle;
    }
}