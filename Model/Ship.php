<?php

namespace Model;



class Ship
{
    private $id;
    private $nameShip;
    private $long;
    private $launching;
    private $removalFromService;
    private $description;
    private $width;
    private $height;
    private $displacement;

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    public function getDisplacement()
    {
        return $this->displacement;
    }

    public function setDisplacement($displacement)
    {
        $this->displacement = $displacement;
        return $this;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNameShip()
    {
        return $this->nameShip;
    }

    public function setNameShip($nameShip)
    {
        $this->nameShip = $nameShip;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getLong()
    {
        return $this->long;
    }

    public function setLong($long)
    {
        $this->long = $long;
        return $this;
    }

    public function getLaunching()
    {
        return $this->launching;
    }

    public function setLaunching($launching)
    {
        $this->launching = $launching;
        return $this;
    }

    public function getRemovalFromService()
    {
        return $this->removalFromService;
    }

    public function setRemovalFromService($removalFromService)
    {
        $this->removalFromService = $removalFromService;
        return $this;
    }
}