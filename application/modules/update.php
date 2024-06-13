<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?= ucwords($title_module) ?>
      </div>
      <div class="card-body">
        <form action="<?= $action ?>" id="form" autocomplete="off">

          <div class="form-group">
            <label>No penawaran</label>
            <input type="text" class="form-control form-control-sm" placeholder="No penawaran" name="no_penawaran" id="no_penawaran" value="<?= $no_penawaran ?>">
          </div>

          <div class="form-group">
            <label>Pelanggan</label>
            <!-- <input type="text" class="form-control form-control-sm" placeholder="Pelanggan" name="no_penawaran" id="no_penawaran" value="<?= $no_penawaran ?>"> -->
            <select name="pelanggan" id="" class="form-control">
              <option value="">-- Silahkan Pilih --</option>
              <option value="WIKA" <?= $pelanggan == 'WIKA' ? 'selected' : '' ?>>WIKA</option>
              <option value="NON WIKA" <?= $pelanggan == 'NON WIKA' ? 'selected' : '' ?>>NON WIKA</option>
            </select>
          </div>

          <div class="form-group">
            <label>Nama perusahaan</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nama perusahaan" name="nama_perusahaan" id="nama_perusahaan" value="<?= $nama_perusahaan ?>">
          </div>

          <div class="form-group">
            <label>Nama proyek</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nama proyek" name="nama_proyek" id="nama_proyek" value="<?= $nama_proyek ?>">
          </div>

          <div class="form-group">
            <label>Nama owner</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nama owner" name="nama_owner" id="nama_owner" value="<?= $nama_owner ?>">
          </div>

          <div class="form-group">
            <label>Kebutuhan Produk</label>
            <textarea class="form-control" id="summernote" rows="3" data-original-label="about" name="kebutuhan"><?= $kebutuhan?></textarea>
          </div>

          <input type="hidden" name="submit" value="update">

          <div class="text-right">
            <a href="<?= url($this->uri->segment(2)) ?>" class="btn btn-sm btn-danger"><?= cclang("cancel") ?></a>
            <button type="submit" id="submit" class="btn btn-sm btn-primary"><?= cclang("update") ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#summernote').summernote({
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializin
  });
</script>


<script type="text/javascript">
  $("#form").submit(function(e) {
    e.preventDefault();
    var me = $(this);
    $("#submit").prop('disabled', true).html('Loading...');
    $(".form-group").find('.text-danger').remove();
    $.ajax({
      url: me.attr('action'),
      type: 'post',
      data: new FormData(this),
      contentType: false,
      cache: false,
      dataType: 'JSON',
      processData: false,
      success: function(json) {
        if (json.success == true) {
          location.href = json.redirect;
          return;
        } else {
          $("#submit").prop('disabled', false)
            .html('<?= cclang("save") ?>');
          $.each(json.alert, function(key, value) {
            var element = $('#' + key);
            $(element)
              .closest('.form-group')
              .find('.text-danger').remove();
            $(element).after(value);
          });
        }
      }
    });
  });
</script>