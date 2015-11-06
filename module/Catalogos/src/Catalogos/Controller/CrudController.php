<?php
namespace Catalogos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Usuario;

class CrudController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }

    public function adduserAction() {
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

    public function edituserAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $usuario = $this->getObjectManager()->find('\Application\Entity\Usuario', $id);

        if ($this->request->isPost()) {
            $usuario->setNombre($this->getRequest()->getPost('nombre'));
            $usuario->setPwd($this->getRequest()->getPost('pwd'));
            $usuario->setNivel($this->getRequest()->getPost('nivel'));
            $usuario->setActivo($this->getRequest()->getPost('activo'));

            $this->getObjectManager()->persist($usuario);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('modulo1');
        }

        return new ViewModel(array('usuario' => $usuario));
    }

    public function deleteuserAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $usuario = $this->getObjectManager()->find('\Application\Entity\Usuario', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($usuario);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('modulo1');
        }

        return new ViewModel(array('usuario' => $usuario));
    }

    public function addproveedorAction() {
        if ($this->request->isPost()) {
            $proveedor = new \Application\Entity\Proovedor;
            $proveedor->setNombre($this->getRequest()->getPost('nombre'));
            $proveedor->setDireccion($this->getRequest()->getPost('direccion'));
            $proveedor->setRfc($this->getRequest()->getPost('rfc'));
            $proveedor->setTelefono($this->getRequest()->getPost('telefono'));

            $this->getObjectManager()->persist($proveedor);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('modulo1');
        }
        return new ViewModel();
    }

    public function editproveedorAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $proveedor = $this->getObjectManager()->find('\Application\Entity\Proovedor', $id);

        if ($this->request->isPost()) {
            $proveedor->setDireccion($this->getRequest()->getPost('direccion'));
            $proveedor->setNombre($this->getRequest()->getPost('nombre'));
            $proveedor->setRfc($this->getRequest()->getPost('rfc'));
            $proveedor->setTelefono($this->getRequest()->getPost('telefono'));


            $this->getObjectManager()->persist($proveedor);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('modulo1');
        }

        return new ViewModel(array('proveedor' => $proveedor));
    }

    public function deleteproveedorAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $proveedor = $this->getObjectManager()->find('\Application\Entity\Proovedor', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($proveedor);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('modulo1');
        }
        return new ViewModel(array('proveedor'=> $proveedor));
    }

    public function addproductoAction() {
        if ($this->request->isPost()) {
            $producto = new \Application\Entity\Producto;
            $producto->setDescripcion($this->getRequest()->getPost('descripcion'));
            $producto->setFinito($this->getRequest()->getPost('finito'));
            $producto->setId_grupo($this->getRequest()->getPost('grupo'));
            $producto->setMarca($this->getRequest()->getPost('marca'));
            $producto->setPunto_reorden($this->getRequest()->getPost('reorden'));
            $fecha =new \DateTime(date('Y-m-d H:m:s'));
            $producto->setUfecha($fecha);

            $this->getObjectManager()->persist($producto);
            $this->getObjectManager()->flush();
            $newId = $producto->getId();

            return $this->redirect()->toRoute('modulo1');
        }
        return new ViewModel();
    }

    public function editproductoAction() {
        $id = $this->params()->fromRoute('id', 0);
        $producto = $this->getObjectManager()->find('\Application\Entity\Producto', $id);

        if ($this->request->isPost()) {
            $producto = new Producto;
            $producto->setDescripcion($this->getRequest()->getPost('descripcion'));
            $producto->setFinito($this->getRequest()->getPost('finito'));
            $producto->setId_grupo($this->getRequest()->getPost('grupo'));
            $producto->setMarca($this->getRequest()->getPost('marca'));
            $producto->setPunto_reorden($this->getRequest()->getPost('reorden'));
            $producto->setUfecha('2015-10-31 13:04:06');

            $this->getObjectManager()->persist($producto);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('modulo1');
        }
        return new ViewModel(array('producto' => $producto));
    }

    public function deleteproductoAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $producto = $this->getObjectManager()->find('\Application\Entity\Producto', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($producto);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('modulo1');
        }

        return new ViewModel(array('producto'=> $producto));
    }

    public function allproductoAction() {
        $productos = $this->getObjectManager()->getRepository('Application\Entity\Producto')->findAll();
        return new ViewModel(array('productos' => $productos));
    }

    public function allproveedorAction() {
        $proveedores = $this->getObjectManager()->getRepository('Application\Entity\Proovedor')->findAll();
        return new ViewModel(array('proveedores' => $proveedores));
    }

    public function alluserAction() {
        $usuarios = $this->getObjectManager()->getRepository('Application\Entity\Usuario')->findAll();

        return new ViewModel(array('usuarios' => $usuarios));
    }

    protected function getObjectManager() {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }

}
