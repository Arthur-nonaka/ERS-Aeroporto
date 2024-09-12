<?php

/**
 * Class Database
 * 
 * Used to execute functions
 * 
 * @author Matheus Mendes dos Santos
 */
class Database
{
    private $host;
    private $login;
    private $password;
    private $database;

    public function __construct($host, $login, $password, $database)
    {
        $this->host = $host;
        $this->login = $login;
        $this->password = $password;
        $this->database = $database;
    }

    /**
     * Connects to the database
     * 
     * @author Matheus Mendes dos Santos
     * @return mysqli connection
     */

    public function connectDB()
    {
        $connection = mysqli_connect($this->host, $this->login, $this->password, $this->database);
        return ($connection);
    }

    /**
     * Inserts an aircraft into the database
     * 
     * @author Matheus Mendes dos Santos
     * 
     * @param string aircraft has the aircrafts objects
     */

    public function insertAircraft($aircraft)
    {
        $connection = $this->connectDB();
        $query = "INSERT INTO aircraft (status, model, seats, location) VALUES ('" . $aircraft->getStatus() . "', '" . $aircraft->getModel() . "', '" . $aircraft->getSeats() . "', '" . $aircraft->getLocation() . "')";
        mysqli_query($connection, $query);
    }


    /**
     * Selects all aircrafts from the database
     * 
     * @author Matheus Mendes dos Santos
     * 
     * @return string return all aircrafts
     */
    public function selectAircrafts()
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM aircraft";
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    /**
     * Selects an aircraft by its model
     * 
     * @author Matheus Mendes dos Santos
     * 
     * @param string model
     * @return string all aircraft where model has the searched string
     */

    public function getAircraftByModel($model)
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM aircraft WHERE model LIKE '%" . $model . "%'";
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    /**
     * Deletes an aircraft by its id
     * 
     * @author Matheus Mendes dos Santos
     * 
     * @param int id 
     */
    public function deleteAircraftById($id)
    {
        $connection = $this->connectDB();
        $query = "DELETE FROM aircraft WHERE id = " . $id;
        mysqli_query($connection, $query);
    }

    /**
     * Updates an aircraft by its id
     * 
     * @author Matheus Mendes dos Santos
     * 
     * @param int id
     * @param string status
     * @param string model
     * @param int seats
     * @param string location
     * 
     * @return string all aircraft where model has the searched string
     */

    public function updateAircraftById($aircraft, $id)
    {
        $connection = $this->connectDB();
        $query = "UPDATE aircraft SET status = '" . $aircraft->getStatus() . "', model = '" . $aircraft->getModel() . "', seats = '" . $aircraft->getSeats() . "', location = '" . $aircraft->getLocation() . "' WHERE id = " . $id;
        mysqli_query($connection, $query);
    }
}
