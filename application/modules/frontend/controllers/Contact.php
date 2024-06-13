<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
        $this->load->helper('app');
    }

    public function index()
    {

        $data = [
            'title' => 'Hubungi Kami',
            'no_urut' => $this->base->get('no_urut')->row()->nomor
        ];
        // echo json_encode($data);
        $this->frontend->load('frontend/template', 'frontend/contact/contact', $data);
    }

    public function add_action()
    {
        $post = $this->input->post(null, true);

        $params = [
            'nomor_surat'   => $post['nomor_surat'],
            'nama_lengkap'  => $post['nama'],
            'tempat_lahir'  => $post['tempat_lahir'],
            'tgl_lahir'     => $post['tgl_lahir'],
            'nim'           => $post['nim'],
            'nik'           => $post['nik'],
            'fakultas'      => $post['fakultas'],
            'program_studi' => $post['program_studi'],
            'tahun_akademik' => $post['akademik'],
            'semester'      => $post['semester'],
            'tanggal_pembuatan' => date('Y-m-d')
        ];

        $no_urut = $this->base->get('no_urut')->row();


        $id_surat = $this->base->insert('data_surat', $params);

        $paramsNomor = [
            'nomor' => $no_urut->nomor + 1
        ];

        $this->base->edit('no_urut', $paramsNomor, ['id' => $no_urut->id]);

        redirect('contact/print/' . $id_surat);
    }

    public function print($id)
    {
        $data = [
            'row'   => $this->base->get('data_surat', ['id' => $id])->row()
        ];

        $this->load->view('print', $data);
    }
}
