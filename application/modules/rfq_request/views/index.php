<!-- Zero configuration table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= ucwords($title_module) ?></h4>
                    <div class="pull-right">
                        <button class="btn btn-success btn-flat" type="button" data-toggle="modal"
                            data-target="#exampleModal"><i class="fa fa-file btn-icon-prepend"></i> Export</button>
                        <a href="<?= url('rfq_request/add') ?>" class="btn btn-success btn-flat"><i
                                class="fa fa-file btn-icon-prepend"></i> Add</a>
                        <button type="button" id="filter-show" class="btn btn-primary btn-flat"><i
                                class="mdi mdi-backup-restore btn-icon-prepend"></i> Filter</button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <form autocomplete="off" class="content-filter">
                            <div class="row">
                                <div class="form-group col-md-4 col-lg-4">
                                    <input type="text" id="id" class="form-control form-control-sm"
                                        style="height: 38px;" placeholder="No Id" />
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <input type="text" id="no_penawaran" class="form-control form-control-sm"
                                        style="height: 38px;" placeholder="No penawaran" />
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <input type="text" id="nama_perusahaan" class="form-control form-control-sm"
                                        style="height: 38px;" placeholder="Nama perusahaan" />
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <input type="text" id="nama_proyek" class="form-control form-control-sm"
                                        style="height: 38px;" placeholder="Nama proyek" />
                                </div>

                                <div class="row col-md-4 col-lg-4" style="margin: initial;">
                                    <div class="form-group col" style="padding: 0px;">
                                        <input type="text" id="npp" class="form-control form-control-sm"
                                            style="height: 38px;" placeholder="NPP" />
                                    </div>

                                    <div class="form-group col-1" style="padding: 0px;">
                                    </div>

                                    <div class="form-group col" style="padding: 0px;">
                                        <input type="text" id="sbu" class="form-control form-control-sm"
                                            style="height: 38px;" placeholder="SBU" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <input placeholder="deadline" class="form-control form-control-sm" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" style="height: 38px;"
                                        id="deadline" />
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <input type="text" id="untuk_perhatian" class="form-control form-control-sm"
                                        style="height: 38px;" placeholder="Untuk perhatian" />
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <select class="form-control form-control-sm select2" style="width: 100%;"
                                        data-placeholder=" -- Select Suplai batching -- " name="suplai_batching"
                                        id="suplai_batching">
                                        <option value="">All Suplai batching</option>
                                        <option value="Batching Plant Karawang">Batching Plant Karawang</option>
                                        <option value="Batching Plant Walini">Batching Plant Walini</option>
                                        <option value="Batching Plant Cakung">Batching Plant Cakung</option>
                                        <option value="Batching Plant Cilegon">Batching Plant Cilegon</option>
                                        <option value="Batching Plant Ancol">Batching Plant Ancol</option>
                                        <option value="Batching Plant On Site">Batching Plant On Site</option>
                                    </select>
                                </div>

                                <div class=" col-md-4 col-lg-4">
                                    <select class="form-control form-control-sm select2" style="width: 100%;"
                                        data-placeholder=" -- Select Sektor -- " name="sektor" id="sektor">
                                        <option value="">All Sektor</option>
                                        <option value="AGROBISNIS">AGROBISNIS</option>
                                        <option value="AIRPORT">AIRPORT</option>
                                        <option value="ELECTRICITY">ELECTRICITY</option>
                                        <option value="ENERGY">ENERGY</option>
                                        <option value="INDUSTRI">INDUSTRI</option>
                                        <option value="INFRASTRUKTUR">INFRASTRUKTUR</option>
                                        <option value="INFRASTRUKTUR ENERGI">INFRASTRUKTUR ENERGI</option>
                                        <option value="INFRASTRUKTUR TAMBANG">INFRASTRUKTUR TAMBANG</option>
                                        <option value="JALAN DAN JEMBATAN">JALAN DAN JEMBATAN</option>
                                        <option value="MARINE">MARINE</option>
                                        <option value="PEKERJAAN UMUM">PEKERJAAN UMUM</option>
                                        <option value="PEMERINTAHAN">PEMERINTAHAN</option>
                                        <option value="PERHUBUNGAN">PERHUBUNGAN</option>
                                        <option value="PERTAMBANGAN">PERTAMBANGAN</option>
                                        <option value="POWER PLANT">POWER PLANT</option>
                                        <option value="PROPERTI">PROPERTI</option>
                                        <option value="PROPERTI & COMMERCIAL">PROPERTI & COMMERCIAL</option>
                                        <option value="RAILWAY">RAILWAY</option>
                                        <option value="SUMBER DAYA AIR">SUMBER DAYA AIR</option>
                                        <option value="SWASTA">SWASTA</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <select class="form-control form-control-sm select2" style="width: 100%;"
                                        data-placeholder=" -- Select Status Penawaran -- " name="status_penawaran"
                                        id="status_penawaran">
                                        <option value="">All Status Penawaran</option>
                                        <option value="Diperoleh">Diperoleh</option>
                                        <option value="On Going">On Going</option>
                                        <option value="Gagal Diperoleh">Gagal Diperoleh</option>
                                        <option value="Penyusunan HPP">Penyusunan HPP</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <select class="form-control form-control-sm select2" style="width: 100%;"
                                        data-placeholder=" -- Select Jenis proyek -- " name="jenis_proyek"
                                        id="jenis_proyek">
                                        <option value="">All Jenis Proyek</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Project based">Project based</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 col-lg-4">
                                    <select class="form-control form-control-sm select2" style="width: 100%;"
                                        data-placeholder=" -- Select Metode pembayaran -- " name="metode_pembayaran"
                                        id="metode_pembayaran">
                                        <option value="">All Metode Pembayaran</option>
                                        <option value="Cash Before Delivery">Cash Before Delivery</option>
                                        <option value="30% DP 70% Pelunasan">30% DP 70% Pelunasan</option>
                                        <option value="SCF 120 Hari">SCF 120 Hari</option>
                                        <option value="SCF 180 Hari">SCF 180 Hari</option>
                                        <option value="Reguler 14 Hari">Reguler 14 Hari</option>
                                        <option value="Reguler 30 Hari">Reguler 30 Hari</option>
                                        <option value="Reguler 60 Hari">Reguler 60 Hari</option>
                                    </select>
                                </div>

                            </div>
                            <div class="pull-right">
                                <button type='button' class='btn btn-default btn-sm'
                                    id="filter-cancel"><?= cclang('cancel') ?></button>
                                <button type="button" class="btn btn-primary btn-sm" id="filter">Filter</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table aria-describedby="tableRFQ" class="table display" name="table" id="table"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No Id</th>
                                        <!-- <th>RFQ Number</th> -->
                                        <th>PIC SE</th>
                                        <th>Deadline</th>
                                        <th>SBU</th>
                                        <th>NPP</th>
                                        <th>Tanggal Penawaran</th>
                                        <th>Umur Penawaran</th>
                                        <th>P ke</th>
                                        <th>No penawaran</th>
                                        <th>Status Gagal</th>
                                        <th>Status penawaran</th>
                                        <th>Pelanggan</th>
                                        <th>Nama perusahaan</th>
                                        <th>Nama proyek</th>
                                        <th>Nama owner</th>
                                        <th>Untuk perhatian</th>
                                        <th>Email pelanggan</th>
                                        <th>No hp</th>
                                        <th>Kebutuhan produk</th>
                                        <th>Suplai batching</th>
                                        <!-- <th>jarak</th> -->
                                        <th>Sumber dana</th>
                                        <th>Sektor</th>
                                        <th>Jenis proyek</th>
                                        <th>Tanggal mulai</th>
                                        <th>Tanggal selesai</th>
                                        <th>Wilayah</th>
                                        <th>Koordinat maps</th>
                                        <th>Jarak Batching Plant Menuju Site</th>
                                        <th>Metode pembayaran</th>
                                        <th>Total Vol</th>
                                        <th>LKB</th>
                                        <th>Omzet Kontrak</th>
                                        <th>Omzet Penjualan</th>
                                        <th>Termin</th>
                                        <th>Tindak Lanjut</th>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Periode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('cpanel/rfq_request/export/')?>" method="post" accept-charset="utf-8">
                <div class="modal-body">

                    <div class="row form-group">
                        <label class="col-lg-3 text-lg-right" for="tanggal">Tanggal :</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input value="" name="tanggal" id="tanggalrange" type="text" class="form-control"
                                    placeholder="Periode Tanggal">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-fw fa-calendar"></i></span>
                                </div>
                            </div>
                            <br>
                            <p style="color : #ea5455 !important; font-size: smaller;">Note : Di Anjurkan mendownload
                                file laporan pada PC / Laptop</p>
                        </div>
                    </div>
                    <!-- <div class="row form-group">
                        <div class="col-lg-9 offset-lg-3">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-print"></i>
                                </span>
                                <span class="text">
                                    Cetak
                                </span>
                            </button>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    var table;
    //datatables
    table = $('#table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [0, 'ASC'], //Initial no order.
        "ordering": true,
        "searching": false,
        "info": true,
        "bLengthChange": false,
        oLanguage: {
            sProcessing: '<i class="fa fa-spinner fa-spin fa-fw"></i> Loading...'
        },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= url('rfq_request/json') ?>",
            "type": "POST",
            "data": function(data) {
                data.id = $("#id").val();
                data.pic_se = $("#pic_se").val();
                data.total_vol = $("#total_vol").val();
                data.lkb = $("#lkb").val();
                data.tgl_penawaran = $("#tgl_penawaran").val();
                data.umur_penawaran = $("#umur_penawaran").val();
                data.p_ke = $("#p_ke").val();
                data.deadline = $("#deadline").val();
                data.sbu = $("#sbu").val();
                data.npp = $("#npp").val();
                data.no_penawaran = $("#no_penawaran").val();
                data.status_gagal = $("#status_gagal").val();
                data.status_penawaran = $("#status_penawaran").val();
                data.pelanggan = $("#pelanggan").val();
                data.nama_perusahaan = $("#nama_perusahaan").val();
                data.nama_proyek = $("#nama_proyek").val();
                data.nama_owner = $("#nama_owner").val();
                data.untuk_perhatian = $("#untuk_perhatian").val();
                data.email_pelanggan = $("#email_pelanggan").val();
                data.no_hp = $("#no_hp").val();
                data.kebutuhan_produk = $("#kebutuhan_produk").val();
                data.suplai_batching = $("#suplai_batching").val();
                // data.jarak = $("#jarak").val();
                data.sumber_dana = $("#sumber_dana").val();
                data.sektor = $("#sektor").val();
                data.jenis_proyek = $("#jenis_proyek").val();
                data.tanggal_mulai = $("#tanggal_mulai").val();
                data.tanggal_selesai = $("#tanggal_selesai").val();
                data.wilayah = $("#wilayah").val();
                data.koordinat = $("#koordinat").val();
                data.batching_jarak = $("#batching_jarak").val();
                data.metode_pembayaran = $("#metode_pembayaran").val();
                data.omzet_kontrak = $("#omzet_kontrak").val();
                data.omzet_penjualan = $("#omzet_penjualan").val();
                data.termin = $("#termin").val();
                data.tindak_lanjut = $("#tindak_lanjut").val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [

            {
                "targets": 1,
                "orderable": true,
            },
            {
                "className": "text-center",
                "orderable": false,
                "targets": 36
            },
        ],

        "rowCallback": function(row, data) {
            // console.log(data)

            if (data[11] === "Gagal Diperoleh") {
                $(row).css('background-color', '#f78d8d');
                $(row).css('color', '#000000');
            }

            if (data[11] == "Diperoleh") {
                $(row).css('background-color', '#96ff9d');
                $(row).css('color', '#000000');
            }

            var today = new Date();
            var deadlineParts = data[3].split('-');
            var deadline = new Date(deadlineParts[2], deadlineParts[1] - 1, deadlineParts[0]);
            var dday = Math.ceil((deadline - today) / (1000 * 60 * 60 * 24));
            console.log(dday);

            if (dday >= 0 || dday === -1) {
                $('td:eq(0)', row).html(
                    '<i style="color:red; font-size:20px" class="fa fa-warning">');
            }


        }

    });

    $("#reload").click(function() {
        $("#id").val("");
        $("#pic_se").val("");
        $("#total_vol").val("");
        $("#lkb").val("");
        $("#tgl_penawaran").val("");
        $("#umur_penawaran").val("");
        $("#p_ke").val("");
        $("#deadline").val("");
        $("#sbu").val("");
        $("#npp").val("");
        $("#no_penawaran").val("");
        $("#status_gagal").val("");
        $("#status_penawaran").val("");
        $("#pelanggan").val("");
        $("#nama_perusahaan").val("");
        $("#nama_proyek").val("");
        $("#nama_owner").val("");
        $("#untuk_perhatian").val("");
        $("#email_pelanggan").val("");
        $("#no_hp").val("");
        $("#kebutuhan_produk").val("");
        $("#suplai_batching").val("");
        // $("#jarak").val("");
        $("#sumber_dana").val("");
        $("#sektor").val("");
        $("#jenis_proyek").val("");
        $("#tanggal_mulai").val("");
        $("#tanggal_selesai").val("");
        $("#wilayah").val("");
        $("#koordinat").val("");
        $("#batching_jarak").val("");
        $("#metode_pembayaran").val("");
        $("#omzet_kontrak").val("");
        $("#omzet_penjualan").val("");
        $("#termin").val("");
        $("#tindak_lanjut").val("");
        table.ajax.reload();
    });

    function resetFilterValues() {
        // Reset values in your filter form fields
        $("#id, #no_penawaran, #nama_perusahaan, #nama_proyek, #npp, #deadline, #sbu, #untuk_perhatian, #suplai_batching, #sektor, #status_penawaran, #jenis_proyek, #metode_pembayaran")
            .val("");
        // Reset select2 elements
        $("#suplai_batching, #sektor, #status_penawaran, #deadline, #jenis_proyek, #metode_pembayaran").val(
            null).trigger("change");
    }

    $(document).on("click", "#filter-show", function(e) {
        e.preventDefault();
        var $contentFilter = $(".content-filter");
        // Check if the filter is already visible
        if ($contentFilter.is(":visible")) {
            // Reset filter values and reload table
            resetFilterValues();
            table.ajax.reload();
        } else {
            // Slide down the filter
            $contentFilter.slideDown();
        }
    });

    $(document).on("click", "#filter", function(e) {
        e.preventDefault();
        $("#table").DataTable().ajax.reload();
    })

    $(document).on("click", "#filter-cancel", function(e) {
        e.preventDefault();
        $(".content-filter").slideUp();
        resetFilterValues();
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