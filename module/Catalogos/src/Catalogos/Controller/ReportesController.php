<?php

namespace Catalogos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ReportesController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function prodescasosAction()
    {
        $productos = $this->getObjectManager()->getRepository('Application\Entity\Producto')->where('finito', '<', 300);
        return new ViewModel(array('productos' => $productos));
    }

    public function prodvendidosAction()
    {
        return new ViewModel();
    }

    public function prodsurtidoAction()
    {
        return new ViewModel();
    }

    public function prodbitacoraAction()
    {
        return new ViewModel();
    }


}

