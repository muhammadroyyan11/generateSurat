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
            <input type="text" class="form-control form-control-sm" placeholder="Name" name="name" id="name" value="<?=$name?>">
          </div>
        
          <div class="form-group">
            <label>Street</label>
            <textarea class="form-control form-control-sm" placeholder="Street" name="street" id="street" rows="3" cols="80"><?=$street?></textarea>
          </div>
        
          <div class="form-group">
            <label>Maps</label>
            <textarea class="form-control form-control-sm" placeholder="Maps" name="maps" id="maps" rows="3" cols="80"><?=$maps?></textarea>
          </div>
        
          <div class="form-group">
            <label>No hp</label>
            <input type="text" class="form-control form-control-sm" placeholder="No hp" name="no_hp" id="no_hp" value="<?=$no_hp?>">
          </div>
        
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control form-control-sm" placeholder="Email" name="email" id="email" value="<?=$email?>">
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
