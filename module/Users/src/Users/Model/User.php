<?php
namespace Users\Model;

class User
{
    public $id;
    public $nombre;
    public $correo;
    public $contra;
    public $sexo;
    public $edad;
    
    function exchangeArray($data)
        {
            $this->nombre = (isset($data['nombre'])) ?
            $data['nombre'] : null;
            $this->correo = (isset($data['correo'])) ?
            $data['correo'] : null;
            $this->contra = (isset($data['contra'])) ?
            $data['contra'] : null;
            $this->sexo = (isset($data['sexo'])) ?
            $data['sexo'] : null;
            $this->edad = (isset($data['edad'])) ?
            $data['edad'] : null;
        }
}

