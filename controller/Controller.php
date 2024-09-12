<?php
require_once "../model/Database.php";
require_once "../model/Aircraft.php";

class Controller
{
    private $database;

    public function __construct()
    {
        $this->database = new Database("localhost", "root", "", "aeroporto");
    }

    public function registerAircraft($status, $model, $seats, $location)
    {
        $aircraft = new Aircraft($status, $model, $seats, $location);
        $this->database->insertAircraft($aircraft);
    }

    public function getAircrafts()
    {
        $aircrafts = $this->database->selectAircrafts();
        $elements = "<tr>";

        foreach($aircrafts as $aircraft) {
            $elements .= '<td>' . $aircraft["id"]. "</td>" .
            '<td>' . $aircraft["model"] . "</td>".
             '<td>' . $aircraft["status"] . "</td>".
            '<td>' . $aircraft["seats"] . "</td>".
            '<td>' . $aircraft["location"] . "</td>".
            "<td> <a href='./process.php?id=".$aircraft["id"]."'>X</a> </td>";
            $elements .= "</tr>";
        }

        return $elements;
    }

    public function getFilteredAircrafts(string $model) {
        $aircrafts = $this->database->getAircraftByModel($model);
        $elements = "<tr>";

        foreach($aircrafts as $aircraft) {
            $elements .= '<td>' . $aircraft["id"]. "</td>" .
            '<td>' . $aircraft["model"] . "</td>".
             '<td>' . $aircraft["status"] . "</td>".
            '<td>' . $aircraft["seats"] . "</td>".
            '<td>' . $aircraft["location"] . "</td>". 
            "<td> <a href='./process.php?id=".$aircraft["id"]."'>X</a> </td>";
            $elements .= "</tr>";
        }

        return $elements;
    }

    public function deleteAircraft(int $id) {
        $this->database->deleteAircraftById($id);
    }
}
