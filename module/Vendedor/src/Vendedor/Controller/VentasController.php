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
        $productos=array();
        $allproductos=  $this->getObjectManager()->getRepository('Application\Entity\Producto')->findAll();
        
        foreach ($allproductos as $pro) {
            //$pro=new \Application\Entity\Producto;
            $precio=  $this->getObjectManager()->find('Application\Entity\Compra', $pro->getId());
            //$precio= new \Application\Entity\Compra;
            $p=array(
                'idproducto'=>$pro->getId(),
                'descripcion'=>$pro->getDescripcion(),
                'precio'=>$precio->getPrecioVenta()
            );
            
            array_push($productos, $p);
        }
        
        if($this->request->isPost()){
            $total=(int)$this->getRequest()->getPost('cantidad') * (int)$this->getRequest()->getPost('precio');
            $venta= new \Application\Entity\Venta;
            $venta->setCambio($this->getRequest()->getPost('pago') - $total);
            $venta->setEfectivo($this->getRequest()->getPost('pago'));
            $venta->setRedondeo(0);
            $venta->setTotal($total);
            
            $this->getObjectManager()->persist($venta);
            
            /*$desgloce=new \Application\Entity\Desgloce;
            $desgloce->setCantidad($desgloce);
            $desgloce->setConfirmado($desgloce);
            $desgloce->setDescripcion($desgloce);
            $desgloce->setFecha($desgloce);
            $desgloce->setGiro($desgloce);
            $desgloce->setHora($desgloce);
            $desgloce->setIdCorte($desgloce);
            $desgloce->setIdProducto($desgloce);
            $desgloce->setIdVenta($desgloce);
            $desgloce->setImporte($desgloce);
            $desgloce->setPrecio($precio);*/
            
            $this->getObjectManager()->flush();
            
            return $this->redirect()->toRoute('vendedor');
        }else{
            return new ViewModel(array('productos'=>$productos));
        }
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

