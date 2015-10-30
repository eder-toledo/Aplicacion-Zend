<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bitacora
 *
 * @author eder
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Bitacora {

    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    private $id;

    /** @ORM\Column(type="string") */
    protected $quien;

    /** @ORM\Column(type="string") */
    protected $hora;

    /** @ORM\Column(type="string") */
    protected $fecha;

    /** @ORM\Column(type="string") */
    protected $evento;

    public function getQuien() {
        return $this->quien;
    }

    public function setQuien($param) {
        return $this->quien = $param;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($param) {
        return $this->hora = $param;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($param) {
        return $this->fecha = $param;
    }

    public function getEvento() {
        return $this->evento;
    }

    public function setEvento($param) {
        return $this->evento = $param;
    }

}
