<?php

/*
	created on 4 september 2017
	by arief manggala putra
	manggala.corp@gmail.com
*/

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_dashboard");
	}

	/* About us crud */
	function artikel()
	{
		$data['active'] = 'artikel';
		$data['page'] = 'v_artikel';
		$this->load->view('template_admin_in',$data);
	}


	public function ajax_datatable_artikel(){
		$data_array = array('id_artikel','judul_artikel','tanggal_artikel','image_artikel','hit_artikel'); 
		$list = $this->M_dashboard->get_datatables('tbl_artikel',array(),$data_array);
	

		$data = array();
		$no = $_POST['start'];
		foreach($list as $artikel)
		{  
			$no++;
			$row = array(); 
			$row[] = $no;
			$row[] = $artikel['judul_artikel'];
						$row[] = (!empty($artikel['image_artikel'])) ? "<img width='100' src=".base_url()."assets/uploads/".$artikel['image_artikel'].">" : "";

			$row[] = $artikel['tanggal_artikel'];
			$row[] = $artikel['hit_artikel'];
			// $row[] = (!empty($artikel['image_artikel'])) ? "<img width='100' src=".base_url()."assets/upload_resize/".$artikel['image_artikel'].">" : "";
			
			$row[] = '<a class="btn btn-sm btn-success" data-toggle="tooltip"  title="Edit" href="'.base_url().'dashboard/add_artikel?id_artikel='.$artikel['id_artikel'].' "><i class="glyphicon glyphicon-pencil"></i> Edit</a> | <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_artikel('.$artikel['id_artikel'].')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
        	$data[] = $row;	
		}

		$output = array(
			'draw'				=>$_POST['draw'],
			'recordsTotal'		=>$this->M_dashboard->count_all('tbl_artikel',array(),$data_array),
			'recordsFiltered'	=>$this->M_dashboard->count_filtered('tbl_artikel',array(),$data_array),
			'data'=>$data
			);

		echo json_encode($output);
	}


	function add_artikel()
	{
		$data['active'] = 'artikel';
		$data['page'] = 'v_add_artikel';
		
		if(!empty($_GET['id_artikel']))
		{
			$data['edit'] = $this->M_dashboard->get("tbl_artikel","","id_artikel = '".$_GET['id_artikel']."' ")->row_array();
		}

		$this->load->view('template_admin_in',$data);
	}


	function delete_artikel()
	{
		

		   if(!empty($_POST['delete_id']))
		{
			
			$this->M_dashboard->delete("tbl_artikel","id_artikel = ".$_POST['delete_id']);
			
			header('Content-Type:application/json');
			echo json_encode(array('status'=>'success','data'=>'1'));
		}
		else
		{
			header('Content-Type:application/json');
			echo json_encode(array('status'=>'error','data'=>'0'));
		}
	}

	function action_artikel()
	{
		$action = $this->uri->segment(3);
		// $file = $_FILES['equipment_detail_pic']['name'];
		
		$id_artikel = $_POST['id_artikel'];

		//for update
		if(!empty($_POST['id_artikel']))
		{    
			$id_artikel = $_POST['id_artikel'];
						$edit_pic = $_FILES['image_artikel']['name'];


			
			// $edit_pic = $_FILES['equipment_detail_pic']['name'];
			$this->form_validation->set_rules($this->M_dashboard->rules_equipment);
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>', '</div>');
			
			if($this->form_validation->run() == FALSE)
			{

				$this->session->set_flashdata("error",validation_errors());
				redirect("dashboard/artikel/add_equipment_detail_in?id_artikel=".$id_artikel."");
			}
			else 
			{

				if(!empty($edit_pic))
				{
					 			            $this->load->library('image_lib');

					$path = FCPATH.'/assets/uploads/';

			        $config['upload_path'] = $path;
			        $config['allowed_types'] = "gif|jpg|jpeg|png";
			        $config['max_size'] = '5000';
			        $config['max_width'] = '5000';
			        $config['max_height'] = '5024';
			        $config['encrypt_name']= TRUE;
			         $this->upload->initialize($config);
			        if(!$this->upload->do_upload('image_artikel')){    
			            $error = ['error'=>$this->upload->display_errors()];
			            echo $error['error'];
						exit();
			        }
			            $nama_foto = $this->upload->file_name;

    	           		       
    		     	$val['judul_artikel'] = $this->input->post('judul_artikel');
		            $val['tanggal_artikel'] = date('Y-m-d');
		            $val['isi_artikel'] = $this->input->post('isi_artikel');
		            $val['id_artikel'] = $id_artikel;
    	            $val['image_artikel'] = $nama_foto;
					$data = $this->M_dashboard->update('tbl_artikel',$val, array('id_artikel' => $id_artikel));
			           
		         }
		         else
		         {
		         	
		       		       
    		     $val['judul_artikel'] = $this->input->post('judul_artikel');
	            $val['tanggal_artikel'] = date('Y-m-d');
	            
	            $val['isi_artikel'] = $this->input->post('isi_artikel');
	            $val['id_artikel'] = $id_artikel;
					$data = $this->M_dashboard->update('tbl_artikel',$val, array('id_artikel' => $id_artikel));


				
		         }
				


				if($data)
				{
					$this->session->set_flashdata('success','<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a> Success Input Data </div>');

					redirect("dashboard/artikel?id_artikel=".$_POST['id_artikel']."");
				}
				else
				{
					$this->session->set_flashdata('success','<div class="alert alert-error"> <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a> Error Input Data </div>');

					redirect("dashboard/artikel?id_artikel=".$_POST['id_artikel']."");
				}
			}
		}
		// for insert
		else
		{	



			$this->form_validation->set_rules($this->M_dashboard->rules_equipment);
		
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>', '</div>');
			if($this->form_validation->run() == FALSE)
			{
	               
					$this->session->set_flashdata("error",validation_errors());
					redirect("dashboard/artikel");
			}
			else
			{

				$this->load->library('image_lib');

				$path = FCPATH.'/assets/uploads';

		        $config_image['upload_path'] = $path;
		        $config_image['allowed_types'] = "gif|jpg|jpeg|png";
		        $config_image['max_size'] = '5000';
		        $config_image['max_width'] = '5000';
		        $config_image['max_height'] = '5024';
		        $config_image['encrypt_name']= TRUE;
		         $this->upload->initialize($config_image);
		        if(!$this->upload->do_upload('image_artikel')){    
		            $error = ['error'=>$this->upload->display_errors()];
		            echo $error['error'];
		     		exit();
		        }
		            $nama_image = $this->upload->file_name;
		
			
				
	            $val['judul_artikel'] = $this->input->post('judul_artikel');
	            $val['tanggal_artikel'] = date('Y-m-d');
	            $val['image_artikel'] = $nama_image;
	            $val['isi_artikel'] = $this->input->post('isi_artikel');
	            $val['id_artikel'] = $id_artikel;
			    
			 	
				 $data = $this->db->insert('tbl_artikel',$val);
				 
				
		
			  
				if($data)
				{
				
					$this->session->set_flashdata('success','<div class="alert alert-success"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a> Success Input Data </div>');
					redirect("dashboard/artikel");

				}
				else
				{
					$this->session->set_flashdata('success','<div class="alert alert-error"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a> Error Input Data </div>');
					redirect("dashboard/artikel");

				}
			}
		}
	}
	

	
}

?>