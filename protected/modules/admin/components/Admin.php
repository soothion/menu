<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin extends CWebUser {

    public function __get($name) {
        if ($this->hasState('__adminInfo')) {
            $user = $this->getState('__adminInfo', array());
            if (isset($user[$name])) {
                return $user[$name];
            }
        }

        return parent::__get($name);
    }

    public function login($identity, $duration = 0) {
        $this->setState('__adminInfo', $identity->getUser());
        parent::login($identity, $duration);
    }

}
