<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        Add Lampiran
      </div>
      <div class="card-body">
          <form action="<?= site_url('cpanel/rfq_request/proses_lampiran')?>" method="post" enctype="multipart/form-data" autocomplete="off">
          
          <div class="form-group">
            <label>Tambah lampiran</label>
            <input type="file" class="form-control" name="file">
            <input type="hidden" name="rfq_id" value="<?= $id?>" class="form-control">
          </div>
          <!-- <input type="hidden" name="submit" value="update"> -->

          <div class="text-right">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

