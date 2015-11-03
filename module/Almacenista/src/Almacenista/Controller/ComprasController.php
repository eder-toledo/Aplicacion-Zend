<?php

namespace Almacenista\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Compra;
use Application\Entity\Producto;
use Application\Entity\Proovedor;

class ComprasController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }

    public function addcompraAction() {
        return new ViewModel();
    }

    public function allcompraAction() {

        $compras = array();

        $allcompras = $this->getObjectManager()->getRepository('Application\Entity\Compra')->findAll();

        foreach ($allcompras as $value) {

            $producto = $this->getObjectManager()->find('\Application\Entity\Producto', $value->getIdProducto());

            $provedor = $this->getObjectManager()->find('Application\Entity\Proovedor', $value->getIdProveedor());

            $c = array(
                'producto' => $producto->getDescripcion(),
                'provedor' => $provedor->getNombre(),
                'fecha' => $value->getFecha(),
                'piezas' => $value->getPiezas(),
                'totalpagado' => $value->getTotalPagado(),
                'utilidad' => $value->getProcentajeUtilidad(),
                'precioventa' => $value->getPrecioVenta(),
                'piezas' => $value->getPiezasEnAlmacen()
            );

            array_push($compras, $c);
        }

        return new ViewModel(array('compras' => $compras));
    }

    protected function getObjectManager() {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }

}
