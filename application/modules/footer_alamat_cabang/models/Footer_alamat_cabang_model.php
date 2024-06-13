<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : royyan  */
/*| version : V.0.0.2 */
/*| facebook :  */
/*| fanspage :  */
/*| instagram :  */
/*| youtube :  */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 26/10/2023 00:55*/
/*| Please DO NOT modify this information*/


class Footer_alamat_cabang_model extends MY_Model{

  private $table        = "footer_alamat_cabang";
  private $primary_key  = "id";
  private $column_order = array('name', 'description', 'streets');
  private $order        = array('footer_alamat_cabang.id'=>"DESC");
  private $select       = "footer_alamat_cabang.id,footer_alamat_cabang.name,footer_alamat_cabang.description,footer_alamat_cabang.streets";

public function __construct()
	{
		$config = array(
      'table' 	      => $this->table,
			'primary_key' 	=> $this->primary_key,
		 	'select' 	      => $this->select,
      'column_order' 	=> $this->column_order,
      'order' 	      => $this->order,
		 );

		parent::__construct($config);
	}

  private function _get_datatables_query()
    {
      $this->db->select($this->select);
      $this->db->from($this->table);

    if($this->input->post("name"))
        {
          $this->db->like("footer_alamat_cabang.name", $this->input->post("name"));
        }

    if($this->input->post("description"))
        {
          $this->db->like("footer_alamat_cabang.description", $this->input->post("description"));
        }

    if($this->input->post("streets"))
        {
          $this->db->like("footer_alamat_cabang.streets", $this->input->post("streets"));
        }

      if(isset($_POST['order'])) // here order processing
       {
           $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
       }
       else if(isset($this->order))
       {
           $order = $this->order;
           $this->db->order_by(key($order), $order[key($order)]);
       }

    }


    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
      $this->db->select($this->select);
      $this->db->from("$this->table");
      return $this->db->count_all_results();
    }



}

/* End of file Footer_alamat_cabang_model.php */
/* Location: ./application/modules/footer_alamat_cabang/models/Footer_alamat_cabang_model.php */
