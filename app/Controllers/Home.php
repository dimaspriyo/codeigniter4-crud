<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
	public $db;
	public $session;
	public function __construct()
	{
		$this->db      = \Config\Database::connect();
		$this->session = session();
	}
	
	public function index()
	{
		return view('create');
	}
	
	public function create(){

		
		
		$post = $this->request->getPost();
		$builder = $this->db->table('persons');
		$data = [
			"first_name" => $post['first_name'],
			"last_name" => $post['last_name'],
			"email" => $post['email'],
			"age" => $post['age'],
			"programming" => json_encode($post["programming"])
		];

		$insert = $builder->insert($data);
		if($insert){
			$this->session->setFlashdata('success', 'New Data Added');
		}else{
			$this->session->setFlashdata('failed', 'Failed Added New Data');
		}

		return redirect()->to(base_url('home/list')); 
	}

	public function list(){
		$builder = $this->db->table('persons');

		$view = array();
		$view['row'] = $builder->get();
		return view("read",$view);
	}

	public function updateForm(){

		$post = $this->request->getGet();
		$builder = $this->db->table('persons');

		$view = array();
		$view['isUpdate']  = 0;
		$view['row'] = $builder->select('id','first_name','last_name')->get();
		if(isset($post['id'])){
			 $view['isUpdate']  = 1;
			$view['row'] = $builder->select("*")->getWhere(['id' => $post['id']]);
		}
		return view("update",$view);

	}

	public function deleteForm(){

	}
	


}
