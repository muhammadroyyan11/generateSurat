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


class Data_surat extends Backend{

private $title = "Data Surat";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Data_surat_model","model");
}

function index()
{
  $this->is_allowed('data_surat_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('data_surat_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->nomor_surat;
                $rows[] = $row->nama_lengkap;
                $rows[] = $row->tempat_lahir;
                $rows[] = date("d-m-Y",  strtotime($row->tgl_lahir));
                $rows[] = $row->nim;
                $rows[] = $row->nik;
                $rows[] = $row->fakultas;
                $rows[] = $row->program_studi;
                $rows[] = $row->tahun_akademik;
                $rows[] = $row->semester;
                $rows[] = $row->tanggal_pembuatan != "" ? date("d-m-Y H:i",  strtotime($row->tanggal_pembuatan)) : "";
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("data_surat/detail/".enc_url($row->id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("data_surat/update/".enc_url($row->id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("data_surat/delete/".enc_url($row->id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
                        <i class="ti-trash"></i>
                      </a>
                    </div>
                 ';

        $data[] = $rows;
    }

    $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->model->count_all(),
                    "recordsFiltered" => $this->model->count_filtered(),
                    "data" => $data,
            );
    //output to json format
    return $this->response($output);
  }
}

function filter()
{
  if(!is_allowed('data_surat_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('data_surat_detail');
    if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "nomor_surat" => $row->nomor_surat,
          "nama_lengkap" => $row->nama_lengkap,
          "tempat_lahir" => $row->tempat_lahir,
          "tgl_lahir" => $row->tgl_lahir,
          "nim" => $row->nim,
          "nik" => $row->nik,
          "fakultas" => $row->fakultas,
          "program_studi" => $row->program_studi,
          "tahun_akademik" => $row->tahun_akademik,
          "semester" => $row->semester,
          "tanggal_pembuatan" => $row->tanggal_pembuatan,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('data_surat_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("data_surat/add_action"),
                  'nomor_surat' => set_value("nomor_surat"),
                  'nama_lengkap' => set_value("nama_lengkap"),
                  'tempat_lahir' => set_value("tempat_lahir"),
                  'tgl_lahir' => set_value("tgl_lahir"),
                  'nim' => set_value("nim"),
                  'nik' => set_value("nik"),
                  'fakultas' => set_value("fakultas"),
                  'program_studi' => set_value("program_studi"),
                  'tahun_akademik' => set_value("tahun_akademik"),
                  'semester' => set_value("semester"),
                  'tanggal_pembuatan' => set_value("tanggal_pembuatan"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('data_surat_add')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $json = array('success' => false);
    $this->form_validation->set_rules("nomor_surat","* Nomor surat","trim|xss_clean");
    $this->form_validation->set_rules("nama_lengkap","* Nama lengkap","trim|xss_clean");
    $this->form_validation->set_rules("tempat_lahir","* Tempat lahir","trim|xss_clean");
    $this->form_validation->set_rules("tgl_lahir","* Tgl lahir","trim|xss_clean");
    $this->form_validation->set_rules("nim","* Nim","trim|xss_clean");
    $this->form_validation->set_rules("nik","* Nik","trim|xss_clean");
    $this->form_validation->set_rules("fakultas","* Fakultas","trim|xss_clean");
    $this->form_validation->set_rules("program_studi","* Program studi","trim|xss_clean");
    $this->form_validation->set_rules("tahun_akademik","* Tahun akademik","trim|xss_clean");
    $this->form_validation->set_rules("semester","* Semester","trim|xss_clean");
    $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

    if ($this->form_validation->run()) {
      $save_data['nomor_surat'] = $this->input->post('nomor_surat',true);
      $save_data['nama_lengkap'] = $this->input->post('nama_lengkap',true);
      $save_data['tempat_lahir'] = $this->input->post('tempat_lahir',true);
      $save_data['tgl_lahir'] = date("Y-m-d",  strtotime($this->input->post('tgl_lahir', true)));
      $save_data['nim'] = $this->input->post('nim',true);
      $save_data['nik'] = $this->input->post('nik',true);
      $save_data['fakultas'] = $this->input->post('fakultas',true);
      $save_data['program_studi'] = $this->input->post('program_studi',true);
      $save_data['tahun_akademik'] = $this->input->post('tahun_akademik',true);
      $save_data['semester'] = $this->input->post('semester',true);
      $save_data['tanggal_pembuatan'] = date("Y-m-d H:i");

      $this->model->insert($save_data);

      set_message("success",cclang("notif_save"));
      $json['redirect'] = url("data_surat");
      $json['success'] = true;
    }else {
      foreach ($_POST as $key => $value) {
        $json['alert'][$key] = form_error($key);
      }
    }

    $this->response($json);
  }
}

function update($id)
{
  $this->is_allowed('data_surat_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("data_surat/update_action/$id"),
                  'nomor_surat' => set_value("nomor_surat", $row->nomor_surat),
                  'nama_lengkap' => set_value("nama_lengkap", $row->nama_lengkap),
                  'tempat_lahir' => set_value("tempat_lahir", $row->tempat_lahir),
                  'tgl_lahir' => $row->tgl_lahir == "" ? "":date("Y-m-d",  strtotime($row->tgl_lahir)),
                  'nim' => set_value("nim", $row->nim),
                  'nik' => set_value("nik", $row->nik),
                  'fakultas' => set_value("fakultas", $row->fakultas),
                  'program_studi' => set_value("program_studi", $row->program_studi),
                  'tahun_akademik' => set_value("tahun_akademik", $row->tahun_akademik),
                  'semester' => set_value("semester", $row->semester),
                  'tanggal_pembuatan' => set_value("tanggal_pembuatan", $row->tanggal_pembuatan),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('data_surat_update')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $json = array('success' => false);
    $this->form_validation->set_rules("nomor_surat","* Nomor surat","trim|xss_clean");
    $this->form_validation->set_rules("nama_lengkap","* Nama lengkap","trim|xss_clean");
    $this->form_validation->set_rules("tempat_lahir","* Tempat lahir","trim|xss_clean");
    $this->form_validation->set_rules("tgl_lahir","* Tgl lahir","trim|xss_clean");
    $this->form_validation->set_rules("nim","* Nim","trim|xss_clean");
    $this->form_validation->set_rules("nik","* Nik","trim|xss_clean");
    $this->form_validation->set_rules("fakultas","* Fakultas","trim|xss_clean");
    $this->form_validation->set_rules("program_studi","* Program studi","trim|xss_clean");
    $this->form_validation->set_rules("tahun_akademik","* Tahun akademik","trim|xss_clean");
    $this->form_validation->set_rules("semester","* Semester","trim|xss_clean");
    $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

    if ($this->form_validation->run()) {
      $save_data['nomor_surat'] = $this->input->post('nomor_surat',true);
      $save_data['nama_lengkap'] = $this->input->post('nama_lengkap',true);
      $save_data['tempat_lahir'] = $this->input->post('tempat_lahir',true);
      $save_data['tgl_lahir'] = date("Y-m-d",  strtotime($this->input->post('tgl_lahir', true)));
      $save_data['nim'] = $this->input->post('nim',true);
      $save_data['nik'] = $this->input->post('nik',true);
      $save_data['fakultas'] = $this->input->post('fakultas',true);
      $save_data['program_studi'] = $this->input->post('program_studi',true);
      $save_data['tahun_akademik'] = $this->input->post('tahun_akademik',true);
      $save_data['semester'] = $this->input->post('semester',true);
      $save_data['tanggal_pembuatan'] = date("Y-m-d H:i");

      $save = $this->model->change(dec_url($id), $save_data);

      set_message("success",cclang("notif_update"));

      $json['redirect'] = url("data_surat");
      $json['success'] = true;
    }else {
      foreach ($_POST as $key => $value) {
        $json['alert'][$key] = form_error($key);
      }
    }

    $this->response($json);
  }
}

function delete($id)
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('data_surat_delete')) {
      return $this->response([
        'type_msg' => "error",
        'msg' => "do not have permission to access"
      ]);
    }

      $this->model->remove(dec_url($id));
      $json['type_msg'] = "success";
      $json['msg'] = cclang("notif_delete");


    return $this->response($json);
  }
}


}

/* End of file Data_surat.php */
/* Location: ./application/modules/data_surat/controllers/backend/Data_surat.php */
