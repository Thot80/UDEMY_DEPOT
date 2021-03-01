<?php


class Voiture extends Vehicule
{
    private $marque;
    private $volumeCarburant;

    /**
     * @param mixed $marque
     */
    public function setMarque($marque): void
    {
        $this->marque = $marque;
    }

    /**
     * @param mixed $volumeCarburant
     */
    public function setVolumeCarburant($volumeCarburant): void
    {
        $this->volumeCarburant = $volumeCarburant;
    }
    /**
     * @return mixed
     */

    public function getMarque()
    {
        return $this->marque;
    }
    // Permet de connaître le volume carburant
    /**
     * @return mixed
     */
    public function getVolumeCarburant()
    {
        return $this->volumeCarburant;
    }

}