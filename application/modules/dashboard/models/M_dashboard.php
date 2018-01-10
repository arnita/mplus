<?php


/*
	created on 4 september 2017
	by arief manggala putra
	manggala.corp@gmail.com
*/

class M_dashboard extends MY_Model
{
	
	public $rules_equipment = array(
			
			
			'judul_artikel'=>array(
				'field' =>'judul_artikel',
				'label'=>'Judul Artikel',
				'rules'=>'trim|xss_clean|required'
				),
			'isi_artikel'=>array(
				'field' =>'isi_artikel',
				'label'=>' Isi Artikelk ',
				'rules'=>'trim|xss_clean|required'
				),
			
		);
}

?>