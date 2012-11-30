<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class IR_View {

    private $_CI;
    
    private $_default_js = array();
    private $_default_css = array();
    
    private $_css_array = array();
    private $_js_array = array();
    
    private $_default_modals = array();
    private $_modals = array();
    
    public function __construct(){
	$this->_CI = &get_instance();	
	$this->init();
    }
    
    public function init(){	
	$this->_default_css = $this->_CI->config->item('default_css');
	$this->_default_js = $this->_CI->config->item('default_js');
	$this->_default_modals = $this->_CI->config->item('default_modals');
	
	$this->_CI->config->set_item('image_url','images/');
	
	$this->initNoticeIndex();
    }
    
    public function initNoticeIndex(){
	$notices = $this->_CI->config->item('notices');
	$temp = array();
	$i=0;
	foreach ($notices as $key => $value) {
	    $temp[$key] = $i++;
	}
	 $this->_CI->config->set_item('notices_index',$temp);
    }
    
    
    public function registerCSS($css){
	if(is_array($css)){
	    foreach($css as $aCss){
		array_push($this->_css_array,$aCss);
	    }
	}else{
	    array_push($this->_css_array,$css);
	}
    }
     public function registerJS($js){
	if(is_array($js)){
	    foreach($js as $aJs){
		array_push($this->_js_array,$aJs);
	    }
	}else{
	    array_push($this->_js_array,$js);
	}
    }
    
    public function registerModal($modals){
	if(is_array($modals)){
	    foreach($modals as $aModal){
		array_push($this->_modals,$aModal);
	    }
	}else{
	    array_push($this->_modals,$modals);
	}
    }
    
    
    public function loadHeader($css,$headerContent){	
	
	$this->_CI->load->view('html_head.php',$css);
	$this->_CI->load->view('header.php',array('headerContent'=>$headerContent));
    }
    
    public function getTempleteName(){
	return $this->_CI->config->item('templete');
    }
    
    public function getImageDirUrl(){
	return base_url().$this->_CI->config->item('image_url');
    }
    public function getImageDirPath(){
	return base_url().$this->_CI->config->item('image_path');
    }
    
    public function loadFooter($jsArray){
	$this->_CI->load->view('footer.php',$jsArray);
    }
    
    public function load($viewName,$data,$headerContent,$leftbar=false,$leftContent="")
    {
	$cssArray = array_merge($this->_default_css,$this->_css_array);
	$jsArray = array_merge($this->_default_js,$this->_js_array);
//	$jsCssArray = array('css'=>$cssArray,'js'=>$jsArray);	
		
	$this->loadHeader(array('css'=>$cssArray),$headerContent);
	if($leftbar)
	    $this->_CI->load->view('left_content.php',array('leftContent'=>$leftContent));
	$this->_CI->load->view($viewName,$data);
	$this->loadFooter(array('js'=>$jsArray,'modals'=>$this->_modals));
	
    }
    
    function getErrorIndex($key){
	$noticesIndex = $this->_CI->config->item('notices_index');
	return $noticesIndex[$key];
    }
    function getErrorMsg($contentName,$key){
	$notices = $this->_CI->config->item('notices');
	return str_replace('%content%',$contentName,$notices[$key]);
    }
}

/* End of file Someclass.php */