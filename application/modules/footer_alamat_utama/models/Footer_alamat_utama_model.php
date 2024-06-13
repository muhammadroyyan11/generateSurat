<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : royyan  */
/*| version : V.0.0.2 */
/*| facebook :  */
/*| fanspage :  */
/*| instagram :  */
/*| youtube :  */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 05/11/2023 13:11*/
/*| Please DO NOT modify this information*/


class Footer_alamat_utama_model extends MY_Model{

  private $table        = "footer_alamat_utama";
  private $primary_key  = "id";
  private $column_order = array('name', 'street', 'maps', 'no_hp', 'email');
  private $order        = array('footer_alamat_utama.id'=>"DESC");
  private $select       = "footer_alamat_utama.id,footer_alamat_utama.name,footer_alamat_utama.street,footer_alamat_utama.maps,footer_alamat_utama.no_hp,footer_alamat_utama.email";

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
          $this->db->like("footer_alamat_utama.name", $this->input->post("name"));
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

/* End of file Footer_alamat_utama_model.php */
/* Location: ./application/modules/footer_alamat_utama/models/Footer_alamat_utama_model.php */
