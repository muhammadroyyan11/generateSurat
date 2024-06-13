<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
        <div class="card m-b-30">
            <div class="card-header bg-primary text-white">
                <?= ucwords($title_module) ?>
            </div>
            <div class="card-body">
                <form action="<?= $action ?>" id="form" autocomplete="off">

                    <div class="form-group">
                        <label>Name portfolio</label>
                        <input type="text" class="form-control" placeholder="Name portfolio"
                            name="name_portfolio" id="name_portfolio">
                    </div>

                    <div class="form-group">
                        <label>Desc portfolio</label>
                        <textarea class="form-control" placeholder="Desc portfolio"
                            name="desc_portfolio" id="desc_portfolio" rows="3" cols="80"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="img" class="file-upload-default" data-id="image"
                            style="display: none;" />
                        <div class="input-group col-xs-12">
                            <input type="hidden" class="file-dir" name="file-dir-image" data-id="image" />
                            <input type="text" class="form-control file-upload-info file-name"
                                data-id="image" placeholder="Image" readonly name="image" />
                            <span class="input-group-append">
                                <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="image"
                                    style="display:<?= $image != '' ? 'block' : 'none' ?>;"><i
                                        class="ti-trash"></i></button>
                                <button class="file-upload-browse btn btn-primary btn-sm" data-id="image"
                                    type="button">Select File</button>
                            </span>
                        </div>
                        <div id="image"></div>
                    </div>

                    <div class="form-group">
                        <label>Client name</label>
                        <input type="text" class="form-control" placeholder="Client name"
                            name="client_name" id="client_name">
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" placeholder="Category" name="category"
                            id="category">
                    </div>

                    <div class="form-group">
                        <label>Project date</label>
                        <input type="date" class="form-control" placeholder="Project date"
                            name="project_date" id="project_date">
                    </div>

                    <div class="form-group">
                        <label>PIC</label>
                        <input type="text" class="form-control" placeholder="PIC" name="pic" id="pic">
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" placeholder="Jabatan" name="jabatan"
                            id="jabatan">
                    </div>

                    <p style=""><b>Enter numbers 1 - 5 for Rating</b></p>
                    <div class="container row justify-content-between">
                        <div class="form-group">
                            <label>Rate quality</label>
                            <input type="number" class="form-control"
                                placeholder="Enter numbers 1 - 5 for rating" name="rate_quality" id="rate_quality">
                        </div>

                        <div class="form-group">
                            <label>Rate awareness</label>
                            <input type="number" class="form-control"
                                placeholder="Enter numbers 1 - 5 for rating" name="rate_awareness" id="rate_awareness">
                        </div>

                        <div class="form-group">
                            <label>Rate service</label>
                            <input type="number" class="form-control"
                                placeholder="Enter numbers 1 - 5 for rating" name="rate_service" id="rate_service">
                        </div>

                        <div class="form-group">
                            <label>Rate professionalism</label>
                            <input type="number" class="form-control"
                                placeholder="Enter numbers 1 - 5 for rating" name="rate_professionalism"
                                id="rate_professionalism">
                        </div>

                    </div>
                    <div class="container row justify-content-between">
                        <div class="form-group">
                            <label>Rate facility</label>
                            <input type="number" class="form-control"
                                placeholder="Enter numbers 1 - 5 for rating" name="rate_facility" id="rate_facility">
                        </div>

                        <div class="form-group">
                            <label>Rate project focus</label>
                            <input type="number" class="form-control"
                                placeholder="Enter numbers 1 - 5 for rating" name="rate_project_focus"
                                id="rate_project_focus">
                        </div>

                        <div class="form-group">
                            <label>Rate safety aspect</label>
                            <input type="number" class="form-control"
                                placeholder="Enter numbers 1 - 5 for rating" name="rate_safety_aspect"
                                id="rate_safety_aspect">
                        </div>

                        <div class="form-group">
                            <label>Rate competitiveness</label>
                            <input type="number" class="form-control"
                                placeholder="Enter numbers 1 - 5 for rating" name="rate_competitiveness"
                                id="rate_competitiveness">
                        </div>
                    </div>

                    <input type="hidden" name="submit" value="add">

                    <div class="text-right">
                        <a href="<?= url($this->uri->segment(2)) ?>"
                            class="btn btn-sm btn-danger"><?= cclang('cancel') ?></a>
                        <button type="submit" id="submit" class="btn btn-sm btn-primary"><?= cclang('save') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


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
                    .html('<?= cclang('save') ?>');
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