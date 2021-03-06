<?php
namespace Users\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class UserTable
    {
        protected $tableGateway;
        public function __construct(TableGateway $tableGateway)
            {
                $this->tableGateway = $tableGateway;
            }
        
        public function saveUser(User $user)
            {
                $data = array(
                    'correo' => $user->correo,
                    'nombre' => $user->nombre,
                    'contra' => $user->contra,
                    'edad' => $user->edad,
                    'sexo' => $user->sexo,
                );
                $id = (int)$user->id;
                if ($id == 0) {
                    $this->tableGateway->insert($data);
                } else {
                if ($this->getUser($id)) {
                    $this->tableGateway->update($data, array('id' => $id));
                } else {
                    throw new \Exception('User ID does not exist');
                }
                }
            }
    
        public function fetchAll()
            {
                $resultSet = $this->tableGateway->select();
                return $resultSet;
            }    
            
        public function getUser($id)
            {
                $id = (int) $id;
                $rowset = $this->tableGateway->select(array('id' => $id));
                $row = $rowset->current();
                if (!$row) {
                    throw new \Exception("Could not find row $id");
                }
                return $row;
            }
        
        public function getUserByEmail($userEmail)
            {
                $rowset = $this->tableGateway->select(array('correo' =>
                $userEmail));
                $row = $rowset->current();
                if (!$row) {
                    throw new \Exception("Could not find row $ userEmail");
                }
                return $row;
            }
        
        public function deleteUser($id)
            {
                $this->tableGateway->delete(array('id' => $id));
            }
    }
?>