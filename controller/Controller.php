<?php
require_once "./model/Database.php";

class Controller
{
    private $dataBase;

    public function __construct()
    {
        $this->dataBase = new Database("localhost", "root", "", "aeroporto");
    }

    public function registerAircraft($status, $model, $seats, $location)
    {
        $aircraft = new Aircraft($status, $model, $seats, $location);
        $this->dataBase->insertAircraft($aircraft);
    }
}
