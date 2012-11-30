<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends CI_Controller
{
    public function __construct(){	
	parent::__construct();	
	$this->session->set_userdata('page','admin');
    }
    
    public function index(){	
	$this->manageUsers();
    }
    
    public function doAuth(){	
	if(!$this->authex->isAdmin()){
	    redirect("admin/admin_login");
	}
    }
    
    public function admin_login(){
	
	$this->ir_view->registerCSS(array('admin','landing_page'));
	$this->ir_view->registerJS(array('admin'));
	
	$siteName= $this->config->item('site_name');		
	$headerContent = $this->getHeaderContent($siteName, 'Users' );
				
	//$this->registerModal('error');	
	$content = new stdClass;
	if($this->session->userdata('from_error')){
	    $content->error = $this->session->userdata('from_error');
	    $this->session->unset_userdata('from_error');
	}
		
	$this->ir_view->load('admin_login.php', array('content' => $content), $headerContent);
	
    }
    
    
    
    public function getLeftContent($header,$activeItem){
	
	$leftContent['header'] = $header;
	$leftContent['content'] = array( 'Users'=> array('href'=>site_url('admin/manageUsers')),
			      'Categories'=> array('href'=>site_url('admin/manageCategories')),
			      'Toses'=> array('href'=>site_url('admin/manageToses')),
			      'Clauses'=> array('href'=>site_url('admin/manageClauses')),
			      'Reviews'=> array('href'=>site_url('admin/manageReviews')),
			      'Comments'=> array('href'=>site_url('admin/manageComments'))
			    );
	$leftContent['content'][$activeItem]['active'] = true;
	
	return $leftContent;
    }
    
    public function getHeaderContent($title,$activeItem){
	
	$headerContent = array();
	$headerContent['title'] = $title;
	$headerContent['content'] = array( 'Users'=> array('href'=>site_url('admin/manageUsers')),
			      'Categories'=> array('href'=>site_url('admin/manageCategories')),
			      'Toses'=> array('href'=>site_url('admin/manageToses')),
			      'Clauses'=> array('href'=>site_url('admin/manageClauses')),
			      'Reviews'=> array('href'=>site_url('admin/manageReviews')),
			      'Comments'=> array('href'=>site_url('admin/manageComments'))
			    );
	$headerContent['content'][$activeItem]['active'] = true;
	
	
	if($this->authex->isAdmin()){
	    $headerContent['headerRightMenu'] = array(
		"name" => 'Logout',
		"items" => array()
	    );
	    
	    $userInfo = $this->authex->getUserData();    	    
	    $headerContent['headerRightMenu']['name'] = $userInfo->f_name;
//	    $headerContent['headerRightMenu']['items']['Profile'] = array('href'=>'','id'=>'profileBtnId','icon'=>'icon-profile');
	    $headerContent['headerRightMenu']['items']['Logout'] = array('href'=>'','id'=>'logoutBtnId','icon'=>'icon-logout');
	}
	
	return $headerContent;
    }
    
    
    public function addRequestStatus(&$content){
	if( ( $this->uri->segment(3) !== FALSE ) && ( $this->uri->segment(4) !== FALSE ) ){
	    $type = $this->uri->segment(3);
	    $content->$type = urldecode($this->uri->segment(4));	  
	    $content->$type = $this->security->xss_clean($content->$type);
	}
    }
    
    public function getPaginationData($paginationUrl){
	
	$pagination = new stdClass();
	
	$pagination->curPageNo = $this->input->get('pageNo') ? $this->input->get('pageNo') : 1;	
	$pagination->limit = $this->config->item('per_page');	
	$pagination->start = ( $pagination->curPageNo - 1 ) * $pagination->limit;
	
	$pagination->url = $paginationUrl;
	$pagination->max_pagination_page = $this->config->item('max_pagination_page');
	//nicePrint($pagination);
	return $pagination;
    }
    
    public function registerModal($modelName,$modal = null){
	
	if($modal == "")
	    $modal = new stdClass();
	
	$modal->name = 'content';
	$modal->contentName = $modelName;	
	$modal->noHeader = true;
	$modal->noButton = true;
	$modal->action = $modelName.'/add';
	$this->ir_view->registerModal(array($modelName=>$modal));
    }
    
    public function manageUsers(){
	
	$this->doAuth();
	
	$contentName = 'user';
	$contentNamePlural = 'users';
	$uCotentName = ucfirst($contentName);
	$uContentNamePlural = ucfirst($contentNamePlural);
	
	$this->ir_view->registerCSS('admin');
	$this->ir_view->registerJS(array('admin','bootstrap-dropdown','bootstrap-alert'));
			
	
	$this->registerModal($contentName);	
	
	$siteName= $this->config->item('site_name');	
	$leftContent = $this->getLeftContent('Navigation',$uContentNamePlural);
	$headerContent = $this->getHeaderContent($siteName, $uContentNamePlural );
	
	$paginationData = $this->getPaginationData(site_url('admin/manage'.$uContentNamePlural));
		
	$this->load->model($contentName.'_model','content_model');
	$contents = $this->content_model->get($paginationData->start,$paginationData->limit,
		array(),array('reg_time'=>'DESC'));		
		
	
	$content = new stdClass;
	$content->name = $contentName;
	$content->title = $uCotentName." Management";
	$content->description = "Manage $contentNamePlural as you like.";
	$content->data = $contents->data;
	$content->dataCount = $contents->count;	
	$content->itemId = $contentName."_id";
	$content->paginationData = $paginationData;	
	
	$this->addRequestStatus($content);
	
	if($this->session->userdata('from_error')){
	    $content->error = $this->session->userdata('from_error');
	    $this->session->unset_userdata('from_error');
	}

	$content->headers = @get_object_vars($contents->data[0]);
	unset($content->headers['password']);
    
	$this->ir_view->load('manage_content.php',array('content'=>$content),$headerContent,true,$leftContent);    
    
	
    }
    
    public function manageToses(){
	
	$this->doAuth();
	
	$contentName = 'tos';
	$contentNamePlural = 'toses';
	$uCotentName = ucfirst($contentName);
	$uContentNamePlural = ucfirst($contentNamePlural);
	
	$this->ir_view->registerCSS('admin');
	$this->ir_view->registerJS(array('admin','bootstrap-dropdown','bootstrap-alert'));
		
	$this->registerModal($contentName);	
	
	$siteName= $this->config->item('site_name');	
	$leftContent = $this->getLeftContent('Navigation',$uContentNamePlural);
	$headerContent = $this->getHeaderContent($siteName, $uContentNamePlural );
	
	$paginationData = $this->getPaginationData(site_url('admin/manage'.$uContentNamePlural));
		
	$this->load->model($contentName.'_model','content_model');
	$contents = $this->content_model->get($paginationData->start,$paginationData->limit,
		array(),array('title'=>'DESC'));		
		
	
	$content = new stdClass;
	$content->name = $contentName;
	$content->title = $uCotentName." Management";
	$content->description = "Manage $contentNamePlural as you like.";
	$content->data = $contents->data;
	$content->dataCount = $contents->count;	
	$content->itemId = $contentName."_id";
	$content->paginationData = $paginationData;
	
	$this->addRequestStatus($content);

	$content->headers = @get_object_vars($contents->data[0]);
	
    
	$this->ir_view->load('manage_content.php',array('content'=>$content),$headerContent,true,$leftContent);    
    
    }
    
    public function manageClauses(){
	
	$this->doAuth();
	
	$contentName = 'clause';
	$contentNamePlural = 'clauses';
	$uCotentName = ucfirst($contentName);
	$uContentNamePlural = ucfirst($contentNamePlural);
	
	$this->ir_view->registerCSS('admin');
	$this->ir_view->registerJS(array('admin','bootstrap-dropdown','bootstrap-alert'));
	
	$this->load->model($contentName.'_model','content_model');
	
	$this->load->model('tos_model');
	$this->load->model('category_model');
		
	$clauses = $this->content_model->get(0,-1,array('type'=>'current'),array('title'=>'ASC'));
	$toses = $this->tos_model->get(0,-1,array(),array('title'=>'ASC'));
	$categories = $this->category_model->get(0,-1,array(),array('title'=>'ASC'));
	
	$modal = new stdClass;
	$modal->contentData['clauses'] = $clauses->data;	
	$modal->contentData['toses'] = $toses->data;	
	$modal->contentData['categories'] = $categories->data;	
	
	$this->registerModal($contentName,$modal);	
	
	$siteName= $this->config->item('site_name');	
	$leftContent = $this->getLeftContent('Navigation',$uContentNamePlural);
	$headerContent = $this->getHeaderContent($siteName, $uContentNamePlural );
	
	$paginationData = $this->getPaginationData(site_url('admin/manage'.$uContentNamePlural));
		
	
	$contents = $this->content_model->get($paginationData->start,$paginationData->limit,
		array(),array('clause_index'=>'ASC'));		
		
	
	$content = new stdClass;
	$content->name = $contentName;
	$content->title = $uCotentName." Management";
	$content->description = "Manage $contentNamePlural as you like.";
	$content->data = $contents->data;
	$content->dataCount = $contents->count;	
	$content->itemId = $contentName."_id";
	$content->paginationData = $paginationData;
	
	$this->addRequestStatus($content);

	$content->headers = @get_object_vars($contents->data[0]);
	
    
	$this->ir_view->load('manage_content.php',array('content'=>$content),$headerContent,true,$leftContent);    
    
    }
    
    public function manageReviews(){	
	
	$this->doAuth();
	
	$contentName = 'review';
	$contentNamePlural = 'reviews';
	$uCotentName = ucfirst($contentName);
	$uContentNamePlural = ucfirst($contentNamePlural);
	
	$this->ir_view->registerCSS('admin');
	$this->ir_view->registerJS(array('admin','bootstrap-dropdown','bootstrap-alert'));
		
	$this->load->model($contentName.'_model','content_model');
	
	$this->load->model('user_model');
	
	$users = $this->user_model->get(0,-1,array(),array('f_name'=>'ASC'));
		
	$modal = new stdClass;	
	$modal->contentData['users'] = $users->data;	
	
	$this->registerModal($contentName,$modal);	
	
	$siteName= $this->config->item('site_name');	
	$leftContent = $this->getLeftContent('Navigation',$uContentNamePlural);
	$headerContent = $this->getHeaderContent($siteName, $uContentNamePlural );
	
	$paginationData = $this->getPaginationData(site_url('admin/manage'.$uContentNamePlural));
		
	
	$contents = $this->content_model->get($paginationData->start,$paginationData->limit,
		array(),array('like_dislike'=>'DESC'));		
		
	$size = count($contents->data);
	for($i=0;$i<$size;$i++){
	    $contents->data[$i]->review_id = $contents->data[$i]->type_id;
	}
	
	$content = new stdClass;
	$content->name = $contentName;
	$content->title = $uCotentName." Management";
	$content->description = "Manage $contentNamePlural as you like.";
	$content->data = $contents->data;
	$content->dataCount = $contents->count;	
	$content->itemId = $contentName."_id";
	$content->paginationData = $paginationData;
	
	$this->addRequestStatus($content);

	$content->headers = @get_object_vars($contents->data[0]);
	unset($content->headers['review_id']);
    
	$this->ir_view->load('manage_content.php',array('content'=>$content),$headerContent,true,$leftContent);    
    }
    
    public function manageComments(){
	
	$this->doAuth();
	
	$contentName = 'comment';
	$contentNamePlural = 'comments';
	$uCotentName = ucfirst($contentName);
	$uContentNamePlural = ucfirst($contentNamePlural);
	
	$this->ir_view->registerCSS('admin');
	$this->ir_view->registerJS(array('admin','bootstrap-dropdown','bootstrap-alert'));
			
	$this->load->model($contentName.'_model','content_model');
	
	$this->load->model('user_model');
	$this->load->model('clause_model');
		
	$comments = $this->content_model->get(0,-1,array(),array('time'=>'ASC'));
	$users = $this->user_model->get(0,-1,array(),array('f_name'=>'ASC'));
	$clauses = $this->clause_model->get(0,-1,array(),array('title'=>'ASC'));
	
	$modal = new stdClass;
	$modal->contentData['comments'] = $comments->data;
	$modal->contentData['clauses'] = $clauses->data;	
	$modal->contentData['users'] = $users->data;	
	
	$this->registerModal($contentName,$modal);	
	
	$siteName= $this->config->item('site_name');	
	$leftContent = $this->getLeftContent('Navigation',$uContentNamePlural);
	$headerContent = $this->getHeaderContent($siteName, $uContentNamePlural );
	
	$paginationData = $this->getPaginationData(site_url('admin/manage'.$uContentNamePlural));
		
	
	$contents = $this->content_model->get($paginationData->start,$paginationData->limit,
		array(),array('time'=>'DESC'));		
		
	
	$content = new stdClass;
	$content->name = $contentName;
	$content->title = $uCotentName." Management";
	$content->description = "Manage $contentNamePlural as you like.";
	$content->data = $contents->data;
	$content->dataCount = $contents->count;	
	$content->itemId = $contentName."_id";
	$content->paginationData = $paginationData;
	
	$this->addRequestStatus($content);

	$content->headers = @get_object_vars($contents->data[0]);
	
    
	$this->ir_view->load('manage_content.php',array('content'=>$content),$headerContent,true,$leftContent);    
    
	
	
    }
    public function manageCategories(){
	
	$this->doAuth();
	
	$contentName = 'category';
	$contentNamePlural = 'categories';
	$uCotentName = ucfirst($contentName);
	$uContentNamePlural = ucfirst($contentNamePlural);
	
	$this->ir_view->registerCSS('admin');
	$this->ir_view->registerJS(array('admin','bootstrap-dropdown','bootstrap-alert'));
	
	$this->load->model($contentName.'_model','content_model');
		
	$modalData = $this->content_model->get(0,-1,array(),array('title'=>'ASC'));
	
	$modal = new stdClass;
	$modal->contentData['categories'] = $modalData->data;
	$this->registerModal($contentName,$modal);	
	
	$siteName= $this->config->item('site_name');	
	$leftContent = $this->getLeftContent('Navigation',$uContentNamePlural);
	$headerContent = $this->getHeaderContent($siteName, $uContentNamePlural );
	
	$paginationData = $this->getPaginationData(site_url('admin/manage'.$uContentNamePlural));
		
	
	$contents = $this->content_model->get($paginationData->start,$paginationData->limit,
		array(),array('title'=>'DESC'));		
		
	
	$content = new stdClass;
	$content->name = $contentName;
	$content->title = $uCotentName." Management";
	$content->description = "Manage $contentNamePlural as you like.";
	$content->data = $contents->data;
	$content->dataCount = $contents->count;	
	$content->itemId = $contentName."_id";
	$content->paginationData = $paginationData;
	
	$this->addRequestStatus($content);

	$content->headers = @get_object_vars($contents->data[0]);
	
    
	$this->ir_view->load('manage_content.php',array('content'=>$content),$headerContent,true,$leftContent);    
    
    }
    
    
    
}

?>
