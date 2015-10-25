<?php

namespace Almacenista\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ComprasControllerController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

