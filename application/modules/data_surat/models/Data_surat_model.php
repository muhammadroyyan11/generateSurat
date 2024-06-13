<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*| --------------------------------------------------------------------------*/
/*| dev : royyan  */
/*| version : V.0.0.2 */
/*| facebook :  */
/*| fanspage :  */
/*| instagram :  */
/*| youtube :  */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 12/06/2024 23:59*/
/*| Please DO NOT modify this information*/


class Data_surat_model extends MY_Model{

  private $table        = "data_surat";
  private $primary_key  = "id";
  private $column_order = array('nomor_surat', 'nama_lengkap', 'tempat_lahir', 'tgl_lahir', 'nim', 'nik', 'fakultas', 'program_studi', 'tahun_akademik', 'semester', 'tanggal_pembuatan');
  private $order        = array('data_surat.id'=>"DESC");
  private $select       = "data_surat.id,data_surat.nomor_surat,data_surat.nama_lengkap,data_surat.tempat_lahir,data_surat.tgl_lahir,data_surat.nim,data_surat.nik,data_surat.fakultas,data_surat.program_studi,data_surat.tahun_akademik,data_surat.semester,data_surat.tanggal_pembuatan";

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

    if($this->input->post("nomor_surat"))
        {
          $this->db->like("data_surat.nomor_surat", $this->input->post("nomor_surat"));
        }

    if($this->input->post("nama_lengkap"))
        {
          $this->db->like("data_surat.nama_lengkap", $this->input->post("nama_lengkap"));
        }

    if($this->input->post("tempat_lahir"))
        {
          $this->db->like("data_surat.tempat_lahir", $this->input->post("tempat_lahir"));
        }

    if($this->input->post("tgl_lahir"))
        {
          $this->db->like("data_surat.tgl_lahir", date('Y-m-d',strtotime($this->input->post("tgl_lahir"))));
        }

    if($this->input->post("nim"))
        {
          $this->db->like("data_surat.nim", $this->input->post("nim"));
        }

    if($this->input->post("nik"))
        {
          $this->db->like("data_surat.nik", $this->input->post("nik"));
        }

    if($this->input->post("fakultas"))
        {
          $this->db->like("data_surat.fakultas", $this->input->post("fakultas"));
        }

    if($this->input->post("program_studi"))
        {
          $this->db->like("data_surat.program_studi", $this->input->post("program_studi"));
        }

    if($this->input->post("tahun_akademik"))
        {
          $this->db->like("data_surat.tahun_akademik", $this->input->post("tahun_akademik"));
        }

    if($this->input->post("semester"))
        {
          $this->db->like("data_surat.semester", $this->input->post("semester"));
        }

    if($this->input->post("tanggal_pembuatan"))
        {
          $this->db->like("data_surat.tanggal_pembuatan", date('Y-m-d H:i',strtotime($this->input->post("tanggal_pembuatan"))));
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

/* End of file Data_surat_model.php */
/* Location: ./application/modules/data_surat/models/Data_surat_model.php */
