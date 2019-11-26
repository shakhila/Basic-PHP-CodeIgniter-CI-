<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller{

	/****************************************FIRST PAGE***********************************************/
	
	public function index()
	{
		$this->load->model('model_test');
		$this->data['hasil'] = $this->model_test->view('student');
		$this->load->view('first',$this->data);
	}

	public function pageCreate()
	{
		$this->load->view('pageCreate');
	}

	public function create()
	{
		$name = $this->input->post('name');
		$ic = $this->input->post('ic');
		$address = $this->input->post('address');

		$data = array('name' => $name, 'ic' => $ic, 'address' => $address);
		$this->load->model('model_test');
		$add = $this->model_test->create('student',$data);

		if($add > 0)
		{
			redirect ('Welcome/index');
		}
		else
		{
			echo 'Fail';
		}

	}

	public function pageUpdate($ic)
	{
		$this->load->model('model_test');
		$this->data['hasil'] = $this->model_test->viewUpdate('student',$ic);
		$this->load->view('pageUpdate', $this->data);
	}

	public function update()
	{
		$name=$this->input->post('name');
		$ic=$this->input->post('ic');
		$address=$this->input->post('address');

		$data = array('name' => $name, 'ic' => $ic, 'address' => $address);
		$this->load->model('model_test');
		$hasil = $this->model_test->update('student',$data,$ic);
		if($hasil > 0)
		{
			redirect('Welcome/index');
		}
		else
		{
			echo 'Fail';
		}
	}

	public function deletes($ic)
	{
		$this->load->model('model_test');
		$hasil = $this->model_test->delete('student',$ic);
		if($hasil > 0)
		{
			redirect('Welcome/index');
		}
		else
		{
			echo 'Fail';
		}
	}

	public function views($ic)
	{
		$this->load->model('model_test');
		$this->data['hasil'] = $this->model_test->views('student',$ic);
		$this->load->view('view2',$this->data);
	}
	/*#####################################END FIRST PAGE#############################################*/



	/**********************************PAGE DISPLAY FUNCTIONS******************************************/
	
	public function login_form() //LOGIN PAGE
	{
		$this->load->view('login');
	}

	public function logout() //LOGOUT DESTROY
	{
		$this->session->unset_userdata('username');  
		redirect('Welcome/index');
	}
	
	public function createTeacher() //CREATE TEACHER PAGE
	{
		$this->load->view('createTeacher');
	}
	
	public function createSuccess() //DISPLAY PAGE FOR TEACHER AFTER SUCCESS REGISTER
	{
		$this->load->view('createSuccess');
	}

	public function updateSuccess() //DISPLAY PAGE FOR TEACHER AFTER SUCCESS UPDATE
	{
		$this->session->unset_userdata('username');  
		$this->load->view('updateSuccess');
	}
	
	public function homeTeacher() //HOME PAGE FOR TEACHER AFTER LOGIN
	{
		if($this->session->userdata('username') != '')  
			{
				$this->load->view('homeTeacher');
			}
		else  
           {  
                redirect('Welcome/login_form');  
           }  
	}

	public function teacherProfile() //DISPLAY TEACHERS PROFILE
	{
		if($this->session->userdata('username') != '')  
			{
				$this->load->view('teacherProfile');
			}
		else  
           {  
                redirect('Welcome/login_form');  
           }  
	}

	public function viewStudent() //DISPLAY LIST OF STUDENT
	{
		if($this->session->userdata('username') != '')  
			{
				$this->data['hasil'] = $this->model_crud->getUser('student');
				$this->load->view('viewStudent', $this->data);
			} 
		else  
           {  
                redirect('Welcome/login_form');  
           }
	}
	
	public function createStudent() //PAGE TO CREATE STUDENT
	{
		if($this->session->userdata('username') != '')  
			{
				$this->load->view('createStudent');
			}
		else  
           {  
                redirect('Welcome/login_form');  
           }
	}

	public function form_edit($ic) //PAGE TO UPDATE STUDENT
	{
		$this->data['dataEdit'] = $this->model_crud->dataEdit('student',$ic);
		$this->load->view('updateStudent',$this->data);
	}

	public function pageProfile($id) //PAGE TO UPDATE TEACHER PROFILE
	{
		$this->data['dataEdit'] = $this->model_crud->displayEdit('teacher',$id);
		$this->load->view('updateProfile',$this->data);
	}

	/*#############################END PAGE DISPLAY FUNCTIONS########################################*/



	/*************************************LOGIN FUNCTION**********************************************/

	public function ceklog()
	{
		$username = $this->input->post('username'); //fetch data from login page
		$ic = $this->input->post('ic');
		
		$teacher = $this->model_crud->ambillogin('teacher',$username,$ic); //call function in model to check & retreive data's of the user

		if($teacher > 0) //if data's user is not empty
                {  
                     $session_data = array(                 //assign data from models to an array
						  'username'     =>     $username,
						  'id'           =>     $teacher -> id,  
						  'ic'         =>     $teacher -> ic,
						  'name'         =>     $teacher -> name,
						  'address'         =>     $teacher -> address,
						  'email'         =>     $teacher -> email,
						  'phone'         =>     $teacher -> phone
                     );  
                     $this->session->set_userdata($session_data);   //set session to be use in every page
                     redirect('Welcome/homeTeacher');  
                }  
        else  //if data's user is not in db
                {  
                     $this->session->set_flashdata('info', 'Invalid Username and Password');  
                     redirect('Welcome/login_form');  
                }  
	}

	/*#################################END LOGIN FUNCTION############################################*/



	/************************************TEACHER FUNCTIONS********************************************/
						
	public function create_teacher() //CREATE TEACHER
	{
		$id = $_POST['id']; //$id = $this->input->post('id')
		$ic = $_POST['ic'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$username = $_POST['username'];
		$data = array('id' => $id, 'ic' => $ic, 'name' => $name, 'address' => $address, 'email' => $email, 'phone' => $phone, 'username' => $username);
		$tambah = $this->model_crud->tambahData('teacher',$data);
		
		if($tambah > 0)
		{
			redirect('Welcome/createSuccess');
		}
		else
		{
			echo 'gagal';
		}
	}

	public function updateProfile($id) //UPDATE TEACHER PROFILE
	{
		$name = $_POST['name'];
		$id = $_POST['id'];
		$ic = $_POST['ic'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$data = array('name' => $name, 'id' => $id, 'ic' => $ic, 'address' => $address, 'email' => $email, 'phone' => $phone);
		$edit = $this->model_crud->updateProfile('teacher',$data,$id);
		
		if($edit > 0)
		{
			redirect('Welcome/updateSuccess');
		}
		else
		{
			echo 'gagal';
		}
	}


	/*################################END TEACHER FUNCTIONS##########################################*/



	/************************************STUDENT FUNCTIONS********************************************/

	public function insert() //CREATE STUDENT
	{
		$name = $_POST['name'];
		$ic = $_POST['ic'];
		$address = $_POST['address'];
		$fatherName = $_POST['fatherName'];
		$motherName = $_POST['motherName'];
		$phone = $_POST['phone'];
		$data = array('name' => $name, 'ic' => $ic, 'address' => $address, 'fatherName' => $fatherName, 'motherName' => $motherName, 'phone' => $phone);
		$tambah = $this->model_crud->tambahData('student',$data);
		
		if($tambah > 0)
		{
			redirect('Welcome/viewStudent');
		}
		else
		{
			echo 'gagal';
		}
	}
	
	
	
	public function delete($ic) //DELETE STUDENT
	{
		$hapus = $this->model_crud->hapusData('student',$ic);
		
		if($hapus > 0)
		{
			redirect('Welcome/viewStudent');
		}
		else
		{
			echo 'gagal';
		}
	}

	public function updates($ic) //UPDATE STUDENT
	{
		$name = $_POST['name'];
		$ic = $_POST['ic'];
		$address = $_POST['address'];
		$fatherName = $_POST['fatherName'];
		$motherName = $_POST['motherName'];
		$phone = $_POST['phone'];
		$data = array('name' => $name, 'ic' => $ic, 'address' => $address, 'fatherName' => $fatherName, 'motherName' => $motherName, 'phone' => $phone);
		$edit = $this->model_crud->editData('student',$data,$ic);
		
		if($edit > 0)
		{
			redirect('Welcome/viewStudent');
		}
		else
		{
			echo 'gagal';
		}
	}

	public function cari() //SEARCH STUDENT
	{
		$data['cariberdasarkan']=$this->input->post('cariberdasarkan');
		$data['yangdicari']=$this->input->post('yangdicari');

		$this->data['hasil'] = $this->model_crud->cari('student',$data['cariberdasarkan'],$data['yangdicari']);

		$this->data["jumlah"]=count($this->data['hasil']);

		$this->load->view("viewStudent",$this->data);
	}

	/*######################################END STUDENT FUNCTIONS#########################################*/

}
