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


}

