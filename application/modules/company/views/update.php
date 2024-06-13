<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
          <form action="<?=$action?>" id="form" autocomplete="off">
          
          <div class="form-group">
            <label>Name company</label>
            <input type="text" class="form-control form-control-sm" placeholder="Name company" name="name_company" id="name_company" value="<?=$name_company?>">
          </div>
        
          <div class="form-group">
            <label>Desc company</label>
            <textarea class="form-control form-control-sm" placeholder="Desc company" name="desc_company" id="desc_company" rows="3" cols="80"><?=$desc_company?></textarea>
          </div>
        
          <div class="form-group">
            <label>Visi</label>
            <textarea class="form-control form-control-sm" placeholder="Visi" name="visi" id="visi" rows="3" cols="80"><?=$visi?></textarea>
          </div>
        
          <div class="form-group">
            <label>Misi</label>
            <textarea class="form-control form-control-sm" placeholder="Misi" name="misi" id="misi" rows="3" cols="80"><?=$misi?></textarea>
          </div>
        
          <div class="form-group">
            <label>Img logo</label>
            <input type="file" name="img" class="file-upload-default" data-id="img_logo" style="display: none;"/>
            <div class="input-group col-xs-12">
              <input type="hidden" class="file-dir" name="file-dir-img_logo" data-id="img_logo"/>
              <input type="text" class="form-control form-control-sm file-upload-info file-name" data-id="img_logo" placeholder="Img logo" readonly name="img_logo" value="<?=$img_logo?>" />
            <span class="input-group-append">
              <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="img_logo" style="display:<?=$img_logo!=''?'block':'none'?>;"><i class="ti-trash"></i></button>
              <button class="file-upload-browse btn btn-primary btn-sm" data-id="img_logo" type="button">Select File</button>
            </span>
            </div>
            <div id="img_logo"></div>
          </div>
        
          <div class="form-group">
            <label>Img desc</label>
            <input type="file" name="img" class="file-upload-default" data-id="img_desc" style="display: none;"/>
            <div class="input-group col-xs-12">
              <input type="hidden" class="file-dir" name="file-dir-img_desc" data-id="img_desc"/>
              <input type="text" class="form-control form-control-sm file-upload-info file-name" data-id="img_desc" placeholder="Img desc" readonly name="img_desc" value="<?=$img_desc?>" />
            <span class="input-group-append">
              <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="img_desc" style="display:<?=$img_desc!=''?'block':'none'?>;"><i class="ti-trash"></i></button>
              <button class="file-upload-browse btn btn-primary btn-sm" data-id="img_desc" type="button">Select File</button>
            </span>
            </div>
            <div id="img_desc"></div>
          </div>
        
          <div class="form-group">
            <label>Img header</label>
            <input type="file" name="img" class="file-upload-default" data-id="img_header" style="display: none;"/>
            <div class="input-group col-xs-12">
              <input type="hidden" class="file-dir" name="file-dir-img_header" data-id="img_header"/>
              <input type="text" class="form-control form-control-sm file-upload-info file-name" data-id="img_header" placeholder="Img header" readonly name="img_header" value="<?=$img_header?>" />
            <span class="input-group-append">
              <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="img_header" style="display:<?=$img_header!=''?'block':'none'?>;"><i class="ti-trash"></i></button>
              <button class="file-upload-browse btn btn-primary btn-sm" data-id="img_header" type="button">Select File</button>
            </span>
            </div>
            <div id="img_header"></div>
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
