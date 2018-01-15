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
    private $image_1;
    private $image_2;

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

    public function getImage_1()
    {
        return $this->image_1;
    }

    public function setImage_1($image_1)
    {
        $this->image_1 = $image_1;
        return $this;
    }

    public function getImage_2()
    {
        return $this->image_2;
    }

    public function setImage_2($image_2)
    {
        $this->image_2 = $image_2;
        return $this;
    }
}