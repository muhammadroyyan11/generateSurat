<?php defined('BASEPATH') or exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : royyan  */
/*| version : V.0.0.2 */
/*| facebook :  */
/*| fanspage :  */
/*| instagram :  */
/*| youtube :  */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 19/10/2023 16:09*/
/*| Please DO NOT modify this information*/


class Rfq_request extends Backend
{

  private $title = "Rfq Request";


  public function __construct()
  {
    $config = array(
      'title' => $this->title,
    );
    parent::__construct($config);
    $this->load->model("Rfq_request_model", "model");
    $this->load->model('Base_model', 'base');
  }

  function index()
  {
    $this->is_allowed('rfq_request_list');
    $this->template->set_title($this->title);
    $this->template->view("index");
  }

  function approved($id)
  {
    $get = $this->model->get(['id' => $id])->row();

    $params = [
      'status' => 1
    ];

    $this->model->edit('rfq_request', $params, ['id' => $id]);

    if ($this->db->affected_rows() > 0) {
      set_pesan('Data berhasil disimpan');
    } else {
      set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
    }

    redirect('cpanel/rfq_request');
  }

  function not_approved($id)
  {
    $get = $this->model->get(['id' => $id])->row();

    $params = [
      'status' => 2
    ];

    $this->model->edit('rfq_request', $params, ['id' => $id]);

    if ($this->db->affected_rows() > 0) {
      set_pesan('Data berhasil disimpan');
    } else {
      set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
    }

    redirect('cpanel/rfq_request');
  }

  function json()
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('rfq_request_list')) {
        show_error("Access Permission", 403, '403::Access Not Permission');
        exit();
      }

      $list = $this->model->get_datatables();
      $data = array();
      foreach ($list as $row) {
        $rows = array();
        $rows[] = $row->id;
        $rows[] = $row->no_penawaran;
        $rows[] = $row->status_penawaran;
        $rows[] = $row->pelanggan;
        $rows[] = $row->nama_perusahaan;
        $rows[] = $row->nama_proyek;
        $rows[] = $row->nama_owner;
        $rows[] = $row->untuk_perhatian;
        $rows[] = $row->email_pelanggan;
        $rows[] = $row->no_hp;
        $rows[] = character_limiter($row->kebutuhan_produk, 50);
        $rows[] = $row->suplai_batching;
        $rows[] = $row->sumber_dana;
        $rows[] = $row->sektor;
        $rows[] = $row->jenis_proyek;
        $rows[] = date("d-m-Y",  strtotime($row->tanggal_mulai));
        $rows[] = date("d-m-Y",  strtotime($row->tanggal_selesai));
        $rows[] = $row->koordinat;
        $rows[] = $row->batching_jarak;
        $rows[] = $row->metode_pembayaran;

        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="' . url("rfq_request/detail/" . $row->id) . '" id="detail" class="btn btn-primary" title="' . cclang("detail") . '">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="' . url("rfq_request/update/" . enc_url($row->id)) . '" id="update" class="btn btn-warning" title="' . cclang("update") . '">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="' . url("rfq_request/delete/" . enc_url($row->id)) . '" id="delete" class="btn btn-danger" title="' . cclang("delete") . '">
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
    if (!is_allowed('rfq_request_filter')) {
      echo "access not permission";
    } else {
      $this->template->view("filter", [], false);
    }
  }

  function detail($id)
  {
    $this->is_allowed('rfq_request_detail');
    if ($row = $this->model->find($id)) {
      $this->template->set_title("Detail " . $this->title);
      $data = array(
        "id" => $row->id,
        "no_penawaran" => $row->no_penawaran,
        "status_penawaran" => $row->status_penawaran,
        "pelanggan" => $row->pelanggan,
        "nama_perusahaan" => $row->nama_perusahaan,
        "nama_proyek" => $row->nama_proyek,
        "nama_owner" => $row->nama_owner,
        "untuk_perhatian" => $row->untuk_perhatian,
        "email_pelanggan" => $row->email_pelanggan,
        "no_hp" => $row->no_hp,
        "kebutuhan_produk" => $row->kebutuhan_produk,
        "suplai_batching" => $row->suplai_batching,
        "sumber_dana" => $row->sumber_dana,
        "sektor" => $row->sektor,
        "jenis_proyek" => $row->jenis_proyek,
        "tanggal_mulai" => $row->tanggal_mulai,
        "tanggal_selesai" => $row->tanggal_selesai,
        "koordinat" => $row->koordinat,
        "batching_jarak" => $row->batching_jarak,
        "metode_pembayaran" => $row->metode_pembayaran,
        "status" => $row->status,
      );

      $data['file'] = $this->model->get_file($row->id)->result_array();
      $this->template->view("view", $data);
    } else {
      $this->error404();
    }
  }

  function approved_lampiran($id)
  {
    $post = $this->input->post(null, true);
    $get = $this->base->get('media', ['id' => $id])->row();

    $params = [
      'status' => 1,
    ];

    $this->model->edit('media', $params, ['id' => $id]);

    if ($this->db->affected_rows() > 0) {
      set_pesan('Data berhasil disimpan');
    } else {
      set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
    }

    redirect("cpanel/rfq_request/detail/" . $get->rfq_id);
  }

  function not_approved_lampiran($id)
  {
    $post = $this->input->post(null, true);
    $get = $this->base->get('media', ['id' => $id])->row();

    $params = [
      'status' => 2,
    ];

    $this->model->edit('media', $params, ['id' => $id]);

    if ($this->db->affected_rows() > 0) {
      set_pesan('Data berhasil disimpan');
    } else {
      set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
    }

    redirect("cpanel/rfq_request/detail/" . $get->rfq_id);
  }

  function add_lampiran($id)
  {
    // echo $id;
    $data = [
      'id' => $id,
    ];

    $this->template->view("add_lampiran", $data);
  }

  function proses_lampiran()
  {
    $post = $this->input->post(null, true);
    $url = $this->uri->segment(4);
    // $uri  =  $this->model->find(dec_u  rl($url))->id;

    $config['upload_path']          = './assets/uploads/file/';
    $config['allowed_types']        = 'jpg|jpeg|png|gif|pdf|docs|csv|xls|rar|zip|xlsx';
    $config['max_height']           = 10000;
    $this->load->library('upload', $config);

    if (@$_FILES['file']['name'] != null) {
      if ($this->upload->do_upload('file')) {
        $post['file'] = $this->upload->data('file_name');
        $post['tipe_file'] = $this->upload->data('file_type');

        $params_file = [
          'type'      => profile('name'),
          'file'      => $post['file'],
          'rfq_id'    => $post['rfq_id'],
          'create_at'    => date('Y-m-d H:i:s'),
        ];
        // var_dump($params_file);
        $this->base->insert('media', $params_file);
      } else {
        echo 'error';
      }
    } else {
      echo 'Testing';
    }
    echo $url;
    redirect("cpanel/rfq_request/detail/" . $post['rfq_id']);
  }

  function add()
  {
    $this->is_allowed('rfq_request_add');
    $this->template->set_title(cclang("add") . " " . $this->title);
    $data = array(
      'action' => url("rfq_request/add_action"),
      'no_penawaran' => set_value("no_penawaran"),
      'nama_perusahaan' => set_value("nama_perusahaan"),
      'nama_proyek' => set_value("nama_proyek"),
      'nama_owner' => set_value("nama_owner"),
    );
    $this->template->view("add", $data);
  }

  function add_action()
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('rfq_request_add')) {
        show_error("Access Permission", 403, '403::Access Not Permission');
        exit();
      }

      $json = array('success' => false);
      $this->form_validation->set_rules("no_penawaran", "* No penawaran", "trim|xss_clean|required");
      $this->form_validation->set_rules("nama_perusahaan", "* Nama perusahaan", "trim|xss_clean|required");
      $this->form_validation->set_rules("nama_proyek", "* Nama proyek", "trim|xss_clean|required");
      $this->form_validation->set_rules("nama_owner", "* Nama owner", "trim|xss_clean|required");
      $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">', '</i>');

      if ($this->form_validation->run()) {
        $save_data['no_penawaran'] = $this->input->post('no_penawaran', true);
        $save_data['nama_perusahaan'] = $this->input->post('nama_perusahaan', true);
        $save_data['nama_proyek'] = $this->input->post('nama_proyek', true);
        $save_data['nama_owner'] = $this->input->post('nama_owner', true);

        $this->model->insert($save_data);

        set_message("success", cclang("notif_save"));
        $json['redirect'] = url("rfq_request");
        $json['success'] = true;
      } else {
        foreach ($_POST as $key => $value) {
          $json['alert'][$key] = form_error($key);
        }
      }

      $this->response($json);
    }
  }

  function update($id)
  {
    $this->is_allowed('rfq_request_update');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("update") . " " . $this->title);
      $data = array(
        'action' => url("rfq_request/update_action/$id"),
        'no_penawaran' => set_value("no_penawaran", $row->no_penawaran),
        'status_penawaran' => set_value("status_penawaran", $row->status_penawaran),
        'untuk_perhatian' => set_value("untuk_perhatian", $row->untuk_perhatian),
        'nama_perusahaan' => set_value("nama_perusahaan", $row->nama_perusahaan),
        'email_pelanggan' => set_value("email_pelanggan", $row->email_pelanggan),
        'nama_proyek' => set_value("nama_proyek", $row->nama_proyek),
        'nama_owner' => set_value("nama_owner", $row->nama_owner),
        'pelanggan' => set_value("pelanggan", $row->pelanggan),
        'kebutuhan' => set_value("kebutuhan_produk", $row->kebutuhan_produk),
      );
      $this->template->view("update", $data);
    } else {
      $this->error404();
    }
  }

  function update_action($id)
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('rfq_request_update')) {
        show_error("Access Permission", 403, '403::Access Not Permission');
        exit();
      }

      $json = array('success' => false);
      // $this->form_validation->set_rules("no_penawaran", "* No penawaran", "trim|xss_clean|required");
      $this->form_validation->set_rules("nama_perusahaan", "* Nama perusahaan", "trim|xss_clean|required");
      $this->form_validation->set_rules("nama_proyek", "* Nama proyek", "trim|xss_clean|required");
      $this->form_validation->set_rules("nama_owner", "* Nama owner", "trim|xss_clean|required");
      $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">', '</i>');

      if ($this->form_validation->run()) {
        $save_data['no_penawaran'] = $this->input->post('no_penawaran', true);
        $save_data['status_penawaran'] = $this->input->post('status_penawaran', true);
        $save_data['nama_perusahaan'] = $this->input->post('nama_perusahaan', true);
        $save_data['nama_proyek'] = $this->input->post('nama_proyek', true);
        $save_data['untuk_perhatian'] = $this->input->post('untuk_perhatian', true);
        $save_data['email_pelanggan'] = $this->input->post('email_pelanggan', true);
        $save_data['nama_owner'] = $this->input->post('nama_owner', true);
        $save_data['pelanggan'] = $this->input->post('pelanggan', true);
        $save_data['kebutuhan_produk'] = $this->input->post('kebutuhan', true);

        $save = $this->model->change(dec_url($id), $save_data);

        set_message("success", cclang("notif_update"));

        $json['redirect'] = url("rfq_request");
        $json['success'] = true;
      } else {
        foreach ($_POST as $key => $value) {
          $json['alert'][$key] = form_error($key);
        }
      }

      $this->response($json);
    }
  }

  function delete_lampiran($id){
    $post = $this->input->post(null, true);
    $get = $this->base->get('media', ['id' => $id])->row();

    $this->base->del('media', ['id' => $id]);

    if ($this->db->affected_rows() > 0) {
      set_pesan('Data berhasil disimpan');
    } else {
      set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
    }

    redirect("cpanel/rfq_request/detail/" . $get->rfq_id);
  }

  function delete($id)
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('rfq_request_delete')) {
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

/* End of file Rfq_request.php */
/* Location: ./application/modules/rfq_request/controllers/backend/Rfq_request.php */
