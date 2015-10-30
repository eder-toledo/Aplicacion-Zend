<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Desgloce
 *
 * @author eder
 */
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Desgloce {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_desgloce;

    /** @ORM\Column(type="integer") */
    protected $id_venta;

    /** @ORM\Column(type="integer") */
    protected $id_corte;

    /** @ORM\Column(type="string") */
    protected $fecha;

    /** @ORM\Column(type="string") */
    protected $hora;

    /** @ORM\Column(type="integer") */
    protected $id_producto;

    /** @ORM\Column(type="float") */
    protected $cantidad;

    /** @ORM\Column(type="string") */
    protected $descripcion;

    /** @ORM\Column(type="float") */
    protected $precio;

    /** @ORM\Column(type="float") */
    protected $importe;

    /** @ORM\Column(type="integer") */
    protected $confirmado;

    /** @ORM\Column(type="integer") */
    protected $giro;
    
    /**
     * @ORM\ManyToOne(targetEntity="Corte", inversedBy="desgloces")
     * @ORM\JoinColumn(name="id_corte", referencedColumnName="id_corte")
     */
    private $usuario;
    
    /**
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="desgloces")
     * @ORM\JoinColumn(name="id_producto", referencedColumnName="id_producto")
     */
    private $producto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Venta", inversedBy="desgloces")
     * @ORM\JoinColumn(name="id_venta", referencedColumnName="id_venta")
     */
    private $venta;

    /**
     * @return mixed
     */
    public function getIdDesgloce()
    {
        return $this->id_desgloce;
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->id_venta;
    }

    /**
     * @param mixed $id_venta
     */
    public function setIdVenta($id_venta)
    {
        $this->id_venta = $id_venta;
    }

    /**
     * @return mixed
     */
    public function getIdCorte()
    {
        return $this->id_corte;
    }

    /**
     * @param mixed $id_corte
     */
    public function setIdCorte($id_corte)
    {
        $this->id_corte = $id_corte;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * @param mixed $id_producto
     */
    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * @param mixed $importe
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    /**
     * @return mixed
     */
    public function getConfirmado()
    {
        return $this->confirmado;
    }

    /**
     * @param mixed $confirmado
     */
    public function setConfirmado($confirmado)
    {
        $this->confirmado = $confirmado;
    }

    /**
     * @return mixed
     */
    public function getGiro()
    {
        return $this->giro;
    }

    /**
     * @param mixed $giro
     */
    public function setGiro($giro)
    {
        $this->giro = $giro;
    }
}
