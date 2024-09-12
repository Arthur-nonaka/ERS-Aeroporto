<?php
require_once "../model/Database.php";
require_once "../model/Aircraft.php";

/**
 * Class Controller
 * 
 * Class used to controll the function of the model entitys
 * 
 * @author Arthur Nonaka Oda
 */
class Controller
{
    private $database;

    public function __construct()
    {
        $this->database = new Database("localhost", "root", "", "aeroporto");
    }

    /**
     * Register an aircraft into the database
     *
     * @param string $status
     * @param string $model
     * @param int $seats
     * @param string $location
     * 
     * @author Arthur Nonaka Oda
     */
    public function registerAircraft($status, $model, $seats, $location)
    {
        $aircraft = new Aircraft($status, $model, $seats, $location);
        $this->database->insertAircraft($aircraft);
    }

    /**
     * Get all aircrafts of the database
     *
     * @return string Show a table with aircrafts
     * 
     * @author Arthur Nonaka Oda
     */
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

    /**
     * Filter the aircrafts in database based on a search
     *
     * @param string $model
     * @return string Show a table with the filtered aircrafts
     * 
     * @author Arthur Nonaka Oda
     */
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

    /**
     * Delete an especific aircraft of database
     *
     * @param integer $id
     * 
     * @author Arthur Nonaka Oda
     */
    public function deleteAircraft(int $id) {
        $this->database->deleteAircraftById($id);
    }
}
