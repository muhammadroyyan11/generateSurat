<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : royyan  */
/*| version : V.0.0.2 */
/*| facebook :  */
/*| fanspage :  */
/*| instagram :  */
/*| youtube :  */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 04/11/2023 10:33*/
/*| Please DO NOT modify this information*/


class Company extends Backend{

private $title = "Company";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Company_model","model");
}

function index()
{
  $this->is_allowed('company_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('company_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->name_company;
                $rows[] = character_limiter($row->desc_company, 50);
                $rows[] = character_limiter($row->visi, 50);
                $rows[] = character_limiter($row->misi, 50);
                $rows[] = is_image($row->img_logo,'','width:auto;height:40px');
                $rows[] = is_image($row->img_desc,'','width:auto;height:40px');
                $rows[] = is_image($row->img_header,'','width:auto;height:40px');
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("company/detail/".enc_url($row->id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("company/update/".enc_url($row->id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("company/delete/".enc_url($row->id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
  if(!is_allowed('company_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('company_detail');
    if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "name_company" => $row->name_company,
          "desc_company" => $row->desc_company,
          "visi" => $row->visi,
          "misi" => $row->misi,
          "img_logo" => $row->img_logo,
          "img_desc" => $row->img_desc,
          "img_header" => $row->img_header,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('company_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("company/add_action"),
                  'name_company' => set_value("name_company"),
                  'desc_company' => set_value("desc_company"),
                  'visi' => set_value("visi"),
                  'misi' => set_value("misi"),
                  'img_logo' => set_value("img_logo"),
                  'img_desc' => set_value("img_desc"),
                  'img_header' => set_value("img_header"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('company_add')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $json = array('success' => false);
    $this->form_validation->set_rules("name_company","* Name company","trim|xss_clean");
    $this->form_validation->set_rules("desc_company","* Desc company","trim|xss_clean");
    $this->form_validation->set_rules("visi","* Visi","trim|xss_clean");
    $this->form_validation->set_rules("misi","* Misi","trim|xss_clean");
    $this->form_validation->set_rules("img_logo","* Img logo","trim|xss_clean");
    $this->form_validation->set_rules("img_desc","* Img desc","trim|xss_clean");
    $this->form_validation->set_rules("img_header","* Img header","trim|xss_clean");
    $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

    if ($this->form_validation->run()) {
      $save_data['name_company'] = $this->input->post('name_company',true);
      $save_data['desc_company'] = $this->input->post('desc_company',true);
      $save_data['visi'] = $this->input->post('visi',true);
      $save_data['misi'] = $this->input->post('misi',true);
      $save_data['img_logo'] = $this->imageCopy($this->input->post('img_logo',true),$_POST['file-dir-img_logo']);
      $save_data['img_desc'] = $this->imageCopy($this->input->post('img_desc',true),$_POST['file-dir-img_desc']);
      $save_data['img_header'] = $this->imageCopy($this->input->post('img_header',true),$_POST['file-dir-img_header']);

      $this->model->insert($save_data);

      set_message("success",cclang("notif_save"));
      $json['redirect'] = url("company");
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
  $this->is_allowed('company_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("company/update_action/$id"),
                  'name_company' => set_value("name_company", $row->name_company),
                  'desc_company' => set_value("desc_company", $row->desc_company),
                  'visi' => set_value("visi", $row->visi),
                  'misi' => set_value("misi", $row->misi),
                  'img_logo' => set_value("img_logo", $row->img_logo),
                  'img_desc' => set_value("img_desc", $row->img_desc),
                  'img_header' => set_value("img_header", $row->img_header),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('company_update')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $json = array('success' => false);
    $this->form_validation->set_rules("name_company","* Name company","trim|xss_clean");
    $this->form_validation->set_rules("desc_company","* Desc company","trim|xss_clean");
    $this->form_validation->set_rules("visi","* Visi","trim|xss_clean");
    $this->form_validation->set_rules("misi","* Misi","trim|xss_clean");
    $this->form_validation->set_rules("img_logo","* Img logo","trim|xss_clean");
    $this->form_validation->set_rules("img_desc","* Img desc","trim|xss_clean");
    $this->form_validation->set_rules("img_header","* Img header","trim|xss_clean");
    $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

    if ($this->form_validation->run()) {
      $save_data['name_company'] = $this->input->post('name_company',true);
      $save_data['desc_company'] = $this->input->post('desc_company',true);
      $save_data['visi'] = $this->input->post('visi',true);
      $save_data['misi'] = $this->input->post('misi',true);
      $save_data['img_logo'] = $this->imageCopy($this->input->post('img_logo',true),$_POST['file-dir-img_logo']);
      $save_data['img_desc'] = $this->imageCopy($this->input->post('img_desc',true),$_POST['file-dir-img_desc']);
      $save_data['img_header'] = $this->imageCopy($this->input->post('img_header',true),$_POST['file-dir-img_header']);

      $save = $this->model->change(dec_url($id), $save_data);

      set_message("success",cclang("notif_update"));

      $json['redirect'] = url("company");
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
    if (!is_allowed('company_delete')) {
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

/* End of file Company.php */
/* Location: ./application/modules/company/controllers/backend/Company.php */
