<!-- Zero configuration table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= ucwords($title_module) ?></h4>
                    <div class="pull-right">
                        <a href="<?= url('portfolio/add') ?>" class="btn btn-success btn-flat"><i
                                class="fa fa-file btn-icon-prepend"></i> Add</a>
                        <button type="button" id="filter-show" class="btn btn-primary btn-flat"><i
                                class="mdi mdi-backup-restore btn-icon-prepend"></i> Filter</button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <form autocomplete="off" class="content-filter">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" id="client_name" class="form-control form-control-sm"
                                        placeholder="Client name" />
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" id="category" class="form-control form-control-sm"
                                        placeholder="Category" />
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="date" id="project_date" class="form-control form-control-sm"
                                        placeholder="Project date" />
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" id="pic" class="form-control form-control-sm"
                                        placeholder="Pic" />
                                </div>

                            </div>
                            <div class="pull-right">
                                <button type='button' class='btn btn-default btn-sm'
                                    id="filter-cancel"><?= cclang('cancel') ?></button>
                                <button type="button" class="btn btn-primary btn-sm" id="filter">Filter</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display" name="table" id="table"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name portfolio</th>
                                        <th>Desc portfolio</th>
                                        <th>Image</th>
                                        <th>Client name</th>
                                        <th>Category</th>
                                        <th>Project date</th>
                                        <th>Pic</th>
                                        <th>Jabatan</th>
                                        <th>Rate quality</th>
                                        <th>Rate awareness</th>
                                        <th>Rate service</th>
                                        <th>Rate professionalism</th>
                                        <th>Rate facility</th>
                                        <th>Rate project focus</th>
                                        <th>Rate safety aspect</th>
                                        <th>Rate competitiveness</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<script type="text/javascript">
    $(document).ready(function() {

        var columnDefs = [];

        for (var target = 8; target <= 15; target++) {
            columnDefs.push({
                "targets": target,
                "orderable": false,
                "render": function(data, type, row, meta) {
                    var columnIdx = meta.col;
                    var stars = '';
                    if (row[columnIdx] !== undefined && !isNaN(row[columnIdx])) {
                        for (var i = 0; i < row[columnIdx]; i++) {
                            stars += '<i class="ion-ios7-star"></i>';
                        }
                    } else {
                        console.log(`Invalid data for column ${columnIdx}:`, row[columnIdx]);
                    }
                    return stars;
                }
            });
        }

        columnDefs.push({
            "targets": 16,
            "className": "text-center",
            "orderable": false,
            //! console.log
            // "render": function(data, type, row, meta) {
            //     console.log('Row data for column 16:', row);
            //     console.log('data data for column 16:', data);
            //     console.log('type data for column 16:', type);
            //     console.log('meta data for column 16:', meta);
            //     return data;
            // }
        });

        var table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ordering": true,
            "searching": false,
            "info": true,
            "bLengthChange": false,
            "oLanguage": {
                "sProcessing": '<i class="fa fa-spinner fa-spin fa-fw"></i> Loading...'
            },
            "ajax": {
                "url": "<?= url('portfolio/json') ?>",
                "type": "POST",
                "data": function(data) {
                    data.client_name = $("#client_name").val();
                    data.category = $("#category").val();
                    data.project_date = $("#project_date").val();
                    data.pic = $("#pic").val();
                },
                "dataSrc": function(json) {
                    console.log('Server response:', json);
                    return json.data;
                }
            },
            "columnDefs": columnDefs
        });



        $("#reload").click(function() {
            $("#client_name").val("");
            $("#category").val("");
            $("#project_date").val("");
            $("#pic").val("");
            table.ajax.reload();
        });

        $(document).on("click", "#filter-show", function(e) {
            e.preventDefault();
            $(".content-filter").slideDown();
        });

        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            $("#table").DataTable().ajax.reload();
        })

        $(document).on("click", "#filter-cancel", function(e) {
            e.preventDefault();
            $(".content-filter").slideUp();
        });

        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            $('.modal-dialog').addClass('modal-sm');
            $("#modalTitle").text('<?= cclang('confirm') ?>');
            $('#modalContent').html(`<p class="mb-4"><?= cclang('delete_description') ?></p>
                              <div class="pull-right">
  														<button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><?= cclang('cancel') ?></button>
  	                          <button type='button' class='btn btn-primary btn-sm' id='ya-hapus' data-id=` + $(this)
                .attr('alt') + `  data-url=` + $(this).attr('href') + `><?= cclang('delete_action') ?></button>
  														</div>`);
            $("#modalGue").modal('show');
        });


        $(document).on('click', '#ya-hapus', function(e) {
            $(this).prop('disabled', true)
                .text('Processing...');
            $.ajax({
                url: $(this).data('url'),
                type: 'POST',
                cache: false,
                dataType: 'json',
                success: function(json) {
                    $('#modalGue').modal('hide');
                    swal(json.msg, {
                        icon: json.type_msg
                    });
                    $('#table').DataTable().ajax.reload();
                }
            });
        });


    });
</script>
