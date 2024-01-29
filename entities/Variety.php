<?php

class Variety
{
    public int $varietyID;
    public string $name;

    public function __construct(int $varietyID, string $name)
    {
        $this->varietyID = $varietyID;
        $this->name = $name;
    }
}