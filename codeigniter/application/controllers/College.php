<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class College extends CI_Controller {
	var $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		
		$this->data = array();
		$this->data['header'] = $this->load->view("header",null,true);
		$this->data['left_menu'] = $this->load->view("menu",null,true);
		$this->data['footer'] = $this->load->view("footer",null,true);
	}
	public function index()
	{
		$sql = 'SELECT * FROM college';
		$query = $this->db->query($sql);
		$this->data['items'] = $query->result();
		
		$this->load->view('college/list',$this->data);
	}
	public function add()
	{
		if($this->input->method()=='post'){
			$name = $this->input->post('name');
			$status = $this->input->post('status');
			$sql = "INSERT INTO college (name,status) 
						VALUES (".$this->db->escape($name).", ".$status.")";
			$this->db->query($sql);
			
			redirect('college');
		}
		
		$this->load->view('college/add',$this->data);
	}
	public function edit($id)
	{
		if($this->input->method()=='post'){
			$name = $this->input->post('name');
			$status = $this->input->post('status');
			$sql = "UPDATE college SET name=".$this->db->escape($name)
						.", status=".$status
						." WHERE id=".$id;
			$this->db->query($sql);
				
			redirect('college');
		}
		
		$sql = 'SELECT * FROM college WHERE id='.$id;
		$query = $this->db->query($sql);
		$colleges = $query->result();
		$this->data['item'] = null;
		if(count($colleges)){
			$this->data['item'] = $colleges[0];
		}
		
		$this->load->view('college/edit',$this->data);
	}
	public function delete($id)
	{
		$sql = "DELETE FROM college WHERE id=".$id;
		$this->db->query($sql);
		redirect('college');
	}
}
