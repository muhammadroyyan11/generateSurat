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


class Footer_alamat_utama extends Backend{

private $title = "Alamat Utama";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Footer_alamat_utama_model","model");
}

function index()
{
  $this->is_allowed('footer_alamat_utama_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('footer_alamat_utama_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->name;
                $rows[] = $row->street;
                $rows[] = $row->maps;
                $rows[] = $row->no_hp;
                $rows[] = $row->email;
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("footer_alamat_utama/detail/".enc_url($row->id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("footer_alamat_utama/update/".enc_url($row->id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("footer_alamat_utama/delete/".enc_url($row->id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
  if(!is_allowed('footer_alamat_utama_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('footer_alamat_utama_detail');
    if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "name" => $row->name,
          "street" => $row->street,
          "maps" => $row->maps,
          "no_hp" => $row->no_hp,
          "email" => $row->email,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('footer_alamat_utama_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("footer_alamat_utama/add_action"),
                  'name' => set_value("name"),
                  'street' => set_value("street"),
                  'maps' => set_value("maps"),
                  'no_hp' => set_value("no_hp"),
                  'email' => set_value("email"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('footer_alamat_utama_add')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $json = array('success' => false);
    $this->form_validation->set_rules("name","* Name","trim|xss_clean");
    $this->form_validation->set_rules("street","* Street","trim|xss_clean|required");
    $this->form_validation->set_rules("maps","* Maps","trim|xss_clean|required");
    $this->form_validation->set_rules("no_hp","* No hp","trim|xss_clean|numeric");
    $this->form_validation->set_rules("email","* Email","trim|xss_clean|required");
    $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

    if ($this->form_validation->run()) {
      $save_data['name'] = $this->input->post('name',true);
      $save_data['street'] = $this->input->post('street',true);
      $save_data['maps'] = $this->input->post('maps',true);
      $save_data['no_hp'] = $this->input->post('no_hp',true);
      $save_data['email'] = $this->input->post('email',true);

      $this->model->insert($save_data);

      set_message("success",cclang("notif_save"));
      $json['redirect'] = url("footer_alamat_utama");
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
  $this->is_allowed('footer_alamat_utama_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("footer_alamat_utama/update_action/$id"),
                  'name' => set_value("name", $row->name),
                  'street' => set_value("street", $row->street),
                  'maps' => set_value("maps", $row->maps),
                  'no_hp' => set_value("no_hp", $row->no_hp),
                  'email' => set_value("email", $row->email),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('footer_alamat_utama_update')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $json = array('success' => false);
    $this->form_validation->set_rules("name","* Name","trim|xss_clean");
    $this->form_validation->set_rules("street","* Street","trim|xss_clean|required");
    $this->form_validation->set_rules("maps","* Maps","trim|xss_clean|required");
    $this->form_validation->set_rules("no_hp","* No hp","trim|xss_clean|numeric");
    $this->form_validation->set_rules("email","* Email","trim|xss_clean|required");
    $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

    if ($this->form_validation->run()) {
      $save_data['name'] = $this->input->post('name',true);
      $save_data['street'] = $this->input->post('street',true);
      $save_data['maps'] = $this->input->post('maps',true);
      $save_data['no_hp'] = $this->input->post('no_hp',true);
      $save_data['email'] = $this->input->post('email',true);

      $save = $this->model->change(dec_url($id), $save_data);

      set_message("success",cclang("notif_update"));

      $json['redirect'] = url("footer_alamat_utama");
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
    if (!is_allowed('footer_alamat_utama_delete')) {
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

/* End of file Footer_alamat_utama.php */
/* Location: ./application/modules/footer_alamat_utama/controllers/backend/Footer_alamat_utama.php */
