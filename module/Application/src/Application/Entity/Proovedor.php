<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proovedor
 *
 * @author eder
 */

namespace Application\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Proovedor {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_proveedor;

    /** @ORM\Column(type="string") */
    protected $nombre;

    /** @ORM\Column(type="string") */
    protected $direccion;

    /** @ORM\Column(type="string") */
    protected $rfc;

    /** @ORM\Column(type="string") */
    protected $telefono;
    
    /**
     * @ORM\OneToMany(targetEntity="Compra", mappedBy="proveedor")
     */
    //private $compras;
    
    public function __construct() {
        $this->compras= new ArrayCollection();
    }

    public function getId() {
        return $this->id_proveedor;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($param) {
        return $this->nombre = $param;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($param) {
        return $this->direccion = $param;
    }

    public function getRfc() {
        return $this->rfc;
    }

    public function setRfc($param) {
        return $this->rfc = $param;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($param) {
        return $this->telefono = $param;
    }

}
