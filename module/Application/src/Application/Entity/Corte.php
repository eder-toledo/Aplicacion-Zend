<?php
/**
 * Created by PhpStorm.
 * User: eder
 * Date: 19/10/15
 * Time: 08:25 PM
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/** @ORM\Entity */
class Corte {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_corte;

    /** @ORM\Column(type="integer") */
    protected $id_usr;

    /** @ORM\Column(type="datetime") */
    protected $momento;

    /** @ORM\Column(type="date") */
    protected $fecha_corte;

    /** @ORM\Column(type="date") */
    protected $fecha_corte2;

    /** @ORM\Column(type="float") */
    protected $entradas;

    /** @ORM\Column(type="float") */
    protected $quedo;

    /** @ORM\Column(type="float") */
    protected $saldo;

    /** @ORM\Column(type="text") */
    protected $comentario;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="cortes")
     * @ORM\JoinColumn(name="id_usr", referencedColumnName="id_usr")
     */
    private $usuario;
    
    /**
     * @ORM\OneToMany(targetEntity="Desgloce", mappedBy="corte")
     */
    private $desgloces;
    
    public function __construct() {
        $this->desgloces= new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdCorte()
    {
        return $this->id_corte;
    }

    /**
     * @return mixed
     */
    public function getIdUsr()
    {
        return $this->id_usr;
    }

    /**
     * @param mixed $id_usr
     */
    public function setIdUsr($id_usr)
    {
        $this->id_usr = $id_usr;
    }

    /**
     * @return mixed
     */
    public function getMomento()
    {
        return $this->momento;
    }

    /**
     * @param mixed $momento
     */
    public function setMomento($momento)
    {
        $this->momento = $momento;
    }

    /**
     * @return mixed
     */
    public function getFechaCorte()
    {
        return $this->fecha_corte;
    }

    /**
     * @param mixed $fecha_corte
     */
    public function setFechaCorte($fecha_corte)
    {
        $this->fecha_corte = $fecha_corte;
    }

    /**
     * @return mixed
     */
    public function getFechaCorte2()
    {
        return $this->fecha_corte2;
    }

    /**
     * @param mixed $fecha_corte2
     */
    public function setFechaCorte2($fecha_corte2)
    {
        $this->fecha_corte2 = $fecha_corte2;
    }

    /**
     * @return mixed
     */
    public function getEntradas()
    {
        return $this->entradas;
    }

    /**
     * @param mixed $entradas
     */
    public function setEntradas($entradas)
    {
        $this->entradas = $entradas;
    }

    /**
     * @return mixed
     */
    public function getQuedo()
    {
        return $this->quedo;
    }

    /**
     * @param mixed $quedo
     */
    public function setQuedo($quedo)
    {
        $this->quedo = $quedo;
    }

    /**
     * @return mixed
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * @param mixed $saldo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

}