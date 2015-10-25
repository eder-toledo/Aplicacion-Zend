<?php
/**
 * Created by PhpStorm.
 * User: eder
 * Date: 19/10/15
 * Time: 08:23 PM
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Leido_por {
    
    /** 
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Aviso", inversedBy="avisosleidos") 
     * @ORM\JoinColumn(name="id_aviso", referencedColumnName="id_aviso", nullable=false) 
     */
    protected $avisos;
    
    /** 
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="usuariosleidos") 
     * @ORM\JoinColumn(name="id_usr", referencedColumnName="id_usr", nullable=false) 
     */
    protected $usuarios;

}