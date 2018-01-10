<?php
/*
	This class for open class frontend web

	created on 27 agustus 2017
	by arief manggala putra
	manggala.corp@gmail.com
*/

class Frontend extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("dashboard/M_dashboard");
	}

	function index()
	{
	
		$data['page'] = "v_home";
		$data['slider'] = $this->db->get('tbl_artikel');
	
		$this->load->view('template_frontend_in',$data);
	}

	function home()
	{
		$data['page'] = "v_home";
		
		$data['slider'] = $this->db->get('tbl_artikel')->result_array();

	
		$this->load->view('template_frontend_in',$data);
	}
	function artikel()
	{
		$data['page'] = "v_artikel";
		$data['artikel'] = $this->db->get('tbl_artikel')->result_array();

	
		$this->load->view('template_frontend_in',$data);
	}

	function detail_artikel()
	{
		$id = $this->uri->segment(3);
		$data['page'] = "v_detail_artikel";
		$data['artikel'] = $this->db->get_where('tbl_artikel',array('id_artikel'=>$id))->row_array();

	
		$this->load->view('template_frontend_in',$data);	
	}

	function hubungi_kami()
	{
		$data['page'] = "v_hubungi_kami";

	
		$this->load->view('template_frontend_in',$data);	
	}
	
	
}


?>