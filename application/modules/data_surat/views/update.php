<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
          <form action="<?=$action?>" id="form" autocomplete="off">
          
          <div class="form-group">
            <label>Nomor surat</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nomor surat" name="nomor_surat" id="nomor_surat" value="<?=$nomor_surat?>">
          </div>
        
          <div class="form-group">
            <label>Nama lengkap</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nama lengkap" name="nama_lengkap" id="nama_lengkap" value="<?=$nama_lengkap?>">
          </div>
        
          <div class="form-group">
            <label>Tempat lahir</label>
            <input type="text" class="form-control form-control-sm" placeholder="Tempat lahir" name="tempat_lahir" id="tempat_lahir" value="<?=$tempat_lahir?>">
          </div>
        
          <div class="form-group">
            <label>Tgl lahir</label>
            <input type="date" class="form-control form-control-sm" placeholder="Tgl lahir" name="tgl_lahir" id="tgl_lahir" value="<?=$tgl_lahir?>">
          </div>
        
          <div class="form-group">
            <label>Nim</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nim" name="nim" id="nim" value="<?=$nim?>">
          </div>
        
          <div class="form-group">
            <label>Nik</label>
            <input type="text" class="form-control form-control-sm" placeholder="Nik" name="nik" id="nik" value="<?=$nik?>">
          </div>
        
          <div class="form-group">
            <label>Fakultas</label>
            <input type="text" class="form-control form-control-sm" placeholder="Fakultas" name="fakultas" id="fakultas" value="<?=$fakultas?>">
          </div>
        
          <div class="form-group">
            <label>Program studi</label>
            <input type="text" class="form-control form-control-sm" placeholder="Program studi" name="program_studi" id="program_studi" value="<?=$program_studi?>">
          </div>
        
          <div class="form-group">
            <label>Tahun akademik</label>
            <input type="text" class="form-control form-control-sm" placeholder="Tahun akademik" name="tahun_akademik" id="tahun_akademik" value="<?=$tahun_akademik?>">
          </div>
        
          <div class="form-group">
            <label>Semester</label>
            <input type="number" class="form-control form-control-sm" placeholder="Semester" name="semester" id="semester" value="<?=$semester?>">
          </div>
        
        
          <input type="hidden" name="submit" value="update">

          <div class="text-right">
            <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger"><?=cclang("cancel")?></a>
            <button type="submit" id="submit"  class="btn btn-sm btn-primary"><?=cclang("update")?></button>
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
