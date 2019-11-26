<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Model_test extends CI_Model
{
    public function view($table_name)
    {
        $hasil = $this->db->get($table_name);
        return $hasil->result_array();
    }

    public function create($table_name,$data)
    {
        $add = $this->db->insert($table_name,$data);
        return $add;
    }

    public function viewUpdate($table_name,$ic)
    {
        $this->db->where('ic',$ic);
        $hasil = $this->db->get($table_name);
        return $hasil->row();
    }

    public function update($table_name,$data,$ic)
    {
        $this->db->where('ic',$ic);
        $hasil = $this->db->update($table_name,$data);
        return $hasil;
    }

    public function delete($table_name,$ic)
    {
        $this->db->where('ic',$ic);
        $hasil = $this->db->delete($table_name);
        return $hasil;
    }

    public function views($table_name,$ic)
	{
        $this->db->where('ic',$ic);
        $hasil = $this->db->get($table_name);
        return $hasil->row();
	}
}