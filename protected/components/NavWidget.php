<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NavWidget extends CWidget {
    public function run() {
        $restaurant=  Restaurant::model()->findAll();
        $this->render('nav',array('restaurant'=>$restaurant));
    }
}

