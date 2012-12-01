<?php

class Viewtest extends MY_Controller {

    function index() {
        $this->bootstrap->viewLoader(
                'user/create'
        );
        

    }

}

