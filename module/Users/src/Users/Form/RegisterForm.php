<?php
// filename : module/Users/src/Users/Form/RegisterForm.php
namespace Users\Form;

use Zend\Form\Form;

class RegisterForm extends Form
{
public function __construct($name = null)
{
    parent::__construct('Register');
    $this->setAttribute('method', 'post');
    $this->setAttribute('enctype','multipart/formdata');
    //Nombre completo
    $this->add(array(
                'name' => 'usuario',
                'attributes' => array(
                    'type' => 'text',
                ),
                'options' => array(
                    'label' => 'Nombre Usuario',
                ),
    ));
    //Contraseña
    $this->add(array(
                'name' => 'pwd',
                'attributes' => array(
                    'type' => 'text',
                ),
                'options' => array(
                    'label' => 'Contraseña Usuario',
                ),
    ));
    //Boton submit
    $this->add(array(
                'name' => 'submit',
                'type' => 'Submit',
                'attributes' => array(
                    'value' => 'Enviar',
                    'id' => 'submitbutton',
                ),
    ));
}
}
?>