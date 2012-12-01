<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_Forms extends MY_Controller {

    function index() {        
        $this->bootstrap->viewLoader(
                'user/create'
        );
        $this->bootstrap->viewLoader(
                'meeting/create'
        );
        $this->bootstrap->viewLoader(
                'department/create'
        );

    }

}

