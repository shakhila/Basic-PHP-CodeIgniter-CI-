<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_crud extends CI_Model {

	
	public function ambillogin($table_name,$username,$ic) //CHECK & GET USER'S DATA AFTER LOGIN
	{
		$this->db->where('username', $username);
		$this->db->where('ic', $ic);
		 
		$get_user = $this->db->get($table_name);
		
		if ($get_user > 0)
		{
			return $get_user->row();
		}
		else
		{
			return false;
		}
	}

	public function getUser($table_name) //RETRIEVE USER'S DATA 
	{
		$get_user = $this->db->get($table_name);
		return $get_user->result_array(); 
	}
	
	public function tambahData($table_name,$data) //ADD USER'S DATA
	{
		$tambah = $this->db->insert($table_name,$data);
		return $tambah;
	}
	
	public function hapusData($table_name,$ic) //DELETE USER'S DATA
	{
		$this->db->where('ic',$ic);
		$hapus = $this->db->delete($table_name);
		return $hapus;
	}

	public function editData($table_name,$data,$ic) //UPDATE USER'S DATA
	{
		$this->db->where('ic',$ic);
		$edit = $this->db->update($table_name,$data);
		return $edit;
	}

	public function updateProfile($table_name,$data,$id) //UPDATE TEACHER DATA
	{
		$this->db->where('id',$id);
		$edit = $this->db->update($table_name,$data);
		return $edit;
	}
	
	public function dataEdit($table_name,$ic) //RETRIEVE USER'S DATA TO DISPLAY IN UPDATE FORM
	{
		$this->db->where('ic',$ic);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function displayEdit($table_name,$id) //RETRIEVE USER'S DATA TO DISPLAY IN UPDATE FORM
	{
		$this->db->where('id',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function cari($table_name,$berdasarkan,$yangdicari) //SEARCH STUDENT
	{
		switch($berdasarkan)
		{
			case "":
				$this->db->like('name',$yangdicari);
				$this->db->or_like('ic',$yangdicari);
				$this->db->or_like('address',$yangdicari);
				$this->db->or_like('fatherName',$yangdicari);
				$this->db->or_like('motherName',$yangdicari);
				$this->db->or_like('phone',$yangdicari);
			break;

			default:
				$this->db->like($berdasarkan,$yangdicari);
		}

		$get_user = $this->db->get($table_name);
		return $get_user->result_array();
	}
	
}
