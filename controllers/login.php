<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$id = $this->input->post('id');
		$ic = $this->input->post('ic');  
		
		$this->model_crud->ambillogin($id,$ic);
	}
	
	
}
