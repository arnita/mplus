<?php

/*
	created on 9 september 2017
	by arief manggala putra
	manggala.corp@gmail.com
*/

class Mplus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_mplus");
	}

	function index()
	{
		$data['page'] = 'v_book';
 		$this->load->view('template',$data);
	}

	function getData()
	{
		$data = $this->db->get('books')->result_array();

		header('Content-Type:application/json');
		echo json_encode($data);
	}

	function saveBook()
	{
		
		$request = json_decode(file_get_contents('php://input'),true);
		$request['date'] = date('Y-m-d');

		$data =$this->db->insert('books',$request);

		if($data)
		{
			echo 'success';
		}
		else
		{
			echo 'false';
		}
	}

	function deleteBook()
	{
		$id = json_decode(file_get_contents('php://input'),true);

		$this->db->delete('books',$id);
	}


	function editBook()
	{
		$id = json_decode(file_get_contents('php://input'),true);
		$data = $this->db->get_where('books',$id)->row_array();

		header('Content-Type:application/json');
		echo json_encode($data);
		
	}


	function updateBook()
	{
		$request = json_decode(file_get_contents('php://input'),true);
		$request['date'] = date('Y-m-d');

		
		$data = $this->db->update('books',$request,array('id_books'=>$request['id_books']));
		if($data)
		{
			echo 'success';
		}
		else
		{
			echo 'false';
		}
	}


}

?>