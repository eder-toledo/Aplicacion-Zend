<?php

namespace Catalogos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Usuario;

class CrudController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function adduserAction()
    {
        if ($this->request->isPost()) {
            $usuario = new Usuario();
            $usuario->setNombre($this->getRequest()->getPost('nombre'));
            $usuario->setPwd($this->getRequest()->getPost('pwd'));
            $usuario->setNivel($this->getRequest()->getPost('nivel'));
            $usuario->setActivo(1);
            $usuario->setLog(0);
            

            $this->getObjectManager()->persist($usuario);
            $this->getObjectManager()->flush();
            $newId = $usuario->getId();

            return $this->redirect()->toRoute('modulo1');
        }
        return new ViewModel();
    }

    public function edituserAction()
    {
        $id=(int)  $this->params()->fromRoute('id', 0);
        $usuario=  $this->getObjectManager()->find('\Application\Entity\Usuario', $id);
        
        if($this->request->isPost()){
            $usuario->setNombre($this->getRequest()->getPost('nombre'));
            $usuario->setPwd($this->getRequest()->getPost('pwd'));
            $usuario->setNivel($this->getRequest()->getPost('nivel'));
            $usuario->setActivo($this->getRequest()->getPost('activo'));
            
            $this->getObjectManager()->persist($usuario);
            $this->getObjectManager()->flush();
            
            return $this->redirect()->toRoute('modulo1');
        }
        
        return new ViewModel(array('usuario'=>$usuario));
    }

    public function deleteuserAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $usuario = $this->getObjectManager()->find('\Application\Entity\Usuario', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($usuario);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('modulo1');
        }

        return new ViewModel(array('usuario' => $usuario));
    }

    public function addproveedorAction()
    {
        return new ViewModel();
    }

    public function editproveedorAction()
    {
        return new ViewModel();
    }

    public function deleteproveedorAction()
    {
        return new ViewModel();
    }

    public function addproductoAction()
    {
        return new ViewModel();
    }

    public function editproductoAction()
    {
        return new ViewModel();
    }

    public function deleteproductoAction()
    {
        return new ViewModel();
    }

    public function allproductoAction()
    {
        return new ViewModel();
    }

    public function allproveedorAction()
    {
        return new ViewModel();
    }

    public function alluserAction()
    {
        return new ViewModel();
    }
    
    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }


}

