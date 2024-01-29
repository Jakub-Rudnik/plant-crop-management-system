<?php

class Employee
{
    public int $workerID;
    public string $forename;
    public string $lastname;

    public function __construct($workerID, $forename, $lastname)
    {
        $this->workerID = $workerID;
        $this->forename = $forename;
        $this->lastname = $lastname;
    }
}