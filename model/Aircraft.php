<?php
/**
 * Class Aircraft 
 * 
 * An entity class that has model,status,seats,location
 * 
 * @author Arthur Nonaka Oda
 */
class Aircraft {
    private string $status;
    private string $model;
    private int $seats;
    private string $location;
    
    /**
     * Aircraft constructor.
     *
     * Initializes a new Aircraft object with the provided status, model, seats and location.
     *
     * @param string $status The status of the aircraft.
     * @param string $model The model of the aircraft.
     * @param int $seats The amount of total seats in the aircraft.
     * @param string $location The location of the aircraft.
     * 
     * @author Arthur Nonaka Oda
     *
     * @throws InvalidArgumentException if the name or email is empty.
     */
    public function __construct(string $status, string $model, int $seats, string $location) {
        $this->status = $status;
        $this->model = $model;
        $this->seats = $seats;
        $this->location = $location;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getSeats() {
        return $this->seats;
    }

    public function setSeats($seats) {
        $this->seats = $seats;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

}       