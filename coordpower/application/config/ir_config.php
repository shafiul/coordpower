<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['base_dir'] = str_replace("\\","/",FCPATH);

$config['upload_dir'] = $config['base_dir']."uploads/";

$config['image_path'] = $config['base_dir'].'images/';

$config['templete'] = 'default';

$config['site_name']	= 'TOS SURVERY';

$config['app_name']	= 'google';

$config['default_css'] = array('smoothness/jquery-ui-1.8.21.custom','bootstrap','bootstrap-responsive','common');

$config['default_js'] = array('jquery-1.7.2.min','jquery-ui-1.8.21.custom.min','bootstrap-transition','bootstrap-modal','bootstrap-button','common');

$config['default_modal'] = array();


$config['notices'] = array(
			    "CONTENT_ADD_SUCCESS" => "New %content% added successfully.",
			    "CONTENT_ADD_FAIL" => "Unable to add new %content%.",
			    "CONTENT_UPDATE_SUCCESS" => "%content% update successfully.",
			    "CONTENT_UPDATE_FAIL" => "Unable to update %content%.",
			    "CONTENT_REMOVE_SUCCESS" => "%content% removed successfully.",
			    "CONTENT_REMOVE_FAIL" => "Unable to add new %content%."
			   );

$config['notices_index'] = array();

$config['per_page'] = 100;

$config['max_per_page'] = 100;

$config['max_pagination_page'] = 5;


$config['default_user_pass'] = 'fs56wfAajFlas';