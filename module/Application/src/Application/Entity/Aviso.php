<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Aviso {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_aviso;

    /** @ORM\Column(type="integer") */
    protected $id_usr;

    /** @ORM\Column(type="string") */
    protected $texto;

    /** @ORM\Column(type="string") */
    protected $fecha;
    
    /** @ORM\OneToMany(targetEntity="Leido_por", mappedBy="avisos") */
    protected $avisosleidos;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="avisos")
     * @ORM\JoinColumn(name="id_usr", referencedColumnName="id_usr")
     */
    private $usuario;

    /**
     * @return mixed
     */
    public function getIdAviso()
    {
        return $this->id_aviso;
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
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param mixed $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
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

}