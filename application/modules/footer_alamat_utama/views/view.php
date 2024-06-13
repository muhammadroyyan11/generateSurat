<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
        <tr>
          <td>Name</td>
          <td><?=$name?></td>
        </tr>
        <tr>
          <td>Street</td>
          <td><?=$street?></td>
        </tr>
        <tr>
          <td>Maps</td>
          <td><?=$maps?></td>
        </tr>
        <tr>
          <td>No hp</td>
          <td><?=$no_hp?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?=$email?></td>
        </tr>
        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3"><?=cclang("back")?></a>
      </div>
    </div>
  </div>
</div>
