<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            <?= ucwords($title_module) ?>
          </h4>
          <div class="pull-right">
            <a href="<?= url("company/add") ?>" class="btn btn-success btn-flat"><i
                class="fa fa-file btn-icon-prepend"></i> Add</a>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <form autocomplete="off" class="content-filter">
            </form>
            <div class="table-responsive">
              <table class="table display" name="table" id="table"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>Name company</th>
                    <th>Desc company</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Img logo</th>
                    <th>Img desc</th>
                    <th>Img header</th>
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
  $(document).ready(function () {
    var table;
    //datatables
    table = $('#table').DataTable({

      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      "ordering": true,
      "searching": false,
      "info": true,
      "bLengthChange": false,
      oLanguage: {
        sProcessing: '<i class="fa fa-spinner fa-spin fa-fw"></i> Loading...'
      },

      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": "<?= url("company/json") ?>",
        "type": "POST",
        "data": function (data) {
          data.name_company = $("#name_company").val();
          data.desc_company = $("#desc_company").val();
          data.visi = $("#visi").val();
          data.misi = $("#misi").val();
          data.img_logo = $("#img_logo").val();
          data.img_desc = $("#img_desc").val();
          data.img_header = $("#img_header").val();
        }
      },

      //Set column definition initialisation properties.
      "columnDefs": [

        {
          "targets": 0,
          "orderable": false
        },

        {
          "targets": 1,
          "orderable": false
        },

        {
          "targets": 2,
          "orderable": false
        },

        {
          "targets": 3,
          "orderable": false
        },

        {
          "targets": 4,
          "orderable": false
        },

        {
          "targets": 5,
          "orderable": false
        },

        {
          "targets": 6,
          "orderable": false
        },

        {
          "className": "text-center",
          "orderable": false,
          "targets": 7
        },
      ],
    });

    $("#reload").click(function () {
      $("#name_company").val("");
      $("#desc_company").val("");
      $("#visi").val("");
      $("#misi").val("");
      $("#img_logo").val("");
      $("#img_desc").val("");
      $("#img_header").val("");
      table.ajax.reload();
    });

    $(document).on("click", "#filter-show", function (e) {
      e.preventDefault();
      $(".content-filter").slideDown();
    });

    $(document).on("click", "#filter", function (e) {
      e.preventDefault();
      $("#table").DataTable().ajax.reload();
    })

    $(document).on("click", "#filter-cancel", function (e) {
      e.preventDefault();
      $(".content-filter").slideUp();
    });

    $(document).on("click", "#delete", function (e) {
      e.preventDefault();
      $('.modal-dialog').addClass('modal-sm');
      $("#modalTitle").text('<?= cclang("confirm") ?>');
      $('#modalContent').html(`<p class="mb-4"><?= cclang("delete_description") ?></p>
                              <div class="pull-right">
                              <button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><?= cclang("cancel") ?></button>
                              <button type='button' class='btn btn-primary btn-sm' id='ya-hapus' data-id=` + $(this).attr('alt') + `  data-url=` + $(this).attr('href') + `><?= cclang("delete_action") ?></button>
                              </div>`);
      $("#modalGue").modal('show');
    });


    $(document).on('click', '#ya-hapus', function (e) {
      $(this).prop('disabled', true)
        .text('Processing...');
      $.ajax({
        url: $(this).data('url'),
        type: 'POST',
        cache: false,
        dataType: 'json',
        success: function (json) {
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