<?php

namespace Model\Form;

use Library\Request;

class ShipForm
{
    public $nameShip;
    public $longShip;
    public $heightShip;
    public $widthShip;
    public $displacement;
    public $launching;
    public $removalFromService;
    public $description;

    public function __construct(Request $request)
    {
        $this->nameShip = $request->post('nameShip');
        $this->longShip = $request->post('longShip');
        $this->heightShip = $request->post('heightShip');
        $this->widthShip = $request->post('widthShip');
        $this->displacement = $request->post('displacement');
        $this->launching = $request->post('launching');
        $this->removalFromService = $request->post('removalFromService');
        $this->description = $request->post('description');
    }

    function isValid()
    {
        $res =
            $this->nameShip !== '' &&
            $this->longShip !== '' &&
            $this->heightShip !== '' &&
            $this->widthShip !== '' &&
            $this->displacement !== '' &&
            $this->launching !== '' &&
            $this->removalFromService !== '' &&
            $this->description !== ''
        ;
        return $res;
    }
}