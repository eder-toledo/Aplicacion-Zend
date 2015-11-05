<?php
/**
 * Created by PhpStorm.
 * User: eder
 * Date: 19/10/15
 * Time: 08:33 PM
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Compra {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_compra;

    /** @ORM\Column(type="integer") */
    protected $id_proveedor;

    /** @ORM\Column(type="integer") */
    protected $id_producto;

    /** @ORM\Column(type="string") */
    protected $fecha;

    /** @ORM\Column(type="integer") */
    protected $piezas;

    /** @ORM\Column(type="integer") */
    protected $total_pagado;

    /** @ORM\Column(type="float") */
    protected $procentaje_utilidad;

    /** @ORM\Column(type="float") */
    protected $precio_venta;

    /** @ORM\Column(type="integer") */
    protected $piezas_en_almacen;
    
    /**
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="compras")
     * @ORM\JoinColumn(name="id_producto", referencedColumnName="id_producto")
     */
    //private $producto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Proovedor", inversedBy="compras")
     * @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id_proveedor")
     */
    //private $proveedor;

    /**
     * @return mixed
     */
    public function getIdCompra()
    {
        return $this->id_compra;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
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
    public function getPiezas()
    {
        return $this->piezas;
    }

    /**
     * @param mixed $piezas
     */
    public function setPiezas($piezas)
    {
        $this->piezas = $piezas;
    }

    /**
     * @return mixed
     */
    public function getTotalPagado()
    {
        return $this->total_pagado;
    }

    /**
     * @param mixed $total_pagado
     */
    public function setTotalPagado($total_pagado)
    {
        $this->total_pagado = $total_pagado;
    }

    /**
     * @return mixed
     */
    public function getProcentajeUtilidad()
    {
        return $this->procentaje_utilidad;
    }

    /**
     * @param mixed $procentaje_utilidad
     */
    public function setProcentajeUtilidad($procentaje_utilidad)
    {
        $this->procentaje_utilidad = $procentaje_utilidad;
    }

    /**
     * @return mixed
     */
    public function getPrecioVenta()
    {
        return $this->precio_venta;
    }

    /**
     * @param mixed $precio_venta
     */
    public function setPrecioVenta($precio_venta)
    {
        $this->precio_venta = $precio_venta;
    }

    /**
     * @return mixed
     */
    public function getPiezasEnAlmacen()
    {
        return $this->piezas_en_almacen;
    }

    /**
     * @param mixed $piezas_en_almacen
     */
    public function setPiezasEnAlmacen($piezas_en_almacen)
    {
        $this->piezas_en_almacen = $piezas_en_almacen;
    }


}