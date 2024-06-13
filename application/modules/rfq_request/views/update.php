<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
        <div class="card m-b-30">
            <div class="card-header bg-primary text-white">
                <?=ucwords($title_module)?>
            </div>
            <div class="card-body">
                <form action="<?=$action?>" method="POST" autocomplete="off">

                    <div class="form-group">
                        <label style="width: 100%;">No penawaran
                            <input type="text" class="form-control" placeholder="No penawaran" name="no_penawaran"
                                id="no_penawaran" value="<?=$no_penawaran?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Deadline
                            <input type="date" class="form-control" placeholder="deadline" name="deadline" id="deadline"
                                value="<?=$deadline?>">
                        </label>
                    </div>

                    <div class="row" style="margin: initial;">
                        <div class="form-group col" style="padding: initial;">
                            <label style="width: 100%;">Tanggal Mulai
                                <input type="date" class="form-control" placeholder="tanggal_mulai" name="tanggal_mulai"
                                    id="tanggal_mulai" value="<?=$tanggal_mulai?>">
                            </label>
                        </div>

                        <div class="form-group col-1" style="padding: initial;">
                        </div>


                        <div class="form-group col" style="padding: initial;">
                            <label style="width: 100%;">Tanggal Selesai
                                <input type="date" class="form-control" placeholder="tanggal_selesai"
                                    name="tanggal_selesai" id="tanggal_selesai" value="<?=$tanggal_selesai?>">
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">SBU
                            <select name="sbu" id="" class="form-control">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="RD" <?= $sbu == 'RD' ? 'selected' : '' ?>>RD</option>
                                <option value="QR" <?= $sbu == 'QR' ? 'selected' : '' ?>>QR</option>
                                <option value="OT" <?= $sbu == 'OT' ? 'selected' : '' ?>>OT</option>
                                <option value="SV" <?= $sbu == 'SV' ? 'selected' : '' ?>>SV</option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">NPP
                            <input type="text" class="form-control" maxlength="10" placeholder="npp" name="npp" id="npp"
                                value="<?=$npp?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Status penawaran
                            <!-- <input type="text" class="form-control" placeholder="Pelanggan" name="sbu" id="no_penawaran" value="<?= $no_penawaran ?>"> -->
                            <select name="status_penawaran" id="" class="form-control">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Diperoleh" <?= $status_penawaran == 'Diperoleh' ? 'selected' : '' ?>>
                                    Diperoleh</option>
                                <option value="On Going" <?= $status_penawaran == 'On Going' ? 'selected' : '' ?>>On
                                    Going</option>
                                <option value="Gagal Diperoleh"
                                    <?= $status_penawaran == 'Gagal Diperoleh' ? 'selected' : '' ?>>Gagal Diperoleh
                                </option>
                                <option value="Penyusunan HPP"
                                    <?= $status_penawaran == 'Penyusunan HPP' ? 'selected' : '' ?>>Penyusunan HPP
                                </option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Pelanggan
                            <select name="pelanggan" id="" class="form-control">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="WIKA" <?= $pelanggan == 'WIKA' ? 'selected' : '' ?>>WIKA</option>
                                <option value="NON WIKA" <?= $pelanggan == 'NON WIKA' ? 'selected' : '' ?>>NON WIKA
                                </option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Untuk Perhatian
                            <input type="text" class="form-control" placeholder="Untuk Perhatian" name="untuk_perhatian"
                                id="untuk_perhatian" value="<?= $untuk_perhatian ?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Nama perusahaan
                            <input type="text" class="form-control" placeholder="Nama perusahaan" name="nama_perusahaan"
                                id="nama_perusahaan" value="<?=$nama_perusahaan?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Email Pelanggan
                            <input type="text" class="form-control" placeholder="Email Pelanggan" name="email_pelanggan"
                                id="email_pelanggan" value="<?= $email_pelanggan ?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Nama proyek
                            <input type="text" class="form-control" placeholder="Nama proyek" name="nama_proyek"
                                id="nama_proyek" value="<?=$nama_proyek?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Nama owner
                            <input type="text" class="form-control" placeholder="Nama owner" name="nama_owner"
                                id="nama_owner" value="<?=$nama_owner?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Kebutuhan produk
                            <textarea class="form-control" rows="3" name="kebutuhan_produk"
                                id="ckeditor300"><?=$kebutuhan_produk?></textarea>
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Wilayah
                            <select class="form-control" name="wilayah" id="wilayah">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Banten" <?= $wilayah == 'Banten' ? 'selected' : '' ?>>Banten</option>
                                <option value="DKI Jakarta" <?= $wilayah == 'DKI Jakarta' ? 'selected' : '' ?>>DKI
                                    Jakarta</option>
                                <option value="Jawa Barat" <?= $wilayah == 'Jawa Barat' ? 'selected' : '' ?>>Jawa Barat
                                </option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Suplai batching
                            <select class="form-control" name="suplai_batching" id="suplai_batching">
                                <option value="">-- Silahkan Pilih --</option>
                                <?php
                                $batching_plants = [
                                    'Batching Plant Karawang',
                                    'Batching Plant Walini',
                                    'Batching Plant Cakung',
                                    'Batching Plant Cilegon',
                                    'Batching Plant Ancol',
                                    'Batching Plant On Site',
                                    'Other'
                                ];
                                $selected_other = !in_array($suplai_batching, $batching_plants) ? 'selected' : $suplai_batching;
                                foreach ($batching_plants as $plant) {
                                    $selected = ($suplai_batching == $plant) ? 'selected' : '';
                                    echo "<option value=\"$plant\" $selected>$plant</option>";
                                }
                                $check_data = !in_array($suplai_batching, $batching_plants);
                                if ($check_data) {
                                  echo "<option value=\"$suplai_batching\" $selected_other >$suplai_batching</option>";
                                }
                                ?>
                            </select>
                            <input type="text" name="suplai_batching_other" class="form-control"
                                id="suplai_batching_other" placeholder="Masukkan nama Batching Plant"
                                style="display:none;">
                        </label>
                    </div>

                    <div class="row" style="margin: initial;">
                        <div class="form-group col" style="padding: initial;">
                            <label style="width: 100%;">Share location
                                <input type="text" class="form-control" rows="3" name="koordinat" id="koordinat"
                                    value="<?=$koordinat?>">
                            </label>
                        </div>

                        <div class="form-group col-1" style="padding: initial;">
                        </div>


                        <div class="form-group col" style="padding: initial;">
                            <label style="width: 100%;">Jarak Batching Plan
                                <input type="text" class="form-control" rows="3" name="batching_jarak"
                                    id="batching_jarak" value="<?=$batching_jarak?>">
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Omzet Kontrak
                            <input type="number" class="form-control" rows="3" name="omzet_kontrak" id="omzet_kontrak"
                                value="<?=$omzet_kontrak?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Omzet Penjualan
                            <input type="number" class="form-control" rows="3" name="omzet_penjualan"
                                id="omzet_penjualan" value="<?=$omzet_penjualan?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Termin
                            <input type="number" class="form-control" placeholder="Termin" rows="3" name="termin"
                                id="termin" value="<?=$termin?>">
                        </label>
                    </div>


                    <div class="form-group">
                        <label style="width: 100%;">Tindak Lanjut
                            <input type="text" class="form-control" placeholder="Tindak Lanjut" rows="3"
                                name="tindak_lanjut" id="tindak_lanjut" value="<?=$tindak_lanjut?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Status Gagal
                            <select class="form-control select2" name="status_gagal" id="status_gagal">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="C1" <?= $status_gagal == 'C1' ? 'selected' : '' ?>>C1</option>
                                <option value="C2" <?= $status_gagal == 'C2' ? 'selected' : '' ?>>C2</option>
                                <option value="C3" <?= $status_gagal == 'C3' ? 'selected' : '' ?>>C3</option>
                                <option value="C4" <?= $status_gagal == 'C4' ? 'selected' : '' ?>>C4</option>
                                <option value="C5" <?= $status_gagal == 'C5' ? 'selected' : '' ?>>C5</option>
                                <option value="C6" <?= $status_gagal == 'C6' ? 'selected' : '' ?>>C6</option>
                            </select>
                        </label>
                    </div>

                    <!-- NEW PROJECT 3 -->
                    <div class="form-group">
                        <label style="width: 100%;">PIC SE
                            <input type="text" class="form-control" placeholder="PIC SE" rows="3" name="pic_se"
                                id="pic_se" value="<?=$pic_se?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Total Volume
                            <input type="text" class="form-control" placeholder="0.0" rows="3" name="total_vol"
                                id="total_vol" value="<?=$total_vol?>">
                            <span style="font-size: smaller;">contoh: 1000.50</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">LKB
                            <input type="text" class="form-control" placeholder="0.0%" rows="3" name="lkb" id="lkb"
                                value="<?=$lkb?>">
                            <span style="font-size: smaller;">contoh: 0.00%</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">Tanggal Penawaran
                            <input type="date" class="form-control" placeholder="tgl_penawaran" name="tgl_penawaran"
                                id="tgl_penawaran" value="<?=$tgl_penawaran?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label style="width: 100%;">P Ke
                            <input type="text" class="form-control" rows="3" placeholder="P Ke" name="p_ke" id="p_ke"
                                value="<?=$p_ke?>">
                        </label>
                    </div>
                    <!-- END -->

                    <input type="hidden" name="submit" value="update">
                    <div class="text-right">
                        <a href="<?=url($this->uri->segment(2))?>"
                            class="btn btn-sm btn-danger"><?=cclang("cancel")?></a>
                        <button type="submit" id="submit" class="btn btn-sm btn-primary"><?=cclang("update")?></button>
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

<script>
var ckeditor = CKEDITOR.replace('ckeditor300', {
    height: '300px'
});
</script>