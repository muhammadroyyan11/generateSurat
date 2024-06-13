<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
          <form action="<?=$action?>" id="form" autocomplete="off">

          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nama" name="nama" id="nama">
          </div>

          <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- " name="jabatan" id="jabatan">
              <option value=""></option>
              <option value="Manajer Unit">Manajer Unit</option>
              <option value="Deputy Manajer">Deputy Manajer</option>
              <option value="Keuangan dan SDM">Keuangan dan SDM</option>
              <option value="Komersial">Komersial</option>
              <option value="Teknik dan Mutu">Teknik dan Mutu</option>
              <option value="Peralatan">Peralatan</option>
              <option value="Produksi">Produksi</option>
              <option value="Pelaksana">Pelaksana</option>
              <option value="Sales Engineer">Sales Engineer</option>
            </select>
          </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="img" class="file-upload-default" style="display: none;" data-id="image"/>
            <div class="input-group col-xs-12">
              <input type="hidden" class="file-dir" name="file-dir-image" data-id="image"/>
              <input type="text" class="form-control form-control-sm file-upload-info file-name" data-id="image" placeholder="Image" readonly name="image" />
            <span class="input-group-append">
              <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="image" style="display:<?=$image!=''?'block':'none'?>;"><i class="ti-trash"></i></button>
              <button class="file-upload-browse btn btn-primary btn-sm" data-id="image" type="button">Select File</button>
            </span>
            </div>
            <div id="image"></div>
          </div>

          <input type="hidden" name="submit" value="add">

          <div class="text-right">
            <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger"><?=cclang("cancel")?></a>
            <button type="submit" id="submit"  class="btn btn-sm btn-primary"><?=cclang("save")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$("#form").submit(function(e){
e.preventDefault();
var me = $(this);
$("#submit").prop('disabled',true).html('Loading...');
$(".form-group").find('.text-danger').remove();
$.ajax({
      url             : me.attr('action'),
      type            : 'post',
      data            :  new FormData(this),
      contentType     : false,
      cache           : false,
      dataType        : 'JSON',
      processData     :false,
      success:function(json){
        if (json.success==true) {
          location.href = json.redirect;
          return;
        }else {
          $("#submit").prop('disabled',false)
                      .html('<?=cclang("save")?>');
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
