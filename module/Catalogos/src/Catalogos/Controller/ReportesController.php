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
        $productos=array();
        
        $allproductos = $this->getObjectManager()->getRepository('Application\Entity\Producto')->findAll();
        
        foreach ($allproductos as $p){
            if($p->getFinito() < 50){
                array_push($productos, $p);
            }
        }
        return new ViewModel(array('productos' => $productos));
    }

    public function prodvendidosAction()
    {
        $productos=array();
        
        $allproductos = $this->getObjectManager()->getRepository('Application\Entity\Producto')->findAll();
        
        foreach ($allproductos as $p) {
            $totalvendidos=0;
            $alldesgloces=  $this->getObjectManager()->getRepository('Application\Entity\Desgloce')->findAll();
            
            foreach ($alldesgloces as $d) {
                if($p->getId() == $d->getIdProducto()){
                    $totalvendidos=$totalvendidos + $d->getCantidad();
                }
            }
            
            array_push($productos, array($p->getDescripcion(), $totalvendidos));
        }
        
        usort($productos, "ord");
        
        return new ViewModel(array('productos'=>$productos));
    }

    public function prodsurtidoAction()
    {
        $productos=array();
        
        $allproductos = $this->getObjectManager()->getRepository('Application\Entity\Producto')->findAll();
        
        foreach ($allproductos as $p) {
            $totalsurtidos=array();
            $allsurtimientos=  $this->getObjectManager()->getRepository('Application\Entity\Surtimiento')->findAll();
            foreach ($allsurtimientos as $s) {
                //$s=new \Application\Entity\Surtimiento;
                if($p->getId() == $s->getIdProducto()){
                    array_push($totalsurtidos, array('total'=>$s->getCuantosSurtido(), 'fecha'=>$s->getFecha(), 'precio'=>$s->getPrecioEntra()));
                }
            }
            
            array_push($productos, array('producto'=>$p->getDescripcion(), 'surtimientos'=>$totalsurtidos));
        }
        
        return new ViewModel(array('productos'=>$productos));
    }

    public function prodbitacoraAction()
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

function ord($a, $b){
    return strcmp($a[1], $b[1]);
}