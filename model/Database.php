<?php

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

    public function connectDB()
    {
        $connection = mysqli_connect($this->host, $this->login, $this->password, $this->database);
        return ($connection);
    }

    public function insertAircraft($aircraft)
    {
        $connection = $this->connectDB();
        $query = "INSERT INTO aircraft (status, model, seats, location) VALUES ('" . $aircraft->getStatus() . "', '" . $aircraft->getModel() . "', '" . $aircraft->getSeats() . "', '" . $aircraft->getLocation() . "')";
        mysqli_query($connection, $query);
    }

    public function selectAircrafts()
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM aircraft";
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    public function getAircraftByModel($model)
    {
        $connection = $this->connectDB();
        $query = "SELECT * FROM aircraft WHERE model LIKE '%" . $model . "%'";
        $result = mysqli_query($connection, $query);
        return ($result);
    }

    public function deleteAircraftById($id)
    {
        $connection = $this->connectDB();
        $query = "DELETE FROM aircraft WHERE id = " . $id;
        mysqli_query($connection, $query);
    }
}
