<?php defined('BASEPATH') OR exit('No direct script access allowed');
# ini adalah class untuk global untuk input ke database 
class MY_Model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	# function untuk input data ke database
	public function insert($table,$data,$batch=FALSE)
	{
		if($batch == TRUE)    
		{
			$this->db->insert_batch($table,$data);
		}
		else
		{
			$this->db->set($data)->insert($table);
			$id = $this->db->insert_id();
			return $id;

		}
	}

	#function ini untuk update database
	public function update($table,$data,$where= array())
	{	
		$this->db->set($data)->where($where)->update($table);
		return TRUE;
	}



	#function ini untuk get data dari database
	public function get($table=NULL,$select='*',$where=array(),$order_by=NULL,$limit=NULL,$offset=NULL)
	{
		
        $this->db->select($select)->from($table);
		
        if(!empty($where)) $this->db->where($where);
        if(!empty($order_by)) $this->db->order_by($order_by);
        if(!empty($limit)) $this->db->limit($limit,$offset);
		return $this->db->get();
	}



	// function buat hapus data
	public function delete($table=NULL,$where=array())
	{
		$this->db->where($where);
		//$this->db->limit('1');
		$this->db->delete($table);

        return TRUE;
	}




    //for get datatables ============================
   public function get_datatables($table=NULL,$where=array(),$select=NULL) 
   {
        //$this->_get_datatables_query();
          $this->db->select($select);
          $this->db->from($table);


          if(!empty($where))
          {
            $this->db->where($where);
          }
      
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

        if ($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
       
        return $this->db->get()->result_array();
        
    }

    // for filtered ===============================
   public function count_filtered($table=NULL,$where=array(),$select=NULL) 
   {
        //$this->_get_datatables_query();
        $this->db->select($select);
          $this->db->from($table);


          if(!empty($where))
          {
            $this->db->where($where);
          }
      
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
        $query = $this->db->get();
        return $query->num_rows();
    }

// for count all record data table===================
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

   /* End data table ==================== */



 

    //for get all join data ============================
   public function get_datatables_join($table=NULL,$where=array(),$select=array(),$order_by=NULL) 
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
        // $this->_get_datatables_query_join();
        if ($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
       
        $query = $this->db->get();
        return $query->result_array();
    }

    // for filtered ===============================
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

// for count all record data table===================
    public function count_all_join($table=NULL,$where=array(),$select=array(),$order_by=NULL)
    {
    	
    		
      $this->queryJoin($where,$select,$order_by);

      
        return $this->db->count_all_results();
    }

    

   
}