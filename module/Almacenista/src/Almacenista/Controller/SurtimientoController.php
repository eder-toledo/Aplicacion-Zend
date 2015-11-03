<?php

namespace Almacenista\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Surtimiento;
use Application\Entity\Producto;
use Application\Entity\Proovedor;

class SurtimientoController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function addsurtimientoAction()
    {
        return new ViewModel();
    }

    public function allsurtimientoAction()
    {
        $surtimientos=array();
        
        $allsurtimientos=  $this->getObjectManager()->getRepository('Application\Entity\Surtimiento')->findAll();
        
        foreach($allsurtimientos as $s){
            
            $producto=  $this->getObjectManager()->find('Application\Entity\Producto', $s->getIdProducto());
            $usuario= $this->getObjectManager()->find('Application\Entity\Usuario', $s->getIdUsr());
            
            $su=array(
                'producto'=>$producto->getDescripcion(),
                'usuario'=>$usuario->getNombre(),
                'fecha'=>$s->getFecha(),
                'cantidad'=>$s->getCuantosSurtido(),
                'precio'=>$s->getPrecioEntra()
            );
            
            array_push($surtimientos, $su);
        }
        
        return new ViewModel(array('surtimientos'=>$surtimientos));
    }

    public function addexistenciaAction()
    {
        return new ViewModel();
    }

    protected function getObjectManager() {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }

}

