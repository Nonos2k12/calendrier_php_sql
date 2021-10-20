<?php

namespace App\Date;

class Month {

    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    private $month;
    private $year;

    public function __construct(int $month, int $year) {
        if ($month < 1 || $month > 12) {
            throw new \Exception("Le mois $month n'est pas valide");
        }

        if ($year < 1970) {
            throw new \Exception("L'année est inférieure à 1970");
        }

        $this->month = $month;
        $this->year = $year;
    }

    public function toString(): string {

    }
}


?>