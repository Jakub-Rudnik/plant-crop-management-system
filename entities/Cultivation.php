<?php

class Cultivation
{
    public int $cultivationID;
    public string $name;
    public int $humidity;
    public int $temperature;
    public int $quantity;
    public bool $watering;
    public Variety $variety;

    public function __construct(string $name, int $humidity, int $temperature, Variety $variety, int$cultivationID, int $quantity, bool $watering)
    {
        $this->cultivationID = $cultivationID;
        $this->name = $name;
        $this->humidity = $humidity;
        $this->temperature = $temperature;
        $this->quantity = $quantity;
        $this->watering = $watering;
        $this->variety = $variety;
    }
}