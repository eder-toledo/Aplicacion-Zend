<?php

namespace Vendedor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VentasControllerController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

