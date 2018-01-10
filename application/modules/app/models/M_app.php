<?php


/*
	created on 4 september 2017
	by arief manggala putra
	manggala.corp@gmail.com
*/

class M_app extends MY_Model
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


	    public function count_all($table=NULL,$where=array(),$select=NULL) 
    {
    	
		$this->db->select($select);
        $this->db->from($table);
        if(!empty($where))
        {
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }



    public function count_filtered_join($table=NULL,$where=array(),$select=array(),$order_by=NULL)
   {

      $this->queryJoin($where,$select,$order_by);

      
        $i = 0;

        foreach ($select as $item) 
        { // loop column 
            if (!empty($_POST['search']['value'])) 
            { // if datatable send POST for search

                if ($i === 0) 
                { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } 
                else 
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($select) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) 
        { // here order processing
            $this->db->order_by($select[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if (isset($select)) 
        {
            $order = $select;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        //$this->_get_datatables_query_join();
        $query = $this->db->get();
        return $query->num_rows();
    }

}

?>