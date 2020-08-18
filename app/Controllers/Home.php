<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
	public $db;
	public $session;
	public $personModel;
	public function __construct()
	{
		$this->db      = \Config\Database::connect();
		$this->session = session();
		$this->personModel = new \App\Models\PersonModel();
	}
	
	public function FormCreate()
	{
		return view('create');
	}
	
	public function create(){

		$post = $this->request->getPost();
		$data = [
			"first_name" => $post['first_name'],
			"last_name" => $post['last_name'],
			"email" => $post['email'],
			"age" => $post['age'],
			"programming" => json_encode($post['programming'])
		];

		$insert = $this->personModel->save($data);
		if($insert){
			$this->session->setFlashdata('success', 'New Data Added');
		}else{
			$this->session->setFlashdata('failed', 'Failed Added New Data');
		}

		return redirect()->to(base_url('/list')); 
	}

	public function list(){
		$view = array();
		$view['row'] = $this->personModel->get();
		return view("read",$view);
	}

	public function FormUpdate(){

		$get = $this->request->getGet();
		$view = array();
		$view['isUpdate']  = 0;
		$view['all'] = $this->personModel->select('id, first_name, last_name')->get();
		if(isset($get['id'])){
			 $view['isUpdate']  = 1;
			$view['row'] = $this->personModel->getWhere(['id' => $get['id']]);
		}
		return view("update",$view);

	}

	public function update(){
		$post = $this->request->getPost();

		$updatedData = [
			'first_name' => $post['first_name'],
			'last_name' => $post['last_name'],
			'email' => $post['email'],
			'age' => $post['age'],
			'programming' => json_encode($post['programming']),
		];


		$update = $this->personModel->update($post['id'], $updatedData);

		if($update){
			$this->session->setFlashdata('success', 'Update Data Success');
		}else{
			$this->session->setFlashdata('failed', 'Failed Update Data');
		}

		return redirect()->to(base_url('/list')); 
	}

	public function FormDelete(){
		$get = $this->request->getGet();

		$view = array();
		$view['isUpdate']  = 0;
		$view['all'] = $this->personModel->select('id, first_name, last_name')->get();
		if(isset($get['id'])){
			 $view['isUpdate']  = 1;
			$view['row'] = $this->personModel->getWhere(['id' => $get['id']]);
		}
		return view("delete",$view);
	}
	
	
	public function delete(){
		$post = $this->request->getPost();

		$update = $this->personModel->where('id', $post['id'])->delete();;

		if($update){
			$this->session->setFlashdata('success', 'Delete Data Success');
		}else{
			$this->session->setFlashdata('failed', 'Failed Delete Data');
		}

		return redirect()->to(base_url('/list')); 
	}
	


}
