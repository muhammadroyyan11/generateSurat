<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
          <form action="<?=$action?>" id="form" autocomplete="off">

          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control form-control-sm" placeholder="Name" name="name" id="name">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control form-control-sm" placeholder="Description" name="description" id="description" rows="3" cols="80"></textarea>
          </div>

          <div class="form-group">
            <label>Img</label>
            <input type="file" name="img" class="file-upload-default" data-id="img" style="display: none;"/>
            <div class="input-group col-xs-12">
              <input type="hidden" class="file-dir" name="file-dir-img" data-id="img"/>
              <input type="text" class="form-control form-control-sm file-upload-info file-name" data-id="img" placeholder="Img" readonly name="img" />
            <span class="input-group-append">
              <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="img" style="display:<?=$img!=''?'block':'none'?>;"><i class="ti-trash"></i></button>
              <button class="file-upload-browse btn btn-primary btn-sm" data-id="img" type="button">Select File</button>
            </span>
            </div>
            <div id="img"></div>
          </div>

          <div class="form-group">
            <label>Img icon</label>
            <input type="file" name="img" class="file-upload-default" data-id="img_icon" style="display: none;"/>
            <div class="input-group col-xs-12">
              <input type="hidden" class="file-dir" name="file-dir-img_icon" data-id="img_icon"/>
              <input type="text" class="form-control form-control-sm file-upload-info file-name" data-id="img_icon" placeholder="Img icon" readonly name="img_icon" />
            <span class="input-group-append">
              <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="img_icon" style="display:<?=$img_icon!=''?'block':'none'?>;"><i class="ti-trash"></i></button>
              <button class="file-upload-browse btn btn-primary btn-sm" data-id="img_icon" type="button">Select File</button>
            </span>
            </div>
            <div id="img_icon"></div>
          </div>

          <div class="form-group">
            <label>Price list</label>
            <input type="file" name="img" class="file-upload-default" data-id="img_pricelist" style="display: none;"/>
            <div class="input-group col-xs-12">
              <input type="hidden" class="file-dir" name="file-dir-img_pricelist" data-id="img_pricelist"/>
              <input type="text" class="form-control form-control-sm file-upload-info file-name" data-id="img_pricelist" placeholder="Img icon" readonly name="img_pricelist" />
            <span class="input-group-append">
              <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="img_pricelist" style="display:<?=$img_pricelist!=''?'block':'none'?>;"><i class="ti-trash"></i></button>
              <button class="file-upload-browse btn btn-primary btn-sm" data-id="img_pricelist" type="button">Select File</button>
            </span>
            </div>
            <div id="img_pricelist"></div>
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
