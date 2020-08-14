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
	
	public function FormCreate()
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
			"programming" => json_encode($post['programming'])
		];

		$insert = $builder->insert($data);
		if($insert){
			$this->session->setFlashdata('success', 'New Data Added');
		}else{
			$this->session->setFlashdata('failed', 'Failed Added New Data');
		}

		return redirect()->to(base_url('/list')); 
	}

	public function list(){
		$builder = $this->db->table('persons');

		$view = array();
		$view['row'] = $builder->get();
		return view("read",$view);
	}

	public function FormUpdate(){

		$get = $this->request->getGet();
		$builder = $this->db->table('persons');

		$view = array();
		$view['isUpdate']  = 0;
		$view['all'] = $builder->select('id, first_name, last_name')->get();
		if(isset($get['id'])){
			 $view['isUpdate']  = 1;
			$view['row'] = $builder->getWhere(['id' => $get['id']]);
		}
		return view("update",$view);

	}

	public function update(){
		$post = $this->request->getPost();
		$builder = $this->db->table('persons');

		$updatedData = [
			'first_name' => $post['first_name'],
			'last_name' => $post['last_name'],
			'email' => $post['email'],
			'age' => $post['age'],
			'programming' => json_encode($post['programming']),
		];


		$builder->set('first_name',$post['first_name']);
		$builder->set('last_name',$post['last_name']);
		$builder->set('email',$post['email']);
		$builder->set('age',$post['age']);
		$builder->set('programming',json_encode($post['programming']));
		$builder->where('id',$post['id']);
		$update = $builder->update();

		if($update){
			$this->session->setFlashdata('success', 'Update Data Success');
		}else{
			$this->session->setFlashdata('failed', 'Failed Update Data');
		}

		return redirect()->to(base_url('/list')); 
	}

	public function FormDelete(){
		$get = $this->request->getGet();
		$builder = $this->db->table('persons');

		$view = array();
		$view['isUpdate']  = 0;
		$view['all'] = $builder->select('id, first_name, last_name')->get();
		if(isset($get['id'])){
			 $view['isUpdate']  = 1;
			$view['row'] = $builder->getWhere(['id' => $get['id']]);
		}
		return view("delete",$view);
	}
	
	
	public function delete(){
		$post = $this->request->getPost();
		$builder = $this->db->table('persons');


		$builder->where('id', $post['id']);
		$update = $builder->delete();;

		if($update){
			$this->session->setFlashdata('success', 'Delete Data Success');
		}else{
			$this->session->setFlashdata('failed', 'Failed Delete Data');
		}

		return redirect()->to(base_url('/list')); 
	}
	


}
