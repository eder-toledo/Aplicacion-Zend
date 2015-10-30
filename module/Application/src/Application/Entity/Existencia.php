<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Existencia
 *
 * @author eder
 */
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Existencia {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_existencia;
    
    /** @ORM\Column(type="integer")*/
    protected $id_producto;
    
    /** @ORM\Column(type="integer")*/
    protected $mostrador;
    
    /** @ORM\Column(type="float")*/
    protected $precio;
    
    public function getId() {
        return $this->id_existencia;
    }
    
    public function getIdproducto() {
        return $this->id_producto;
    }
    
    public function setIdproducto($param) {
        return $this->id_producto=$param;
    }
    
    public function getMostrador() {
        return $this->mostrador;
    }
    
    public function setMostrador($param) {
        return $this->mostrador=$param;
    }
    
    public function getPrecio() {
        return $this->precio;
    }
    
    public function setPrecio($param) {
        return $this->precio=$param;
    }
}
