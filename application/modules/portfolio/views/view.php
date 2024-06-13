<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
        <tr>
          <td>Name portfolio</td>
          <td><?=$name_portfolio?></td>
        </tr>
        <tr>
          <td>Desc portfolio</td>
          <td><?=$desc_portfolio?></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><?=is_image($image)?></td>
        </tr>
        <tr>
          <td>Client name</td>
          <td><?=$client_name?></td>
        </tr>
        <tr>
          <td>Category</td>
          <td><?=$category?></td>
        </tr>
      <tr>
        <td>Project date</td>
        <td><?=$project_date != "" ? date('d-m-Y',strtotime($project_date)):""?></td>
      </tr>
        <tr>
          <td>Pic</td>
          <td><?=$pic?></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td><?=$jabatan?></td>
        </tr>
        <tr>
          <td>Rate quality</td>
          <td><?=$rate_quality?></td>
        </tr>
        <tr>
          <td>Rate awareness</td>
          <td><?=$rate_awareness?></td>
        </tr>
        <tr>
          <td>Rate service</td>
          <td><?=$rate_service?></td>
        </tr>
        <tr>
          <td>Rate professionalism</td>
          <td><?=$rate_professionalism?></td>
        </tr>
        <tr>
          <td>Rate facility</td>
          <td><?=$rate_facility?></td>
        </tr>
        <tr>
          <td>Rate project focus</td>
          <td><?=$rate_project_focus?></td>
        </tr>
        <tr>
          <td>Rate safety aspect</td>
          <td><?=$rate_safety_aspect?></td>
        </tr>
        <tr>
          <td>Rate competitiveness</td>
          <td><?=$rate_competitiveness?></td>
        </tr>
        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3"><?=cclang("back")?></a>
      </div>
    </div>
  </div>
</div>
