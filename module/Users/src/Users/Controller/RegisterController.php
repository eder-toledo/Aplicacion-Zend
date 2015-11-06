<?php
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Users\Form\RegisterForm;
use Zend\Db\Adapter\Adapter;
 

class RegisterController extends AbstractActionController
{
    public $dbAdapter, $datos, $dato;
    
    public function indexAction()
        {
            $form = new RegisterForm();
            $viewModel = new ViewModel(array('form' =>
            $form));
            return $viewModel;
        }
    public function confirmAction()
        {
            $viewModel = new ViewModel();
            return $viewModel;
        }
    public function processAction()
        {
            $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
            $result=$this->dbAdapter->query("select * from usuario order by id_usr desc",Adapter::QUERY_MODE_EXECUTE);
            $this->datos=$result->toArray();
        
            if (!$this->request->isPost()) {
                return $this->redirect()->toRoute(NULL ,
                array( 'controller' => 'register','action' => 'index'));
            }
            $post = $this->request->getPost();
            $form = new RegisterForm();
            $form->setData($post);
            if (!$form->isValid()) {
                $model = new ViewModel(array( 'error' => true,'form' => $form,
                ));
                $model->setTemplate('users/register/index');
                    return $model;
            }
            $dataform = $form->getData();
            foreach($this->datos as $data)
            {
                if($data["nombre"]==$dataform["usuario"])
                {
                    if($data["pwd"]==$dataform["pwd"])
                    {
                        return $this->redirect()->toRoute(NULL , array(
                        'controller' => 'register',
                        'action' => 'confirm'
                        ));
                        $this->dato = $data;
                    }
                    else
                    {
                        $model = new ViewModel(array( 'error' => true,'form' => $form,
                ));
                $model->setTemplate('users/register/index');
                    return $model;
                    }
                }
            }
    }
}
?>
