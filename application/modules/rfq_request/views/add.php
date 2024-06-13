<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
        <div class="card m-b-30">
            <div class="card-header bg-primary text-white">
                <?= ucwords($title_module) ?>
            </div>
            <div class="card-body">
                <form action="<?= $action ?>" id="form" autocomplete="off">

                    <div class="form-group">
                        <label>No penawaran</label>
                        <input type="text" class="form-control form-control-sm" placeholder="No penawaran"
                            name="no_penawaran" id="no_penawaran">
                    </div>

                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" class="form-control form-control-sm" placeholder="Deadline"
                            name="deadline" id="deadline">
                    </div>

                    <div class="form-group">
                        <label>SBU</label>
                        <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- "
                            name="sbu" id="sbu">
                            <option value=""></option>
                            <option value="RD">RD</option>
                            <option value="QR">QR</option>
                            <option value="OT">OT</option>
                            <option value="SV">SV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>NPP</label>
                        <input type="text" class="form-control form-control-sm" placeholder="NPP" name="npp"
                            id="npp">
                    </div>

                    <div class="form-group">
                        <label>Pelanggan</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Pelanggan"
                            name="pelanggan" id="pelanggan">
                    </div>

                    <div class="form-group">
                        <label>Nama perusahaan</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nama perusahaan"
                            name="nama_perusahaan" id="nama_perusahaan">
                    </div>

                    <div class="form-group">
                        <label>Nama proyek</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nama proyek"
                            name="nama_proyek" id="nama_proyek">
                    </div>

                    <div class="form-group">
                        <label>Nama owner</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nama owner"
                            name="nama_owner" id="nama_owner">
                    </div>

                    <div class="form-group">
                        <label>Untuk perhatian</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Untuk perhatian"
                            name="untuk_perhatian" id="untuk_perhatian">
                    </div>

                    <div class="form-group">
                        <label>Email pelanggan</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Email pelanggan"
                            name="email_pelanggan" id="email_pelanggan">
                    </div>

                    <div class="form-group">
                        <label>No hp</label>
                        <input type="text" class="form-control form-control-sm" placeholder="No hp" name="no_hp"
                            id="no_hp">
                    </div>

                    <div class="form-group">
                        <label>Kebutuhan produk</label>
                        <textarea class="form-control text-editor" rows="3" data-original-label="kebutuhan_produk" name="kebutuhan_produk"
                            id="ckeditor300"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Suplai batching</label>
                        <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- "
                            name="suplai_batching" id="suplai_batching">
                            <option value=""></option>
                            <option value="Batching Plant Karawang">Batching Plant Karawang</option>
                            <option value="Batching Plant Walini">Batching Plant Walini</option>
                            <option value="Batching Plant Cakung">Batching Plant Cakung</option>
                            <option value="Batching Plant Cilegon">Batching Plant Cilegon</option>
                            <option value="Batching Plant Ancol">Batching Plant Ancol</option>
                            <option value="Batching Plant On Site">Batching Plant On Site</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jarak</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Jarak" name="jarak"
                            id="jarak">
                    </div>

                    <div class="form-group">
                        <label>Sumber dana</label>
                        <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- "
                            name="sumber_dana" id="sumber_dana">
                            <option value=""></option>
                            <option value="APBN">APBN</option>
                            <option value="APBD">APBD</option>
                            <option value="SWASTA NASIONAL">SWASTA NASIONAL</option>
                            <option value="SWASTA ASING">SWASTA ASING</option>
                            <option value="LOAN">LOAN</option>
                            <option value="INVESTASI">INVESTASI</option>
                            <option value="BUMN">BUMN</option>
                            <option value="BUMD">BUMD</option>
                            <option value="PEMERINTAH">PEMERINTAH</option>
                            <option value="PEMERINTAH ASING">PEMERINTAH ASING</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sektor</label>
                        <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- "
                            name="sektor" id="sektor">
                            <option value=""></option>
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

                    <div class="form-group">
                        <label>Jenis proyek</label>
                        <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- "
                            name="jenis_proyek" id="jenis_proyek">
                            <option value=""></option>
                            <option value="Retail">Retail</option>
                            <option value="Project based">Project based</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal mulai</label>
                        <input type="date" class="form-control form-control-sm" placeholder="Tanggal mulai"
                            name="tanggal_mulai" id="tanggal_mulai">
                    </div>

                    <div class="form-group">
                        <label>Tanggal selesai</label>
                        <input type="date" class="form-control form-control-sm" placeholder="Tanggal selesai"
                            name="tanggal_selesai" id="tanggal_selesai">
                    </div>
                    
                    <!-- NEW PROJECT 3 -->
                    <div class="form-group">
                        <label>PIC SE</label>
                        <input type="text" class="form-control form-control-sm" placeholder="PIC SE"
                            name="pic_se" id="pic_se">
                            
                    <div class="form-group">
                        <label>Total Volume</label>
                        <input type="text" class="form-control form-control-sm" placeholder="total_vol"
                            name="total_vol" id="total_vol">
                    </div>

                    <div class="form-group">
                        <label>LKB</label>
                        <input type="text" class="form-control form-control-sm" placeholder="lkb"
                            name="lkb" id="lkb">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Penawaran</label>
                        <input type="date" class="form-control form-control-sm" placeholder="tgl_penawaran"
                            name="tgl_penawaran" id="tgl_penawaran">
                    </div>

                    <div class="form-group">
                        <label>P Ke</label>
                        <input type="text" class="form-control form-control-sm" placeholder="p_ke"
                            name="p_ke" id="p_ke">
                    </div>
                    <!-- END -->

                    <div class="form-group">
                        <label>Wilayah</label>
                        <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- "
                            name="wilayah" id="wilayah">
                            <option value="Banten">Banten</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Koordinat</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Koordinat"
                            name="koordinat" id="koordinat">
                    </div>

                    <div class="form-group">
                        <label>Estimasi Menuju Site</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Batching jarak"
                            name="batching_jarak" id="batching_jarak">
                    </div>

                    <div class="form-group">
                        <label>Metode pembayaran</label>
                        <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- "
                            name="metode_pembayaran" id="metode_pembayaran">
                            <option value=""></option>
                            <option value="Cash Before Delivery">Cash Before Delivery</option>
                            <option value="30% DP 70% Pelunasan">30% DP 70% Pelunasan</option>
                            <option value="SCF 120 Hari">SCF 120 Hari</option>
                            <option value="SCF 180 Hari">SCF 180 Hari</option>
                            <option value="Reguler 14 Hari">Reguler 14 Hari</option>
                            <option value="Reguler 30 Hari">Reguler 30 Hari</option>
                            <option value="Reguler 60 Hari">Reguler 60 Hari</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Status"
                            name="status" id="status">
                    </div>

                    <div class="form-group">
                        <label>Omzen Kontrak</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Omzet kontran"
                            name="omzet_kontrak" id="omzet_kontrak">
                    </div>

                    <div class="form-group">
                        <label>Omzen Penjualan</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Omzen penjualan"
                            name="omzet_penjualan" id="omzet_penjualan">
                    </div>

                    <div class="form-group">
                        <label>Termin</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Termin"
                            name="termin" id="termin">
                    </div>

                    <div class="form-group">
                        <label>Tindak Lanjut</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Tindak Lanjut"
                            name="tindak_lanjut" id="tindak_lanjut">
                    </div>
                    
                    <div class="form-group">
                        <label>Status Gagal</label>
                        <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- "
                            name="status_gagal" id="status_gagal">
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                            <option value="C4">C4</option>
                            <option value="C5">C5</option>
                            <option value="C6">C6</option>
                        </select>
                    </div>

                    <input type="hidden" name="submit" value="add">

                    <div class="text-right">
                        <a href="<?= url($this->uri->segment(2)) ?>"
                            class="btn btn-sm btn-danger"><?= cclang('cancel') ?></a>
                        <button type="submit" id="submit"
                            class="btn btn-sm btn-primary"><?= cclang('save') ?></button>
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
