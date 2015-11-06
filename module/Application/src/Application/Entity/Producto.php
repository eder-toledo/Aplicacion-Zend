<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author eder
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/** @ORM\Entity */
class Producto {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_producto;

    /** @ORM\Column(type="string") */
    protected $descripcion;

    /** @ORM\Column(type="string") */
    protected $marca;

    /** @ORM\Column(type="integer") */
    protected $punto_reorden;

    /** @ORM\Column(type="integer") */
    protected $id_grupo;

    /** @ORM\Column(type="string") */
    protected $finito;

    /** @ORM\Column(type="datetime") */
    protected $ufecha;
    
    /**
     * @ORM\OneToMany(targetEntity="Desgloce", mappedBy="producto")
     */
    //private $desgloces;
    
    /**
     * @ORM\OneToMany(targetEntity="Compra", mappedBy="producto")
     */
    //private $compras;
    
    /**
     * @ORM\OneToMany(targetEntity="Surtimiento", mappedBy="producto")
     */
    //private $surtimientos;
    
    public function __construct() {
        $this->desgloces= new ArrayCollection();
        $this->compras= new ArrayCollection();
        $this->surtimientos= new ArrayCollection();
    }

    public function getId() {
        return $this->id_producto;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($param) {
        return $this->descripcion = $param;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($param) {
        return $this->marca=$param;
    }

    public function getPunto_reorden() {
        return $this->punto_reorden;
    }

    public function setPunto_reorden($param) {
        return $this->punto_reorden = $param;
    }

    public function getId_grupo() {
        return $this->id_grupo;
    }

    public function setId_grupo($param) {
        return $this->id_grupo = $param;
    }

    public function getFinito() {
        return $this->finito;
    }

    public function setFinito($param) {
        return $this->finito = $param;
    }

    public function getUfecha() {
        return $this->ufecha;
    }

    public function setUfecha($param) {
        return $this->ufecha = $param;
    }

}
