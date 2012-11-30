<?php

class Viewtest extends CI_Controller {

    function index() {
        $this->bootstrap->viewLoader(
                'user/create'
        )

        ;
    }

}

