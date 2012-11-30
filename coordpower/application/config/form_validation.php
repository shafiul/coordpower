<?php

$config = array(
    'login' => array(
	array(
	    'field' => 'email',
	    'label' => 'Email',
	    'rules' => 'trim|required|valid_email|xss_clean'
	),
	array(
	    'field' => 'password',
	    'label' => 'Password',
	    'rules' => 'trim|required|xss_clean'
	)
    ),
    'user_register' => array(
	array(
	    'field' => 'email',
	    'label' => 'Email',
	    'rules' => 'trim|required|valid_email|xss_clean'
	),
	array(
	    'field' => 'password',
	    'label' => 'Password',
	    'rules' => 'trim|required|min_length[6]|max_length[14]|xss_clean'
	),
	array(
	    'field' => 'f_name',
	    'label' => 'First Name',
	    'rules' => 'trim|required|max_length[20]|alpha_numeric|xss_clean'
	),
	array(
	    'field' => 'l_name',
	    'label' => 'Last Name',
	    'rules' => 'trim|alpha|xss_clean'
	),
	array(
	    'field' => 'phone',
	    'label' => 'Phone',
	    'rules' => 'trim|required|numeric|xss_clean'
	),
	array(
	    'field' => 'address',
	    'label' => 'address',
	    'rules' => 'trim|required|max_length[250]|xss_clean'
	)
    ),
    'user_edit' => array(
	array(
	    'field' => 'email',
	    'label' => 'Email',
	    'rules' => 'trim|required|valid_email|xss_clean'
	),
	array(
	    'field' => 'password',
	    'label' => 'Password',
	    'rules' => 'trim|xss_clean'
	),
	array(
	    'field' => 'f_name',
	    'label' => 'First Name',
	    'rules' => 'trim|required|max_length[20]|alpha|xss_clean'
	),
	array(
	    'field' => 'l_name',
	    'label' => 'Last Name',
	    'rules' => 'trim|alpha|xss_clean'
	),
	array(
	    'field' => 'phone',
	    'label' => 'Phone',
	    'rules' => 'trim|required|numeric|xss_clean'
	),
	array(
	    'field' => 'address',
	    'label' => 'address',
	    'rules' => 'trim|required|max_length[250]|xss_clean'
	)
    ),
    'user_delete' => array(
	array(
	    'field' => 'userIds',
	    'label' => 'User Id',
	    'rules' => 'trim|xss_clean'
	)
    ),
    'comment_add' => array(
	array(
	    'field' => 'body',
	    'label' => 'comment',
	    'rules' => 'trim|required|max_length[500]|xss_clean'
	),
	array(
	    'field' => 'clause_id',
	    'label' => 'Clause Id',
	    'rules' => 'trim|required|integer|xss_clean'
	),array(
	    'field' => 'parent_id',
	    'label' => 'Parent Id',
	    'rules' => 'trim|integer|xss_clean'
	)
    )
    
);
