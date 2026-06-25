# FitConnect

## Description

Application de gestion d'une salle de sport développée en PHP et MySQL.

## Architecture

* MVC
* Repository Pattern
* Service Layer

## Modules

* Gestion des adhérents
* Gestion des abonnements
* Gestion des séances

## Règles métier

* Un adhérent ne peut avoir qu'un seul abonnement actif.
* Une séance ne peut être enregistrée que si l'abonnement est valide.
* Suppression d'un adhérent interdite s'il possède un abonnement actif ou des séances.

## Technologies

* PHP 8
* MySQL
* Bootstrap 5
* Git & GitHub
