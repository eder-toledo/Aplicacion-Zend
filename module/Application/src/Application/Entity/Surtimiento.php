<?php
/**
 * Created by PhpStorm.
 * User: eder
 * Date: 19/10/15
 * Time: 08:38 PM
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Surtimiento {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_surtimiento;

    /** @ORM\Column(type="string") */
    protected $fecha;

    /** @ORM\Column(type="integer") */
    protected $id_producto;

    /** @ORM\Column(type="integer") */
    protected $id_usr;

    /** @ORM\Column(type="integer") */
    protected $cuantos_surtido;

    /** @ORM\Column(type="integer") */
    protected $precio_entra;
    
    /**
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="surtimientos")
     * @ORM\JoinColumn(name="id_producto", referencedColumnName="id_producto")
     */
    //private $producto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="surtimientos")
     * @ORM\JoinColumn(name="id_usr", referencedColumnName="id_usr")
     */
    //private $usuario;

    /**
     * @return mixed
     */
    public function getIdSurtimiento()
    {
        return $this->id_surtimiento;
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
    public function getCuantosSurtido()
    {
        return $this->cuantos_surtido;
    }

    /**
     * @param mixed $cuantos_surtido
     */
    public function setCuantosSurtido($cuantos_surtido)
    {
        $this->cuantos_surtido = $cuantos_surtido;
    }

    /**
     * @return mixed
     */
    public function getPrecioEntra()
    {
        return $this->precio_entra;
    }

    /**
     * @param mixed $precio_entra
     */
    public function setPrecioEntra($precio_entra)
    {
        $this->precio_entra = $precio_entra;
    }


}