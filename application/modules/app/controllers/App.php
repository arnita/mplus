<?php

/*
	created on 9 september 2017
	by arief manggala putra
	manggala.corp@gmail.com
*/

class App extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_app");
	}

	function index()
	{
		$data['page'] = 'v_employee';
		$data['province'] = $this->db->get('provinsi')->result_array();
		$data['employee'] = $this->db->get('table_employee')->result_array();
 		$this->load->view('template',$data);
	}



	function ajax_datatable_employee()
	 {
		$data_array = array('id_employee','firstname','lastname','date_of_birth','phone','email','province','city','street','zip','number_id','position','bank','account_bank'); 
	    $list = $this->M_app->get_datatables('table_employee',array(),$data_array);
		$data = array();
		$no = $_POST['start'];
		foreach($list as $employee)
		{  
			$no++;
			$row = array(); 
			$row[] = $no;
			$row[] = $employee['firstname'].''.$employee['lastname'];
			$row[] = $employee['phone'];
			$row[] = $employee['date_of_birth'];
			$row[] = $employee['street'];
			$row[] = $employee['position'];
			$row[] = (!empty($employee['number_id'])) ?'<a style="focus:outline:none;" class="group'.$employee['id_employee'].' cboxElement" href="'.base_url().'assets/upload_resize/'.$employee['number_id'].'" > <img width="100" height="100" src="'.base_url().'assets/upload_resize/'.$employee['number_id'].'"></a>' :'';
   				

			// "<img width='100' src=".base_url()."assets/upload_resize/".$employee['number_id'].">" : "";
			
			$row[] = '<button class="btn btn-sm btn-success telo" data-toggle="tooltip"  title="Edit"  data-edit ="'.$employee['id_employee'].'""><i class="glyphicon glyphicon-pencil"></i> Edit</button> | <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_employee('.$employee['id_employee'].')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
        	$data[] = $row;	
		}

		$output = array(
			'draw'				=>$_POST['draw'],
			'recordsTotal'		=>$this->M_app->count_all('table_employee',array(),$data_array),
			'recordsFiltered'	=>$this->M_app->count_filtered('table_employee',array(),$data_array),
			'data'=>$data
			); 

		echo json_encode($output);
	}


	function delete_employee()
	{
		if(!empty($_POST['delete_id']))
		{
			$data_delete = $this->M_app->get('table_employee','','id_employee = "'.$_POST['delete_id'].'" ')->row_array();
			$this->M_app->delete("table_employee","id_employee = ".$_POST['delete_id']);
			unlink('assets/uploads/'.$data_delete['number_id']);
            unlink('assets/upload_resize/'.$data_delete['number_id']);
			header('Content-Type:application/json');
			echo json_encode(array('status'=>'success','data'=>'1'));
		}
		else
		{
			header('Content-Type:application/json');
			echo json_encode(array('status'=>'error','data'=>'0'));
		}
	}

	

	function add_employee()
	{
		$data['page'] = 'v_add_employee';

		$this->load->view('template',$data);
	}


	function getCity($id)
	{
		
		$data =  $this->db->get_where('kota',array('id_provinsi'=>$id))->result_array();

		echo json_encode($data);
	}

	function getProvince()
	{
		
		$data =  $this->db->get('provinsi')->result_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}


	function data_edit()
	{
		$id  = $this->input->post('id');
		$data= $this->db->get_where('table_employee',array('id_employee'=>$id))->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}


	function getCityList()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		$data= $this->db->get_where('kota',array('id_provinsi'=>$id_provinsi))->result_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}


	function action_employee()
	{
		$action = $this->uri->segment(3);
		$file = $_FILES['number_id']['name'];
		$this->form_validation->set_rules($this->M_app->rules_app_login);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>', '</div>');

		//for update

		if(!empty($_POST['id_employee']))
		{
			
			$edit_pic = $_FILES['number_id']['name'];
			$id_employee = $_POST['id_employee'];
			if($this->form_validation->run() == FALSE)
			{

					echo validation_errors();
	                if(empty($file))
					{
						echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a> The KTP  field is required</div>';	
					}
	                exit();
			}
			else 
			{
				if(!empty($edit_pic))
				{
					$path = FCPATH.'/assets/uploads/';

			        $config['upload_path'] = $path;
			        $config['allowed_types'] = "gif|jpg|jpeg|png";
			        $config['max_size'] = '5000';
			        $config['max_width'] = '5000';
			        $config['max_height'] = '5000';
			        $config['encrypt_name']= TRUE;
			         $this->upload->initialize($config);
			        if(!$this->upload->do_upload('number_id')){    
			            $error = ['error'=>$this->upload->display_errors()];
			            echo $error['error'];
						exit();
			        }

			            $nama_foto = $this->upload->file_name;
			            $this->load->library('image_lib');

			          

			            $config['image_library'] = 'gd2';
			            $config['source_image'] = FCPATH.'/assets/uploads/'.$nama_foto;
			            $config['new_image'] = FCPATH.'/assets/upload_resize/'.$nama_foto;
			            $config['maintain_ratio'] = TRUE;
			            $config['width'] = 1200;
			            $config['height']= 530;
			            $this->image_lib->initialize($config);

			            if(!$this->image_lib->resize()){
			                echo 'thum'.$this->image_lib->display_errors();
			               	exit();
			            }

			           

			        
			        unlink('assets/uploads/'.$_POST['pic_history']);
                	unlink('assets/upload_resize/'.$_POST['pic_history']);
			        unset($_POST['pic_history']);
			       	unset($_POST['id_employee']);
					$val= $_POST;
					
					$val['updated_date'] = date('Y-m-d');
					$val['number_id'] = $nama_foto;

					$data = $this->M_app->update('table_employee', $val,array('id_employee'=>$id_employee));

					
			           
		         }
		         else
		         {
		         	unset($_POST['pic_history']);
			       	unset($_POST['id_employee']);
					$val= $_POST;
					$val['updated_date'] = date('Y-m-d');
					
					$data = $this->M_app->update('table_employee', $val,array('id_employee'=>$id_employee));

		         }

		       

				if($data)
				{
					header('Content-Type:application/json');
					echo json_encode(array('status'=>'success','data'=>'1'));
				}
				else
				{
					header('Content-Type:application/json');
					echo json_encode(array('status'=>'error','data'=>'0'));	
				}	
			}
		}
		// for insert
		else
		{	
			if($this->form_validation->run() == FALSE)
			{
					echo validation_errors();
	                if(empty($file))
					{
						echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a> The file KTP  is required</div>';	
					}
	                exit();
			}
			else
			{
				$path = FCPATH.'/assets/uploads/';

		        $config['upload_path'] = $path;
		        $config['allowed_types'] = "gif|jpg|jpeg|png";
		        $config['max_size'] = '5000';
		        $config['max_width'] = '5000';
		        $config['max_height'] = '5000';
		        $config['encrypt_name']= TRUE;
		         $this->upload->initialize($config);
		        if(!$this->upload->do_upload('number_id')){    
		            $error = ['error'=>$this->upload->display_errors()];
		            echo $error['error'];
		     		exit();
		        }
            	$nama_foto = $this->upload->file_name;
	            $this->load->library('image_lib');

	        

	            $config['image_library'] = 'gd2';
	            $config['source_image'] = FCPATH.'/assets/uploads/'.$nama_foto;
	            $config['new_image'] = FCPATH.'/assets/upload_resize/'.$nama_foto;
	            $config['maintain_ratio'] = TRUE;
	            $config['width'] = 1200;
	            $config['height']= 530;
	            $this->image_lib->initialize($config);

	            if(!$this->image_lib->resize()){
	                echo 'thum'.$this->image_lib->display_errors();
	               	exit();
	            }

			    $val= $_POST;
				$val['number_id'] = $nama_foto;
				$val['created_date'] = date('Y-m-d');

				$data = $this->M_app->insert('table_employee',$val);

				if($data)
				{
					header('Content-Type:application/json');
					echo json_encode(array('status'=>'success','data'=>'1'));
				}
				else
				{
					header('Content-Type:application/json');
					echo json_encode(array('status'=>'error','data'=>'0'));	
				}
			}
			
		}
	}
}

?>