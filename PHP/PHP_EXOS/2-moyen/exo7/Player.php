<?php


class Player
{
    private $nom;
    private $force;
    private $pv;
    private $armeId;

    public function __construct($nom, $force,$pv, $armeId)
    {
        $this->setNom($nom);
        $this->setForce($force);
        $this->setPv($pv);
        $this->setArmeId($armeId);
    }


    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $force
     */
    public function setForce($force): void
    {
        $this->force = $force;
    }

    /**
     * @param mixed $pv
     */
    public function setPv($pv): void
    {
        $this->pv = $pv;
    }

    /**
     * @param mixed $armeId
     */
    public function setArmeId($armeId): void
    {
        $this->armeId = $armeId;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getForce()
    {
        return $this->force;
    }

    /**
     * @return mixed
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * @return mixed
     */
    public function getArmeId()
    {
        return $this->armeId;
    }
}