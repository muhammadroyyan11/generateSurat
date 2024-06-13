<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
        <tr>
          <td>Nomor surat</td>
          <td><?=$nomor_surat?></td>
        </tr>
        <tr>
          <td>Nama lengkap</td>
          <td><?=$nama_lengkap?></td>
        </tr>
        <tr>
          <td>Tempat lahir</td>
          <td><?=$tempat_lahir?></td>
        </tr>
      <tr>
        <td>Tgl lahir</td>
        <td><?=$tgl_lahir != "" ? date('d-m-Y',strtotime($tgl_lahir)):""?></td>
      </tr>
        <tr>
          <td>Nim</td>
          <td><?=$nim?></td>
        </tr>
        <tr>
          <td>Nik</td>
          <td><?=$nik?></td>
        </tr>
        <tr>
          <td>Fakultas</td>
          <td><?=$fakultas?></td>
        </tr>
        <tr>
          <td>Program studi</td>
          <td><?=$program_studi?></td>
        </tr>
        <tr>
          <td>Tahun akademik</td>
          <td><?=$tahun_akademik?></td>
        </tr>
        <tr>
          <td>Semester</td>
          <td><?=$semester?></td>
        </tr>
        <tr>
          <td>Tanggal pembuatan</td>
          <td><?=$tanggal_pembuatan != "" ? date('d-m-Y H:i',strtotime($tanggal_pembuatan)):""?></td>
        </tr>
        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3"><?=cclang("back")?></a>
      </div>
    </div>
  </div>
</div>
