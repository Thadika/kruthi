<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller {

	public $data;
	
	public function __construct()
	{
		parent::__construct();
		global $data;
		$this->load->helper('url');
		$this->load->model('loginm');
		$this->loginm->islogin();
		$this->data['logUser']=$this->session->userdata('logUser');
		$this->data['pagination_page'] =filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                'options'   => array(
                'default'   => 1,
                'min_range' => 1,
									),));
		$this->data['pagination_data']=array('limit'=>1000000000,'offset'=>0);
		$this->data['current_url']=BASE .uri_string();
		
		
	}
	public function index()
	{
			$this->load->model('getdata');
			$row_count=count($this->getdata->allbook($this->data['pagination_data']));
            $this->data['pagination_data']=$this->common->pagination_data($row_count,$this->data['pagination_page']);
            $this->data['allbook']=$this->getdata->allbook($this->data['pagination_data']);
			$this->data["cat"] = $this->getdata->categories();
			$this->data["pub"] = $this->getdata->publishers();
            $this->load->view("main",$this->data);
		
	//	print_r($this->data['allbook']);
	
		
	}

	public function addbookview()
	{
		$this->load->model('getdata');
		$this->data["cat"] = $this->getdata->categories();
		$this->data["pub"] = $this->getdata->publishers();
		$this->load->view('addbook', $this->data);
	}
	
	
	public function addbook()
	{
		$this->load->model('getdata');
		$this->getdata->addbook();
		redirect(BASE.'welcome/addbookview'); 
	}

	public function purchases()
	{
			$this->load->model('getdata');
			$row_count=count($this->getdata->purchases($this->data['pagination_data']));
            $this->data['pagination_data']=$this->common->pagination_data($row_count,$this->data['pagination_page']);
            $this->data['purchases']=$this->getdata->purchases($this->data['pagination_data']);
			$this->load->view('purchases',$this->data);
	}

	
	public function getSearch_api(){
			$q   =  $this->input->post('q'); 
			$this->load->model('getdata');
			$table_Datas= $this->getdata->search_books($q);
			$row_count=count($table_Datas);
            $this->data['allbook']=$table_Datas;
			
            $this->load->view("main_table_view",$this->data);
	}
	
	public function getpurchases_api(){
			$q   =  $this->input->post('q'); 
			$this->load->model('getdata');
			$table_Datas= $this->getdata->search_purchases($q);
			$row_count=count($table_Datas);
            $this->data['purchases']=$table_Datas;
			
            $this->load->view("purchases_view",$this->data);
	}
	

	
	public function updatebookfile(){
		$this->load->model('getdata');
		$this->getdata->updatebookfile();
		redirect(BASE.'welcome');
		
		
	}
	
	public function getpurchases_api_date(){
		
			$q   =  $this->input->post('q'); 
			$this->load->model('getdata');
			$row_count=count($this->getdata->purchases($this->data['pagination_data'],$q));
            $this->data['pagination_data']=$this->common->pagination_data($row_count,$this->data['pagination_page']);
			$table_Datas= $this->getdata->search_purchases_by_date($this->data['pagination_data'],$q);
			$row_count=count($table_Datas);
            $this->data['purchases']=$table_Datas;
			
            $this->load->view("purchases_view",$this->data);
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */