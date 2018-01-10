<?php


/*
	created on 4 september 2017
	by arief manggala putra
	manggala.corp@gmail.com
*/

class M_mplus extends MY_Model
{
	public $rules_app_login = array(
			
			'firstname'=>array(
				'field' =>'firstname',
				'label'=>'First Name',
				'rules'=>'trim|xss_clean|required'
				),
			'lastname'=>array(
				'field' =>'lastname',
				'label'=>'Last Name',
				'rules'=>'trim|xss_clean|required'
				),
			'phone'=>array(
				'field' =>'phone',
				'label'=>'Phone',
				'rules'=>'trim|xss_clean|required|numeric'
				),
			'email'=>array(
				'field' =>'email',
				'label'=>'Email',
				'rules'=>'trim|xss_clean|required|valid_email'
				),
			
		);


}

?>