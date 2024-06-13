<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?=ucwords($title_module)?></h4>
          <div class="pull-right">
                                      <button type="button" id="filter-show" class="btn btn-primary btn-flat"><i class="mdi mdi-backup-restore btn-icon-prepend"></i> Filter</button>
                      </div>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <form autocomplete="off" class="content-filter">
              <div class="row">
                                  <div class="form-group col-md-6">
                                          <input type="text" id="nomor_surat" class="form-control form-control-sm" placeholder="Nomor surat" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="text" id="nama_lengkap" class="form-control form-control-sm" placeholder="Nama lengkap" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="text" id="tempat_lahir" class="form-control form-control-sm" placeholder="Tempat lahir" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="date" id="tgl_lahir" class="form-control form-control-sm" placeholder="Tgl lahir" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="text" id="nim" class="form-control form-control-sm" placeholder="Nim" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="text" id="nik" class="form-control form-control-sm" placeholder="Nik" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="text" id="fakultas" class="form-control form-control-sm" placeholder="Fakultas" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="text" id="program_studi" class="form-control form-control-sm" placeholder="Program studi" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="text" id="tahun_akademik" class="form-control form-control-sm" placeholder="Tahun akademik" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="text" id="semester" class="form-control form-control-sm" placeholder="Semester" />
                                      </div>

                                  <div class="form-group col-md-6">
                                          <input type="datetime-local" id="tanggal_pembuatan" class="form-control form-control-sm" placeholder="Tanggal pembuatan" />
                                      </div>

                              </div>
              <div class="pull-right">
                <button type='button' class='btn btn-default btn-sm' id="filter-cancel"><?=cclang("cancel")?></button>
                <button type="button" class="btn btn-primary btn-sm" id="filter">Filter</button>
              </div>
            </form>
            <div class="table-responsive">
              <table class="table display" name="table" id="table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
							<th>Nomor surat</th>
							<th>Nama lengkap</th>
							<th>Tempat lahir</th>
							<th>Tgl lahir</th>
							<th>Nim</th>
							<th>Nik</th>
							<th>Fakultas</th>
							<th>Program studi</th>
							<th>Tahun akademik</th>
							<th>Semester</th>
							<th>Tanggal pembuatan</th>
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
        "url": "<?= url("data_surat/json")?>",
        "type": "POST",
         "data": function(data) {
                                          data.nomor_surat = $("#nomor_surat").val();
                                                        data.nama_lengkap = $("#nama_lengkap").val();
                                                        data.tempat_lahir = $("#tempat_lahir").val();
                                                        data.tgl_lahir = $("#tgl_lahir").val();
                                                        data.nim = $("#nim").val();
                                                        data.nik = $("#nik").val();
                                                        data.fakultas = $("#fakultas").val();
                                                        data.program_studi = $("#program_studi").val();
                                                        data.tahun_akademik = $("#tahun_akademik").val();
                                                        data.semester = $("#semester").val();
                                                        data.tanggal_pembuatan = $("#tanggal_pembuatan").val();
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
            "targets": 7,
            "orderable": false
          },

					{
            "targets": 8,
            "orderable": false
          },

					{
            "targets": 9,
            "orderable": false
          },

					{
            "targets": 10,
            "orderable": false
          },

        {
          "className": "text-center",
          "orderable": false,
          "targets": 11
        },
      ],
    });

    $("#reload").click(function() {
                        $("#nomor_surat").val("");
                  $("#nama_lengkap").val("");
                  $("#tempat_lahir").val("");
                  $("#tgl_lahir").val("");
                  $("#nim").val("");
                  $("#nik").val("");
                  $("#fakultas").val("");
                  $("#program_studi").val("");
                  $("#tahun_akademik").val("");
                  $("#semester").val("");
                  $("#tanggal_pembuatan").val("");
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
      $("#modalTitle").text('<?=cclang("confirm")?>');
      $('#modalContent').html(`<p class="mb-4"><?=cclang("delete_description")?></p>
                              <div class="pull-right">
  														<button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><?=cclang("cancel")?></button>
  	                          <button type='button' class='btn btn-primary btn-sm' id='ya-hapus' data-id=` + $(this).attr('alt') + `  data-url=` + $(this).attr('href') + `><?=cclang("delete_action")?></button>
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