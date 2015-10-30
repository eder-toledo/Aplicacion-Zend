<?php
/**
 * Created by PhpStorm.
 * User: eder
 * Date: 19/10/15
 * Time: 08:14 PM
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/** @ORM\Entity */
class Venta {
    /**
     * @ORM\ManyToOne(targetEntity="Desgloce")
     * @ORM\JoinColumn(name="id_desgloce", referencedColumnName="id_venta")
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_venta;

    /** @ORM\Column(type="float") */
    protected $total;

    /** @ORM\Column(type="float") */
    protected $efectivo;

    /** @ORM\Column(type="float") */
    protected $redondeo;

    /** @ORM\Column(type="float") */
    protected $cambio;
    
    /**
     * @ORM\OneToMany(targetEntity="Desgloce", mappedBy="venta")
     */
    private $desgloces;
    
    public function __construct() {
        $this->desgloces= new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->id_venta;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getEfectivo()
    {
        return $this->efectivo;
    }

    /**
     * @param mixed $efectivo
     */
    public function setEfectivo($efectivo)
    {
        $this->efectivo = $efectivo;
    }

    /**
     * @return mixed
     */
    public function getRedondeo()
    {
        return $this->redondeo;
    }

    /**
     * @param mixed $redondeo
     */
    public function setRedondeo($redondeo)
    {
        $this->redondeo = $redondeo;
    }

    /**
     * @return mixed
     */
    public function getCambio()
    {
        return $this->cambio;
    }

    /**
     * @param mixed $cambio
     */
    public function setCambio($cambio)
    {
        $this->cambio = $cambio;
    }


}