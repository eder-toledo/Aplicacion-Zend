<?php

namespace Vendedor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VentasController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function addventaAction()
    {
        return new ViewModel();
    }

    public function allventaAction()
    {
        $ventas= $this->getObjectManager()->getRepository('Application\Entity\Venta')->findAll();
        return new ViewModel(array('ventas'=>$ventas));
    }

    public function adddesgloceAction()
    {
        return new ViewModel();
    }

    public function alldesgloceAction()
    {
        $desgloces=  $this->getObjectManager()->getRepository('Application\Entity\Desgloce')->findAll();
        return new ViewModel(array('desgloces'=>$desgloces));
    }

    public function addavisoAction()
    {
        return new ViewModel();
    }

    public function useravisoAction()
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

