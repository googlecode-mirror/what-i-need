<?php

class WebUser extends CWebUser {
    private $_model = null;
 
    function getRole() {
        if($user = $this->getModel()){
            // в таблице User есть поле level
            return $user->level;
        }
    }
 
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'level'));
        }
        return $this->_model;
    }
}