<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['base_dir'] = str_replace("\\","/",FCPATH);

$config['upload_dir'] = $config['base_dir']."uploads/";

$config['image_path'] = $config['base_dir'].'images/';

$config['templete'] = 'default';

$config['per_page'] = 100;

$config['max_per_page'] = 100;

$config['max_pagination_page'] = 5;

$config['lang'] = array('bangla','english');

