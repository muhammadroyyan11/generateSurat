<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header">
      <b><?= ucwords($title_module) ?></b>
      <?php
      if ($status == 0) { ?>
        <div class="pull-right">
          <a href="<?= site_url('cpanel/rfq_request/approved/' . $id) ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i>Approved</a>
          <a href="<?= site_url('cpanel/rfq_request/not_approved/' . $id) ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-times"></i>Not Approved</a>
        </div>
      <?php }
      ?>

    </div>
    <div class="card">
      <div class="card-body">
        <?= $this->session->flashdata('pesan'); ?>
        <table class="table table-bordered table-striped">

          <tr>
            <td>No penawaran</td>
            <td><?= $no_penawaran ?></td>
          </tr>
          <tr>
            <td>Deadline</td>
            <td><?= $deadline != "" ? date('d-m-Y', strtotime($deadline)) : ""?></td>
          </tr>
          <tr>
            <td>SBU</td>
            <td><?= $sbu ?></td>
          </tr>
          <tr>
            <td>NPP</td>
            <td><?= $npp ?></td>
          </tr>
          <tr>
            <td>Status penawaran</td>
            <td><?= $status_penawaran ?></td>
          </tr>
          <tr>
            <td>Pelanggan</td>
            <td><?= $pelanggan ?></td>
          </tr>
          <tr>
            <td>Nama perusahaan</td>
            <td><?= $nama_perusahaan ?></td>
          </tr>
          <tr>
            <td>Nama proyek</td>
            <td><?= $nama_proyek ?></td>
          </tr>
          <tr>
            <td>Nama owner</td>
            <td><?= $nama_owner ?></td>
          </tr>
          <tr>
            <td>Untuk perhatian</td>
            <td><?= $untuk_perhatian ?></td>
          </tr>
          <tr>
            <td>Email pelanggan</td>
            <td><?= $email_pelanggan ?></td>
          </tr>
          <tr>
            <td>No hp</td>
            <td><?= $no_hp ?></td>
          </tr>
          <tr>
            <td>Kebutuhan produk</td>
            <td><?= $kebutuhan_produk ?></td>
          </tr>
          <tr>
            <td>Suplai batching</td>
            <td><?= $suplai_batching ?></td>
          </tr>
          <tr>
            <td>Sumber dana</td>
            <td><?= $sumber_dana ?></td>
          </tr>
          <tr>
            <td>Sektor</td>
            <td><?= $sektor ?></td>
          </tr>
          <tr>
            <td>Jenis proyek</td>
            <td><?= $jenis_proyek ?></td>
          </tr>
          <tr>
            <td>Tanggal mulai</td>
            <td><?= $tanggal_mulai != "" ? date('d-m-Y', strtotime($tanggal_mulai)) : "" ?></td>
          </tr>
          <tr>
            <td>Tanggal selesai</td>
            <td><?= $tanggal_selesai != "" ? date('d-m-Y', strtotime($tanggal_selesai)) : "" ?></td>
          </tr>
          <tr>
            <td>Wilayah</td>
            <td><?= $wilayah ?></td>
          </tr>
          <tr>
            <td>Koordinat maps</td>
            <td><?= $koordinat ?></td>
          </tr>
          <tr>
            <td>Jarak Batching Plant Menuju Site</td>
            <td><?= $batching_jarak ?></td>
          </tr>
          <tr>
            <td>Metode pembayaran</td>
            <td><?= $metode_pembayaran ?></td>
          </tr>
          <tr>
            <td>Omzet Kontrak</td>
            <td><?= $omzet_kontrak ?></td>
          </tr>
          <tr>
            <td>Omzet Penjualan</td>
            <td><?= $omzet_penjualan ?></td>
          </tr>
          <tr>
            <td>Termin</td>
            <td><?= $termin ?></td>
          </tr>
          <tr>
            <td>Tindak Lanjut</td>
            <td><?= $tindak_lanjut ?></td>
          </tr>
          <tr>
            <td>PIC SE</td>
            <td><?= $pic_se ?></td>
          </tr>
          <tr>
            <td>Total Volume</td>
            <td><?= $total_vol ?></td>
          </tr>
          <tr>
            <td>LKB</td>
            <td><?= $lkb ?></td>
          </tr>
          <tr>
            <td>Tanggal Penawaran</td>
            <td><?= $tgl_penawaran ?></td>
          </tr>
          <tr>
            <td>Umur Penawaran</td>
            <td>
              <?=
                $diff;
              ?>
            </td>
          </tr>
          <tr>
            <td>P ke</td>
            <td><?= $p_ke ?></td>
          </tr>
          <tr>
            <td>Lampiran</td>
            <td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Lihat Lampiran</button></td>
          </tr>
        </table>

        <a href="<?= url($this->uri->segment(2)) ?>" class="btn btn-sm btn-danger mt-3"><?= cclang("back") ?></a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lampiran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
          <?php
          if ($status == 1) { ?>
            <div class="pull-right">
              <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#addLampiran">
                <i class="fa fa-plus"></i> Tambah
              </button>
            </div>
          <?php } ?>
          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead>
                <tr>
                  <th>No</th>
                  <th>File</th>
                  <th>Date Uploaded</th>
                  <th>Uploaded by</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($file as $key => $data) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= character_limiter($data['file'], 20) ?> </td>
                    <td><?= $data['create_at'] ?></td>
                    <td><?= $data['type'] ?></td>
                    <td>
                      <?php if ($data['status'] == 0) {
                        echo 'Waiting';
                      } else if ($data['status'] == 1) {
                        echo 'Done';
                      } else {
                        echo 'Rejected';
                      } ?>
                    </td>
                    <td>
                      <a href="<?= base_url() ?>assets/uploads/file/<?= $data['file'] ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</a>
                      <?php
                      if ($data['status'] == 0) { ?>
                        <a href="<?= site_url('cpanel/rfq_request/approved_lampiran/' . $data['id']) ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check"></i> Approved</a>
                        <a href="<?= site_url('cpanel/rfq_request/not_approved_lampiran/' . $data['id']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-times"></i> Not Approved</a>
                      <?php }
                      ?>
                      <a href="<?= site_url('cpanel/rfq_request/delete_lampiran/' . $data['id']) ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>

                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </table>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addLampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lampiran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('cpanel/rfq_request/proses_lampiran') ?>" method="post" enctype="multipart/form-data" autocomplete="off">

          <div class="form-group">
            <label>Tambah lampiran</label>
            <input type="file" class="form-control" name="file">
            <input type="hidden" name="rfq_id" value="<?= $id ?>" class="form-control">
            <input type="hidden" name="nama_perusahaan" value="<?= $nama_perusahaan ?>" class="form-control">
            <input type="hidden" name="nama_proyek" value="<?= $nama_proyek ?>" class="form-control">
<!--            <input type="hidden" name="RFQNumber" value="--><?php //= $RFQNumber ?><!--" class="form-control">-->
          </div>+
          <!-- <input type="hidden" name="submit" value="update"> -->

          <div class="text-right">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>