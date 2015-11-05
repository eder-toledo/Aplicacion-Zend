<?php

namespace Almacenista\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Surtimiento;
use Application\Entity\Producto;
use Application\Entity\Proovedor;
use Application\Entity\Existencia;

class SurtimientoController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function addsurtimientoAction()
    {
        $productos=  $this->getObjectManager()->getRepository('\Application\Entity\Producto')->findAll();
        $usuarios=  $this->getObjectManager()->getRepository('Application\Entity\Usuario')->findAll();
        
        
        if($this->request->isPost()){
            $surtimiento= new Surtimiento;
            $surtimiento->setCuantosSurtido((int)$this->getRequest()->getPost('cuanto'));
            $surtimiento->setFecha(date('Y-m-d'));
            $surtimiento->setIdProducto((int)$this->getRequest()->getPost('idproducto'));
            $surtimiento->setIdUsr((int)$this->getRequest()->getPost('idusuario'));
            $surtimiento->setPrecioEntra((int)$this->getRequest()->getPost('precio'));
            
            $this->getObjectManager()->persist($surtimiento);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('almacenista');
        }
        
        return new ViewModel(array('productos'=>$productos, 'usuarios'=>$usuarios));
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
        $productos=  $this->getObjectManager()->getRepository('\Application\Entity\Producto')->findAll();
        $usuarios=  $this->getObjectManager()->getRepository('Application\Entity\Usuario')->findAll();   
        
        if($this->request->isPost()){
            $existencia= new Existencia;
            $existencia->setIdproducto((int)$this->getRequest()->getPost('idproducto'));
            $existencia->setMostrador((int)$this->getRequest()->getPost('mostrador'));
            $existencia->setPrecio((int)$this->getRequest()->getPost('precio'));
            
            $this->getObjectManager()->persist($existencia);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('almacenista');
        }
        
        return new ViewModel(array('productos'=>$productos));
    }

    protected function getObjectManager() {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }

}

