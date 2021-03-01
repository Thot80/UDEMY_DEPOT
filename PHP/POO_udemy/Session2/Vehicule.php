<?php


class Vehicule
{
    protected $type;
    protected $place;


    public function __construct($type, $place)
    {
        $this->setType($type);
        $this->setPlace($place);

    }
    public function setType($type)
    {
        $this->type = $type;
    }

    public function setPlace($place)
    {
        $this->place = $place;
    }

    public function getType()
    {
        return $this->type;
    }
    public function getPlace()
    {
        return $this->place;
    }
}
