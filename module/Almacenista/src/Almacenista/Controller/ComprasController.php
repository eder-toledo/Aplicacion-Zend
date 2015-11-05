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
        $productos=  $this->getObjectManager()->getRepository('\Application\Entity\Producto')->findAll();
        $proovedores=  $this->getObjectManager()->getRepository('Application\Entity\Proovedor')->findAll();
        if($this->request->isPost()){
            $compra= new Compra;
            $compra->setFecha(date('Y-m-d'));
            $compra->setIdProducto((int)$this->getRequest()->getPost('idproducto'));
            $compra->setIdProveedor((int)$this->getRequest()->getPost('idproveedor'));
            $compra->setPiezas((int)$this->getRequest()->getPost('piezas'));
            $compra->setPiezasEnAlmacen((int)$this->getRequest()->getPost('enalmacen'));
            $compra->setPrecioVenta((int)$this->getRequest()->getPost('precioventa'));
            $compra->setProcentajeUtilidad((int)$this->getRequest()->getPost('utilidad'));
            $compra->setTotalPagado((int)$this->getRequest()->getPost('totalpagado'));
            
            $this->getObjectManager()->persist($compra);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('almacenista');
        }
        return new ViewModel(array('productos'=>$productos, 'proovedores'=>$proovedores));
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
