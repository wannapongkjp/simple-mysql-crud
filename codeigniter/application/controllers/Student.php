<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
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
		$sql = 'SELECT student.*, college.name as college_name FROM student LEFT JOIN college ON(student.college_id=college.id)';
		$query = $this->db->query($sql);
		$this->data['items'] = $query->result();
		
		$this->load->view('student/list',$this->data);
	}
	public function add()
	{
		if($this->input->method()=='post'){
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$college_id = $this->input->post('college_id');
			$status = $this->input->post('status');
			$sql = "INSERT INTO student 
						(firstname,lastname,email,college_id,status) 
						VALUES (".$this->db->escape($firstname).", ".$this->db->escape($lastname).", ".$this->db->escape($email).", ".$college_id.", ".$status.")";
			$this->db->query($sql);
			
			redirect('student');
		}
		
		$sql = 'SELECT * FROM college WHERE status=1';
		$query = $this->db->query($sql);
		$this->data['colleges'] = $query->result();
		
		$this->load->view('student/add',$this->data);
	}
	public function edit($id)
	{
		if($this->input->method()=='post'){
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$college_id = $this->input->post('college_id');
			$status = $this->input->post('status');
			$sql = "UPDATE student SET firstname=".$this->db->escape($firstname)
						.", lastname=".$this->db->escape($lastname)
						.", email=".$this->db->escape($email)
						.", college_id=".$college_id
						.", status=".$status
						." WHERE id=".$id;
			$this->db->query($sql);
				
			redirect('student');
		}
		
		$sql = 'SELECT * FROM student WHERE id='.$id;
		$query = $this->db->query($sql);
		$students = $query->result();
		$this->data['item'] = null;
		if(count($students)){
			$this->data['item'] = $students[0];
		}
		
		$sql = 'SELECT * FROM college WHERE status=1';
		$query = $this->db->query($sql);
		$this->data['colleges'] = $query->result();
		
		$this->load->view('student/edit',$this->data);
	}
	public function delete($id)
	{
		$sql = "DELETE FROM student WHERE id=".$id;
		$this->db->query($sql);
		redirect('student');
	}
}
