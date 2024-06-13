<?php defined('BASEPATH') or exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : royyan  */
/*| version : V.0.0.2 */
/*| facebook :  */
/*| fanspage :  */
/*| instagram :  */
/*| youtube :  */
/*| --------------------------------------------------------------------------*/
/*| Generate By M-CRUD Generator 12/12/2023 17:07*/
/*| Please DO NOT modify this information*/

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rfq_request extends Backend
{
    private $title = 'Rfq Request';

    public function __construct()
    {
        $config = [
            'title' => $this->title,
        ];
        parent::__construct($config);
        $this->load->model('Rfq_request_model', 'model');
        $this->load->model('Base_model', 'base');
    }

    function index()
    {
        $this->is_allowed('rfq_request_list');
        $this->template->set_title($this->title);
        $this->template->view('index');
    }

    function approved($id)
    {
        $get = $this->model->get(['id' => $id])->row();

        $params = [
            'status' => 1,
        ];

        $this->model->edit('rfq_request', $params, ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', false);
        }

        redirect('cpanel/rfq_request');
    }

    function not_approved($id)
    {
        $get = $this->model->get(['id' => $id])->row();

        $params = [
            'status' => 2,
        ];

        $this->model->edit('rfq_request', $params, ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', false);
        }

        redirect('cpanel/rfq_request');
    }

    function json()
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('rfq_request_list')) {
                show_error('Access Permission', 403, '403::Access Not Permission');
                exit();
            }

            $today = new DateTime();

            $list = $this->model->get_datatables();
            $data = [];
            foreach ($list as $row) {
                $rows = [];
                $rows[] = '';
                $rows[] = $row->id;
                $rows[] = $row->pic_se;
                $rows[] = date('d-m-Y', strtotime($row->deadline));
                $rows[] = $row->sbu;
                $rows[] = $row->npp;
                $rows[] = $row->tgl_penawaran;

                $tgl_penawaran = new DateTime($row->tgl_penawaran);
                $diff = $today->diff($tgl_penawaran)->format("%R%a days");
                $rows[] = $diff;

                $rows[] = $row->p_ke;
                $rows[] = $row->no_penawaran;
                $rows[] = $row->status_gagal;
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
                $rows[] = date('d-m-Y', strtotime($row->tanggal_mulai));
                $rows[] = date('d-m-Y', strtotime($row->tanggal_selesai));
                $rows[] = $row->wilayah;
                $rows[] = $row->koordinat;
                $rows[] = $row->batching_jarak;
                $rows[] = $row->metode_pembayaran;
                $rows[] = number_format($row->total_vol,2,",",".");
                // $rows[] = number_format($row->lkb,2,",",".");
                $rows[] = $row->lkb;
                $rows[] = number_format($row->omzet_kontrak,0,",",".");
                $rows[] = number_format($row->omzet_penjualan,0,",",".");
                $rows[] = number_format($row->termin,0,",",".");
                $rows[] = $row->tindak_lanjut;

                $rows[] =
                    '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="' .
                    url('rfq_request/detail/' . $row->id) .
                    '" id="detail" class="btn btn-primary" title="' .
                    cclang('detail') .
                    '">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="' .
                    url('rfq_request/update/' . enc_url($row->id)) .
                    '" id="update" class="btn btn-warning" title="' .
                    cclang('update') .
                    '">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="' .
                    url('rfq_request/delete/' . enc_url($row->id)) .
                    '" id="delete" class="btn btn-danger" title="' .
                    cclang('delete') .
                    '">
                        <i class="ti-trash"></i>
                      </a>
                    </div>
                 ';

                $data[] = $rows;
            }

            $output = [
                'draw' => $_POST['draw'],
                'recordsTotal' => $this->model->count_all(),
                'recordsFiltered' => $this->model->count_filtered(),
                'data' => $data,
            ];
            //output to json format
            return $this->response($output);
        }
    }

    function filter()
    {
        if (!is_allowed('rfq_request_filter')) {
            echo 'access not permission';
        } else {
            $this->template->view('filter', [], false);
        }
    }

    function detail($id)
    {
        $this->is_allowed('rfq_request_detail');
        if ($row = $this->model->find($id)) {
            $this->template->set_title('Detail ' . $this->title);

            $today = new DateTime();
            $tgl_penawaran = new DateTime($row->tgl_penawaran);
            $diff = $today->diff($tgl_penawaran)->format("%R%a days");

            $data = [
                'id' => $row->id,
                'no_penawaran' => $row->no_penawaran,
                'status_penawaran' => $row->status_penawaran,
                'pelanggan' => $row->pelanggan,
                'nama_perusahaan' => $row->nama_perusahaan,
                'nama_proyek' => $row->nama_proyek,
                'nama_owner' => $row->nama_owner,
                'untuk_perhatian' => $row->untuk_perhatian,
                'email_pelanggan' => $row->email_pelanggan,
                'no_hp' => $row->no_hp,
                'kebutuhan_produk' => $row->kebutuhan_produk,
                'suplai_batching' => $row->suplai_batching,
                'sumber_dana' => $row->sumber_dana,
                'sektor' => $row->sektor,
                'jenis_proyek' => $row->jenis_proyek,
                'tanggal_mulai' => $row->tanggal_mulai,
                'tanggal_selesai' => $row->tanggal_selesai,
                'koordinat' => $row->koordinat,
                'batching_jarak' => $row->batching_jarak,
                'metode_pembayaran' => $row->metode_pembayaran,
                'status' => $row->status,
                'deadline' => $row->deadline,
                'sbu' => $row->sbu,
                'npp' => $row->npp,
                'wilayah' => $row->wilayah,
                'omzet_kontrak' => number_format($row->omzet_kontrak,0,",","."),
                'omzet_penjualan' => number_format($row->omzet_penjualan,0,",","."),
                'termin' => number_format($row->termin,0,",","."),
                'status_gagal' => $row->status_gagal,
                'tindak_lanjut' => $row->tindak_lanjut,
                'pic_se' => $row->pic_se,
                'total_vol' => number_format($row->total_vol,2,",","."),
                // 'lkb' => number_format($row->lkb,2,",","."),
                'lkb' => $row->lkb,
                'p_ke' => $row->p_ke,
                'tgl_penawaran' => $row->tgl_penawaran,
                'diff' => $diff
            ];
            $data['file'] = $this->model->get_file($row->id)->result_array();
            $this->template->view('view', $data);
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
            set_pesan('Terjadi kesalahan menyimpan data!', false);
        }

        redirect('cpanel/rfq_request/detail/' . $get->rfq_id);
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
            set_pesan('Terjadi kesalahan menyimpan data!', false);
        }

        redirect('cpanel/rfq_request/detail/' . $get->rfq_id);
    }

    function add_lampiran($id)
    {
        // echo $id;
        $data = [
            'id' => $id,
        ];

        $this->template->view('add_lampiran', $data);
    }

    public function filter_filename($str)
    {
        // Define characters that are allowed in the filename
        $str = str_replace(' ', '_', $str);

        // Remove disallowed characters from the filename (allowing only alphanumeric and underscores)
        $filtered_str = preg_replace('/[^a-zA-Z0-9_]+/', '', $str);

        return $filtered_str;
    }

    function proses_lampiran()
    {
        $post = $this->input->post(null, true);
        $url = $this->uri->segment(4);
        // $uri  =  $this->model->find(dec_u  rl($url))->id;
        $file_name = $post['rfq_id'] . ' - ' . $post['nama_perusahaan'] . ' - ' . $post['nama_proyek'] . ' - ' . date('Y-m-d H:i:s');
        $file_name = $this->filter_filename($file_name);
        $file_info = pathinfo($_FILES['file']['name']);
        $file_extension  = $file_info['extension'];

        $config['upload_path'] = './assets/uploads/file/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docs|csv|xls|rar|zip|xlsx';
        $config['max_height'] = 10000;
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);

        if (@$_FILES['file']['name'] != null) {
            if ($this->upload->do_upload('file')) {
                $post['file'] = $this->upload->data('file_name');
                $post['tipe_file'] = $this->upload->data('file_type');

                $params_file = [
                    'type' => profile('name'),
                    'file' => $file_name . '.' . $file_extension,
                    'rfq_id' => $post['rfq_id'],
                    'create_at' => date('Y-m-d H:i:s'),
                ];
                // var_dump($params_file);
                $this->base->insert('media', $params_file);

                $uploaderId = profile('id_user');
                $uploaderId2 = $this->model->get_all_id()->result_array();

                if ($this->db->affected_rows() > 0) {
                    $paramsNotif = [
                        'Description' => '' . profile('name') . ' telah mengupload dokumen ID ' . $post['rfq_id'] . '',
                        'created_by' => profile('name'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'rfq_id' => $post['rfq_id'],
                        'id_user' => $uploaderId,
                    ];

                    $this->base->add('notification', $paramsNotif);

                    foreach ($uploaderId2 as $userId) {
                        if ($userId['id_user'] != $uploaderId) {
                            $paramsAllUsers = [
                                'Description' => 'New document ID ' . $post['rfq_id'] . ' uploaded by ' . profile('name'),
                                'created_by' => profile('name'),
                                'created_at' => date('Y-m-d H:i:s'),
                                'rfq_id' => $post['rfq_id'],
                                'id_user' => $userId['id_user'],
                            ];

                            $this->base->add('notification', $paramsAllUsers);
                        }
                    }
                }
            } else {
                echo 'error';
            }
        } else {
            echo 'Testing';
        }
        echo $url;
        redirect('cpanel/rfq_request/detail/' . $post['rfq_id']);
    }

    function delete_lampiran($id)
    {
        $post = $this->input->post(null, true);
        $get = $this->base->get('media', ['id' => $id])->row();

        $this->base->del('media', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', false);
        }

        redirect('cpanel/rfq_request/detail/' . $get->rfq_id);
    }

    function add()
    {
        $this->is_allowed('rfq_request_add');
        $this->template->set_title(cclang('add') . ' ' . $this->title);

        $data = [
            'action' => url('rfq_request/add_action'),
            'no_penawaran' => set_value('no_penawaran'),
            'pelanggan' => set_value('pelanggan'),
            'nama_perusahaan' => set_value('nama_perusahaan'),
            'nama_proyek' => set_value('nama_proyek'),
            'nama_owner' => set_value('nama_owner'),
            'untuk_perhatian' => set_value('untuk_perhatian'),
            'email_pelanggan' => set_value('email_pelanggan'),
            'no_hp' => set_value('no_hp'),
            'kebutuhan_produk' => set_value('kebutuhan_produk'),
            'suplai_batching' => set_value('suplai_batching'),
            'jarak' => set_value('jarak'),
            'sumber_dana' => set_value('sumber_dana'),
            'sektor' => set_value('sektor'),
            'jenis_proyek' => set_value('jenis_proyek'),
            'tanggal_mulai' => set_value('tanggal_mulai'),
            'tanggal_selesai' => set_value('tanggal_selesai'),
            'koordinat' => set_value('koordinat'),
            'batching_jarak' => set_value('batching_jarak'),
            'metode_pembayaran' => set_value('metode_pembayaran'),
            'status' => set_value('status'),
            'deadline' => set_value('deadline'),
            'sbu' => set_value('sbu'),
            'npp' => set_value('npp'),
            'wilayah' => set_value('wilayah'),
            'omzet_kontrak' => set_value('omzet_kontrak'),
            'omzet_penjualan' => set_value('omzet_penjualan'),
            'termin' => set_value('termin'),
            'tindak_lanjut' => set_value('tindak_lanjut'),
            'status_gagal' => set_value('status_gagal'),
            'pic_se' => set_value('pic_se'),
            'total_vol' => set_value('total_vol'),
            'lkb' => set_value('lkb'),
            'tgl_penawaran' => set_value('tgl_penawaran'),
            'p_ke' => set_value('p_ke'),
        ];
        $this->template->view('add', $data);
    }

    function add_action()
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('rfq_request_add')) {
                show_error('Access Permission', 403, '403::Access Not Permission');
                exit();
            }
            $RFQNumber = $this->model->CreateCode();

            $json = ['success' => false];
            $this->form_validation->set_rules('no_penawaran', '* No penawaran', 'trim|xss_clean');
            $this->form_validation->set_rules('pelanggan', '* Pelanggan', 'trim|xss_clean');
            $this->form_validation->set_rules('nama_perusahaan', '* Nama perusahaan', 'trim|xss_clean');
            $this->form_validation->set_rules('nama_proyek', '* Nama proyek', 'trim|xss_clean');
            $this->form_validation->set_rules('nama_owner', '* Nama owner', 'trim|xss_clean');
            $this->form_validation->set_rules('untuk_perhatian', '* Untuk perhatian', 'trim|xss_clean');
            $this->form_validation->set_rules('email_pelanggan', '* Email pelanggan', 'trim|xss_clean');
            $this->form_validation->set_rules('no_hp', '* No hp', 'trim|xss_clean|numeric');
            $this->form_validation->set_rules('kebutuhan_produk', '* Kebutuhan produk', 'trim|xss_clean');
            $this->form_validation->set_rules('suplai_batching', '* Suplai batching', 'trim|xss_clean');
            $this->form_validation->set_rules('jarak', '* Jarak', 'trim|xss_clean');
            $this->form_validation->set_rules('sumber_dana', '* Sumber dana', 'trim|xss_clean');
            $this->form_validation->set_rules('sektor', '* Sektor', 'trim|xss_clean');
            $this->form_validation->set_rules('jenis_proyek', '* Jenis proyek', 'trim|xss_clean');
            $this->form_validation->set_rules('tanggal_mulai', '* Tanggal mulai', 'trim|xss_clean');
            $this->form_validation->set_rules('tanggal_selesai', '* Tanggal selesai', 'trim|xss_clean');
            $this->form_validation->set_rules('koordinat', '* Koordinat', 'trim|xss_clean');
            $this->form_validation->set_rules('batching_jarak', '* Batching jarak', 'trim|xss_clean');
            $this->form_validation->set_rules('metode_pembayaran', '* Metode pembayaran', 'trim|xss_clean');
            $this->form_validation->set_rules('status', '* Status', 'trim|xss_clean');
            $this->form_validation->set_rules('deadline', '* Deadline', 'trim|xss_clean');
            $this->form_validation->set_rules('sbu', '* SBU', 'trim|xss_clean');
            $this->form_validation->set_rules('npp', '* NPP', 'trim|xss_clean');
            $this->form_validation->set_rules('wilayah', '* Wilayah', 'trim|xss_clean');
            $this->form_validation->set_rules('omzet_kontrak', '* Omzet Kontrak', 'trim|xss_clean');
            $this->form_validation->set_rules('omzet_penjualan', '* Omzet Penjualan', 'trim|xss_clean');
            $this->form_validation->set_rules('termin', '* Termin', 'trim|xss_clean');
            $this->form_validation->set_rules('tindak_lanjut', '* Tindak lanjut', 'trim|xss_clean');
            $this->form_validation->set_rules('status_gagal', '* Status gagal', 'trim|xss_clean');
            $this->form_validation->set_rules('pic_se', '* PIC SE', 'trim|xss_clean');
            $this->form_validation->set_rules('total_vol', '* Total Vol', 'trim|xss_clean');
            $this->form_validation->set_rules('lkb', '* LKB', 'trim|xss_clean');
            $this->form_validation->set_rules('tgl_penawaran', '* Tanggal Penawaran', 'trim|xss_clean');
            $this->form_validation->set_rules('p_ke', '* P ke', 'trim|xss_clean');
            $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">', '</i>');

            if ($this->form_validation->run()) {
                $save_data['RFQNumber'] = $RFQNumber;
                $save_data['no_penawaran'] = $this->input->post('no_penawaran', true);
                $save_data['pelanggan'] = $this->input->post('pelanggan', true);
                $save_data['nama_perusahaan'] = $this->input->post('nama_perusahaan', true);
                $save_data['nama_proyek'] = $this->input->post('nama_proyek', true);
                $save_data['nama_owner'] = $this->input->post('nama_owner', true);
                $save_data['untuk_perhatian'] = $this->input->post('untuk_perhatian', true);
                $save_data['email_pelanggan'] = $this->input->post('email_pelanggan', true);
                $save_data['no_hp'] = $this->input->post('no_hp', true);
                $save_data['kebutuhan_produk'] = $this->input->post('kebutuhan_produk', true);
                $save_data['suplai_batching'] = $this->input->post('suplai_batching', true);
                $save_data['jarak'] = $this->input->post('jarak', true);
                $save_data['sumber_dana'] = $this->input->post('sumber_dana', true);
                $save_data['sektor'] = $this->input->post('sektor', true);
                $save_data['jenis_proyek'] = $this->input->post('jenis_proyek', true);
                $save_data['tanggal_mulai'] = date('Y-m-d', strtotime($this->input->post('tanggal_mulai', true)));
                $save_data['tanggal_selesai'] = date('Y-m-d', strtotime($this->input->post('tanggal_selesai', true)));
                $save_data['koordinat'] = $this->input->post('koordinat', true);
                $save_data['batching_jarak'] = $this->input->post('batching_jarak', true);
                $save_data['metode_pembayaran'] = $this->input->post('metode_pembayaran', true);
                $save_data['status'] = $this->input->post('status', true);
                $save_data['deadline'] = $this->input->post('deadline', true);
                $save_data['sbu'] = $this->input->post('sbu', true);
                $save_data['npp'] = $this->input->post('npp', true);
                $save_data['wilayah'] = $this->input->post('wilayah', true);
                $save_data['omzet_kontrak'] = $this->input->post('omzet_kontrak', true);
                $save_data['omzet_penjualan'] = $this->input->post('omzet_penjualan', true);
                $save_data['termin'] = $this->input->post('termin', true);
                $save_data['tindak_lanjut'] = $this->input->post('tindak_lanjut', true);
                $save_data['status_gagal'] = $this->input->post('status_gagal', true);
                $save_data['pic_se'] = $this->input->post('pic_se', true);
                $save_data['total_vol'] = $this->input->post('total_vol', true);
                $save_data['lkb'] = $this->input->post('lkb', true);
                $save_data['tgl_penawaran'] = $this->input->post('tgl_penawaran', true);
                $save_data['p_ke'] = $this->input->post('p_ke', true);

                $this->model->insert($save_data);

                set_message('success', cclang('notif_save'));
                $json['redirect'] = url('rfq_request');
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
            $this->template->set_title(cclang('update') . ' ' . $this->title);

            $data = [
                'action' => url("rfq_request/update_action/$id"),
                'no_penawaran' => set_value('no_penawaran', $row->no_penawaran),
                'status_penawaran' => set_value('status_penawaran', $row->status_penawaran),
                'untuk_perhatian' => set_value('untuk_perhatian', $row->untuk_perhatian),
                'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
                'email_pelanggan' => set_value('email_pelanggan', $row->email_pelanggan),
                'nama_proyek' => set_value('nama_proyek', $row->nama_proyek),
                'nama_owner' => set_value('nama_owner', $row->nama_owner),
                'pelanggan' => set_value('pelanggan', $row->pelanggan),
                'kebutuhan_produk' => set_value('kebutuhan_produk', $row->kebutuhan_produk),
                'deadline' => $row->deadline == '' ? '' : date('Y-m-d', strtotime($row->deadline)),
                'sbu' => set_value('sbu', $row->sbu),
                'npp' => set_value('npp', $row->npp),
                'suplai_batching' => set_value('suplai_batching', $row->suplai_batching),
                'koordinat' => set_value('koordinat', $row->koordinat),
                'batching_jarak' => set_value('batching_jarak', $row->batching_jarak),
                'wilayah' => set_value('wilayah', $row->wilayah),
                'omzet_kontrak' => set_value('omzet_kontrak', $row->omzet_kontrak),
                'omzet_penjualan' => set_value('omzet_penjualan', $row->omzet_penjualan),
                'termin' => set_value('termin', $row->termin),
                'tindak_lanjut' => set_value('tindak_lanjut', $row->tindak_lanjut),
                'status_gagal' => set_value('status_gagal', $row->status_gagal),
                'pic_se' => set_value('pic_se', $row->pic_se),
                'total_vol' => set_value('total_vol', $row->total_vol),
                'lkb' => set_value('lkb', $row->lkb),
                'tgl_penawaran' =>  $row->tgl_penawaran == '' ? '' : date('Y-m-d', strtotime($row->tgl_penawaran)),
                'p_ke' => set_value('p_ke', $row->p_ke),
                'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
                'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
            ];
            $this->template->view('update', $data);
        } else {
            $this->error404();
        }
    }

    function update_action($id)
    {
        $this->form_validation->set_rules('no_penawaran', '* No penawaran', 'trim|xss_clean');
        $this->form_validation->set_rules('nama_perusahaan', '* Nama perusahaan', 'trim|xss_clean');
        $this->form_validation->set_rules('nama_proyek', '* Nama proyek', 'trim|xss_clean');
        $this->form_validation->set_rules('nama_owner', '* Nama owner', 'trim|xss_clean');
        $this->form_validation->set_rules('deadline', '* Deadline', 'trim|xss_clean');
        $this->form_validation->set_rules('sbu', '* SBU', 'trim|xss_clean');
        $this->form_validation->set_rules('npp', '* NPP', 'trim|xss_clean');
        $this->form_validation->set_rules('koordinat', '* Share Location', 'trim|xss_clean');
        $this->form_validation->set_rules('batching_jarak', '* Batching Jarak', 'trim|xss_clean');
        $this->form_validation->set_rules('suplai_batching', '* Suplai Batching', 'trim|xss_clean');
        $this->form_validation->set_rules('wilayah', '* Wilayah', 'trim|xss_clean');
        $this->form_validation->set_rules('omzet_kontrak', '* Omzet Kontrak', 'trim|xss_clean');
        $this->form_validation->set_rules('omzet_penjualan', '* Omzet Penjualan', 'trim|xss_clean');
        $this->form_validation->set_rules('termin', '* Termin', 'trim|xss_clean');
        $this->form_validation->set_rules('tindak_lanjut', '* Tindak lanjut', 'trim|xss_clean');
        $this->form_validation->set_rules('status_gagal', '* Status gagal', 'trim|xss_clean');
        $this->form_validation->set_rules('pic_se', '* PIC SE', 'trim|xss_clean');
        $this->form_validation->set_rules('total_vol', '* Total Vol', 'trim|xss_clean');
        $this->form_validation->set_rules('lkb', '* LKB', 'trim|xss_clean');
        $this->form_validation->set_rules('tgl_penawaran', '* Tanggal Penawaran', 'trim|xss_clean');
        $this->form_validation->set_rules('p_ke', '* P ke', 'trim|xss_clean');
        $this->form_validation->set_rules('tanggal_mulai', '* Tanggal Mulai', 'trim|xss_clean');
        $this->form_validation->set_rules('tanggal_selesai', '* Tanggal Selesai', 'trim|xss_clean');
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
            $save_data['kebutuhan_produk'] = $this->input->post('kebutuhan_produk', true);
            $save_data['deadline'] = $this->input->post('deadline', true);
            $save_data['sbu'] = $this->input->post('sbu', true);
            $save_data['npp'] = $this->input->post('npp', true);

            $suplai_batching = $this->input->post('suplai_batching', true);
            if ($suplai_batching == 'Other') {
                $save_data['suplai_batching'] = $this->input->post('suplai_batching_other', true);
            } else {
                $save_data['suplai_batching'] = $suplai_batching;
            }

            $save_data['koordinat'] = $this->input->post('koordinat', true);
            $save_data['batching_jarak'] = $this->input->post('batching_jarak', true);
            $save_data['wilayah'] = $this->input->post('wilayah', true);
            $save_data['omzet_kontrak'] = $this->input->post('omzet_kontrak', true);
            $save_data['omzet_penjualan'] = $this->input->post('omzet_penjualan', true);
            $save_data['termin'] = $this->input->post('termin', true);
            $save_data['tindak_lanjut'] = $this->input->post('tindak_lanjut', true);
            $save_data['status_gagal'] = $this->input->post('status_gagal', true);
            $save_data['pic_se'] = $this->input->post('pic_se', true);
            
            $total_vol = $this->input->post('total_vol', true);
            $total_vol = preg_replace('/\s+/', '', str_replace(',', '.', $total_vol));
            $save_data['total_vol'] = $total_vol;

            $lkb = $this->input->post('lkb', true);
            $lkb = preg_replace('/\s+/', '', str_replace(',', '.', $lkb));
            $save_data['lkb'] = $lkb;

            $save_data['tgl_penawaran'] = $this->input->post('tgl_penawaran', true);
            $save_data['p_ke'] = $this->input->post('p_ke', true);
            $save_data['tanggal_mulai'] = $this->input->post('tanggal_mulai', true);
            $save_data['tanggal_selesai'] = $this->input->post('tanggal_selesai', true);

            $save = $this->model->change(dec_url($id), $save_data);

            set_message('success', cclang('notif_update'));
            redirect(url('rfq_request'));
        } else {
            echo 'Error';
        }
    }

    function delete($id)
    {
        if ($this->input->is_ajax_request()) {
            if (!is_allowed('rfq_request_delete')) {
                return $this->response([
                    'type_msg' => 'error',
                    'msg' => 'do not have permission to access',
                ]);
            }

            $this->model->remove(dec_url($id));
            $json['type_msg'] = 'success';
            $json['msg'] = cclang('notif_delete');

            return $this->response($json);
        }
    }


    public function export()
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        $post = $this->input->post(null, true);

        $pecah = explode(' - ', $post['tanggal']);
        $today = new DateTime();
        $dateKeluar = new DateTime();
        $mulai = date('Y-m-d', strtotime($pecah[0]));
        $akhir = date('Y-m-d', strtotime(end($pecah)));

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
            ]
        ];

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
            ]
        ];
        $sheet->setCellValue('A1', "Data Monitor RFQ");
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO ID");
        $sheet->setCellValue('B3', "Deadline");
        $sheet->setCellValue('C3', "SBU");
        $sheet->setCellValue('D3', "NPP");
        $sheet->setCellValue('E3', "No penawaran");
        $sheet->setCellValue('F3', "Status Gagal");
        $sheet->setCellValue('G3', "Status penawaran");
        $sheet->setCellValue('H3', "Pelanggan");
        $sheet->setCellValue('I3', "Nama perusahaan");
        $sheet->setCellValue('J3', "Nama proyek");
        $sheet->setCellValue('K3', 'Nama owner');
        $sheet->setCellValue('L3', 'Untuk perhatian');
        $sheet->setCellValue('M3', 'Email pelanggan');
        $sheet->setCellValue('N3', 'No hp');
        $sheet->setCellValue('O3', 'Kebutuhan produk');
        $sheet->setCellValue('P3', 'Suplai batching');
        $sheet->setCellValue('Q3', 'Sumber dana');
        $sheet->setCellValue('R3', 'Sektor');
        $sheet->setCellValue('S3', 'Jenis proyek');
        $sheet->setCellValue('T3', 'Tanggal mulai');
        $sheet->setCellValue('U3', 'Tanggal selesai');
        $sheet->setCellValue('V3', 'Wilayah');
        $sheet->setCellValue('W3', 'Koordinat maps');
        $sheet->setCellValue('X3', 'Jarak Batching Plant Menuju Site');
        $sheet->setCellValue('Y3', 'Metode pembayaran');
        $sheet->setCellValue('Z3', 'Omzet Kontrak');
        $sheet->setCellValue('AA3', 'Omzet Penjualan');
        $sheet->setCellValue('AB3', 'Termin');
        $sheet->setCellValue('AC3', 'Tindak Lanjut');
        $sheet->setCellValue('AD3', 'PIC SE');
        $sheet->setCellValue('AE3', 'Total Vol');
        $sheet->setCellValue('AF3', 'LKB');
        $sheet->setCellValue('AG3', 'Tanggal Penawaran');
        $sheet->setCellValue('AH3', 'Umur Penawaran');
        $sheet->setCellValue('AI3', 'P Ke');
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);
        $sheet->getStyle('I3')->applyFromArray($style_col);
        $sheet->getStyle('J3')->applyFromArray($style_col);
        $sheet->getStyle('K3')->applyFromArray($style_col);
        $sheet->getStyle('L3')->applyFromArray($style_col);
        $sheet->getStyle('M3')->applyFromArray($style_col);
        $sheet->getStyle('N3')->applyFromArray($style_col);
        $sheet->getStyle('O3')->applyFromArray($style_col);
        $sheet->getStyle('P3')->applyFromArray($style_col);
        $sheet->getStyle('Q3')->applyFromArray($style_col);
        $sheet->getStyle('R3')->applyFromArray($style_col);
        $sheet->getStyle('S3')->applyFromArray($style_col);
        $sheet->getStyle('T3')->applyFromArray($style_col);
        $sheet->getStyle('U3')->applyFromArray($style_col);
        $sheet->getStyle('V3')->applyFromArray($style_col);
        $sheet->getStyle('W3')->applyFromArray($style_col);
        $sheet->getStyle('X3')->applyFromArray($style_col);
        $sheet->getStyle('Y3')->applyFromArray($style_col);
        $sheet->getStyle('Z3')->applyFromArray($style_col);
        $sheet->getStyle('AA3')->applyFromArray($style_col);
        $sheet->getStyle('AB3')->applyFromArray($style_col);
        $sheet->getStyle('AC3')->applyFromArray($style_col);
        $sheet->getStyle('AD3')->applyFromArray($style_col);
        $sheet->getStyle('AE3')->applyFromArray($style_col);
        $sheet->getStyle('AF3')->applyFromArray($style_col);
        $sheet->getStyle('AG3')->applyFromArray($style_col);
        $sheet->getStyle('AH3')->applyFromArray($style_col);
        $sheet->getStyle('AI3')->applyFromArray($style_col);

        //GET DATA
        $rfqData = $this->base->getExport(['mulai' => $mulai, 'akhir' => $akhir])->result();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($rfqData as $data){ // Lakukan looping pada variabel siswa
          $sheet->setCellValue('A'.$numrow, $data->id);
          $sheet->setCellValue('B'.$numrow, $data->deadline);
          $sheet->setCellValue('C'.$numrow, $data->sbu);
          $sheet->setCellValue('D'.$numrow, $data->npp);
          $sheet->setCellValue('E'.$numrow, $data->no_penawaran);
          $sheet->setCellValue('F'.$numrow, $data->status_gagal);
          $sheet->setCellValue('G'.$numrow, $data->status_penawaran);
          $sheet->setCellValue('H'.$numrow, $data->pelanggan);
          $sheet->setCellValue('I'.$numrow, $data->nama_perusahaan);
          $sheet->setCellValue('J'.$numrow, $data->nama_proyek);
          $sheet->setCellValue('K'.$numrow, $data->nama_owner);
          $sheet->setCellValue('L'.$numrow, $data->untuk_perhatian);
          $sheet->setCellValue('M'.$numrow, $data->email_pelanggan);
          $sheet->setCellValue('N'.$numrow, $data->no_hp);
          $sheet->setCellValue('O'.$numrow, strip_tags($data->kebutuhan_produk));
          $sheet->setCellValue('P'.$numrow, $data->suplai_batching);
          $sheet->setCellValue('Q'.$numrow, $data->sumber_dana);
          $sheet->setCellValue('R'.$numrow, $data->sektor);
          $sheet->setCellValue('S'.$numrow, $data->jenis_proyek);
          $sheet->setCellValue('T'.$numrow, $data->tanggal_mulai);
          $sheet->setCellValue('U'.$numrow, $data->tanggal_selesai);
          $sheet->setCellValue('V'.$numrow, $data->wilayah);
          $sheet->setCellValue('W'.$numrow, $data->koordinat);
          $sheet->setCellValue('X'.$numrow, $data->batching_jarak);
          $sheet->setCellValue('Y'.$numrow, $data->metode_pembayaran);
          $sheet->setCellValue('Z'.$numrow, $data->omzet_kontrak);
          $sheet->setCellValue('AA'.$numrow, $data->omzet_penjualan);
          $sheet->setCellValue('AB'.$numrow, $data->termin);
          $sheet->setCellValue('AC'.$numrow, $data->tindak_lanjut);
          $sheet->setCellValue('AD'.$numrow, $data->pic_se);
          $sheet->setCellValue('AE'.$numrow, $data->total_vol);
          $sheet->setCellValue('AF'.$numrow, $data->lkb);
          $sheet->setCellValue('AG'.$numrow, $data->tgl_penawaran);

          $tgl_penawaran = new DateTime($data->tgl_penawaran);
          $diff = $today->diff($tgl_penawaran)->format("%R%a days");
          $sheet->setCellValue('AH'.$numrow, $diff);

          $sheet->setCellValue('AI'.$numrow, $data->p_ke);

          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('M'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('N'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('O'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('P'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('Q'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('R'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('S'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('T'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('U'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('V'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('W'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('X'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('Y'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('Z'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('Z'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AA'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AB'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AC'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AD'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AE'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AF'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AG'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AH'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('AI'.$numrow)->applyFromArray($style_row);

          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(20); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(30); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(20); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(50); // Set width kolom D
        $sheet->getColumnDimension('E')->setWidth(80); // Set width kolom D
        $sheet->getColumnDimension('F')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('G')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('H')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('I')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('J')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('K')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('L')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('M')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('N')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('O')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('P')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('Q')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('R')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('S')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('T')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('U')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('V')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('W')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('X')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('Y')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('Z')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AA')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AB')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AC')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AD')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AE')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AF')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AG')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AH')->setWidth(50); // Set width kolom E
        $sheet->getColumnDimension('AI')->setWidth(50); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Data Monitor RFQ");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Monitor RFQ '. $mulai. ' - '. $akhir .'.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}

/* End of file Rfq_request.php */
/* Location: ./application/modules/rfq_request/controllers/backend/Rfq_request.php */