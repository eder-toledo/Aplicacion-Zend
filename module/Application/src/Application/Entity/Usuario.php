<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author eder
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/** @ORM\Entity */
class Usuario {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_usr;

    /** @ORM\Column(type="boolean") */
    protected $activo;

    /** @ORM\Column(type="string") */
    protected $log;

    /** @ORM\Column(type="string") */
    protected $nivel;

    /** @ORM\Column(type="string") */
    protected $nombre;

    /** @ORM\Column(type="string") */
    protected $pwd;

    /** @ORM\OneToMany(targetEntity="\Application\Entity\Leido_por", mappedBy="usuarios") */
    //protected $usuariosleidos;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Aviso", mappedBy="usuario")
     */
    //private $avisos;
    
    /**
     * @ORM\OneToMany(targetEntity="Corte", mappedBy="usuario")
     */
    //private $cortes;
    
    /**
     * @ORM\OneToMany(targetEntity="Surtimiento", mappedBy="usuario")
     */
    //private $surtimientos;


    public function __construct() {
        $this->avisos=new ArrayCollection();
        $this->cortes=new ArrayCollection();
        $this->surtimientos= new ArrayCollection();
    }


    public function getId() {
        return $this->id_usr;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($param) {
        return $this->activo = $param;
    }

    public function getLog() {
        return $this->log;
    }

    public function setLog($param) {
        return $this->log = $param;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($param) {
        return $this->nivel = $param;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($param) {
        return $this->nombre = $param;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function setPwd($param) {
        return $this->pwd = $param;
    }

}
