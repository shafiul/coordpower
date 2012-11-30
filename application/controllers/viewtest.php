<?php

class Viewtest extends CI_Controller {

    function index() {
        $this->bootstrap->viewLoader(
                'test', array('titles' => 'Hello, world'))

        ;
    }

}
