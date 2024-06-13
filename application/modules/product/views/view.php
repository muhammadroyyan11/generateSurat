<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
        <div class="card-header bg-primary text-white">
            <?= ucwords($title_module) ?>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>Name</td>
                        <td><?= $name ?></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><?= $description ?></td>
                    </tr>
                    <tr>
                        <td>Img</td>
                        <td><?= imgView($img, '', 'width:auto;height:500px') ?></td>
                    </tr>
                    <tr>
                        <td>Img icon</td>
                        <td><?= imgView($img_icon, '', 'width:auto;height:500px') ?></td>
                    </tr>
                    <tr>
                        <td>Img price list</td>
                        <td><?= imgView($img_pricelist, '', 'width:auto;height:500px') ?></td>
                    </tr>
                    <?php if (!empty($img_pricelist)) : ?>
                    <tr>
                        <td>Download Img price list</td>
                        <td>
                            <?php
                            $name_file = "$name-price-list";
                            $file_path = '_temp/uploads/img/' . $img_pricelist;
                            $fileExtension = pathinfo($img_pricelist, PATHINFO_EXTENSION);
                            ?>
                            <?= anchor(base_url($file_path), 'Download', 'class="btn btn-sm btn-success mt-3" download="' . $name_file . '.' . $fileExtension . '"') ?>
                        </td>
                    </tr>
                    <?php else : ?>
                    <?php endif; ?>
                </table>

                <a href="<?= url($this->uri->segment(2)) ?>" class="btn btn-sm btn-danger mt-3"><?= cclang('back') ?></a>
            </div>
        </div>
    </div>
</div>
