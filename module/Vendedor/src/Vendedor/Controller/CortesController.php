<?php

namespace Vendedor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CortesController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function addcorteAction()
    {
        return new ViewModel();
    }

    public function allcorteAction()
    {
        $cortes=array();
        $allcortes=  $this->getObjectManager()->getRepository('Application\Entity\Corte')->findAll();
        
        foreach ($allcortes as $value) {
            $usuario=  $this->getObjectManager()->find('Application\Entity\Usuario', $value->getIdUsr());
            
            $c=array(
                'usuario'=>$usuario->getNombre(),
                'momento'=>$value->getMomento(),
                'fechacorte'=>$value->getFechaCorte(),
                'fechacorte2'=>$value->getFechaCorte2(),
                'entradas'=>$value->getEntradas(),
                'quedo'=>$value->getQuedo(),
                'saldo'=>$value->getSaldo(),
                'comentario'=>$value->getComentario()
            );
            
            array_push($cortes, $c);
        }
        
        return new ViewModel(array('cortes'=>$cortes));
    }
    
    protected function getObjectManager() {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }

}

