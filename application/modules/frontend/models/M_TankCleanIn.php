<?php 
/*
	for class model f_open_en
	create on  27 agustus 2017
	by arief manggala putra
	manggala.corp@gmail.com

*/

class M_TankCleanIn extends MY_Model
{
	public $language_id = 1;
	public $service_id = 1;

	public $rules_contactus = array(
		
		'contactus_name'=>array(
			'field' =>'contactus_name',
			'label'=>' Name',
			'rules'=>'trim|xss_clean|required'
			),
		'contactus_description'=>array(
			'field' =>'contactus_description',
			'label'=>' Message',
			'rules'=>'trim|xss_clean|required'
			),
		'contactus_email'=>array(
			'field' =>'contactus_email',
			'label'=>' Email',
			'rules'=>'trim|xss_clean|required|valid_email'
			),
		'captcha'=>array(
			'field' =>'captcha',
			'label'=>' Security Code',
			'rules'=>'trim|xss_clean|required'
			),
	);

	function get_lastestwork()
	{
	
		return $this->db->select("*")->from("tbl_lastestwork a")
		->join("tbl_pic_lastestwork b","a.lastestwork_id = b.lastestwork_id")
		->where(" a.lastestwork_id = (SELECT MAX(lastestwork_id) from tbl_lastestwork) ")
		->get();
	}
	
	function get_list_lastestwork()
	{
	    return $this->db->select("*")->from("tbl_lastestwork a")->join("tbl_ourclient b","a.ourclient_id = b.ourclient_id ","left")->limit("5","0")->order_by("lastestwork_id","desc")->get();
	}
	
	function get_lastestwork_join($id)
	{
	     return $this->db->select("*")->from("tbl_lastestwork a")->join("tbl_pic_lastestwork b","a.lastestwork_id = b.lastestwork_id ")->where('b.lastestwork_id',$id)->order_by("b.lastestwork_id","desc")->get();
	}

	function get_ourservice()
	{
		return $this->db->select("*")->from("tbl_ourservice a")
		->join("tbl_ourservice_detail b","a.ourservice_id = b.ourservice_id")
		->group_by("a.ourservice_id")
		->where(array('b.service_id'=>$this->service_id,'b.language_id'=>$this->language_id))
		->limit("4","0")
		->get();
	}
	function query_service($id)
	{
		return $this->db->select("*")->from("tbl_ourservice a")
		->join("tbl_ourservice_detail b","a.ourservice_id = b.ourservice_id")
		->where("a.ourservice_id = ".$id." and  b.service_id = ".$this->service_id." and b.language_id=".$this->language_id."  ")
		->get();
	}
	function query_qhse($id)
	{
		return $this->db->select("*")->from("tbl_qhse a")
		->join("tbl_qhse_detail b","a.qhse_id = b.qhse_id")
		->where("a.qhse_id = ".$id." and  b.service_id = ".$this->service_id." and b.language_id=".$this->language_id."  ")
		->get();
	}
	function query_about($id)
	{
		return $this->db->select("*")->from("tbl_aboutus a")
		->join("tbl_aboutus_detail b","a.aboutus_id = b.aboutus_id")
		->where("a.aboutus_id =  ".$id." and b.service_id = ".$this->service_id." and b.language_id=".$this->language_id." ")
		->get();
	}

	function query_equipment($id)
	{
		// return $this->db->select("*")->from("tbl_equipment a")
		// ->join("tbl_equipment_detail b","a.equipment_id = b.equipment_id")
		// ->where("a.equipment_id = ".$id." and b.service_id = ".$this->service_id." and b.language_id=".$this->language_id."  ")
		// ->get();
			return $this->db->select("*")->from("tbl_equipment_detail a")
		->join("tbl_pic_equipment b","a.equipment_detail_id = b.equipment_detail_id")
		->where("a.equipment_id = ".$id."  ")->group_by('b.equipment_detail_id')
		->get();
	}
	function query_equipment_result($id)
	{
		return $this->db->select("*")->from("tbl_equipment_detail a")
		->join("tbl_pic_equipment b","a.equipment_detail_id = b.equipment_detail_id")
		->where("a.equipment_id = ".$id." and a.service_id = ".$this->service_id." and a.language_id=".$this->language_id."  ")->group_by('a.equipment_detail_id')
		->get();	
	}

	function query_permit()
	{
		return $this->db->select('*,(select pic_permit from tbl_pic_permit  limit 0,1 ) as telo')->from('tbl_permit a')
		->join('tbl_pic_permit b','a.permit_id = b.permit_id')
		// ->where(array('service_id'=>$this->service_id,'language_id'=>$this->language_id))
		->get();
	}


	
}


?>