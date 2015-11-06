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
        $allventas=  $this->getObjectManager()->getRepository('Application\Entity\Venta')->findAll();
        
        foreach($allventas as $v){
            $v=new \Application\Entity\Venta;
        }
        
        if($this->request->isPost()){
            $corte= new \Application\Entity\Corte;
            $corte->setComentario($corte);
            $corte->setEntradas($corte);
            $corte->setFechaCorte($corte);
            $corte->setFechaCorte2($corte);
            $corte->setIdUsr($corte);
            $corte->setMomento($corte);
            $corte->setQuedo($corte);
            $corte->setSaldo($corte);
        }
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

