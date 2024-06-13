<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

    <div class="container" data-aos="fade-up" style="width: 70%;">
        <?= $this->session->flashdata('pesan'); ?>

        <div class="text-center">
            <div class="section-title">
                <h2>Form</h2>
                <h3><span>Surat Keterangan Aktif Kuliah</span></h3>
            </div>
        </div>
        <?php
        $bulan = date('m');

        $romawiMonths = [
            '01' => 'I',
            '02' => 'II',
            '03' => 'III',
            '04' => 'IV',
            '05' => 'V',
            '06' => 'VI',
            '07' => 'VII',
            '08' => 'VIII',
            '09' => 'IX',
            '10' => 'X',
            '11' => 'XI',
            '12' => 'XII'
        ];

        $romawi = $romawiMonths[$bulan];
        ?>

        <div class="row mt-2" data-aos="fade-up" data-aos-delay="100">
            <form action="<?= site_url('contact/add_action') ?>" method="post">
                <div class="row mt-2">
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">Nomor Surat</label>
                        <input type="text" readonly name="nomor_surat" class="form-control" id="name" value="<?= $no_urut ?>/iai.alqodiri/SKA/<?= $romawi ?>/<?= date('Y') ?>" placeholder="" />
                    </div>
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" required class="form-control" id="nama" placeholder="Nama Lengkap" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">Tempat Lahir (Kota)</label>
                        <input type="text" name="tempat_lahir" required class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" />
                    </div>
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="year" placeholder="" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">Nomor Induk Mahasiswa</label>
                        <input type="number" name="nim" class="form-control" required id="name" placeholder="Nomor Induk Mahasiswa" />
                    </div>
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">NIK KTP</label>
                        <input type="number" class="form-control" name="nik" required id="email" placeholder="NIK KTP" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">Fakultas</label>
                        <select class="form-select" required name="fakultas" required aria-label="Default select example">
                            <option value="">-- Pilih Fakultas --</option>
                            <option value="Tarbiyah">Tarbiyah</option>
                            <option value="Syariah">Syariah</option>
                            <option value="Dakwah">Dakwah</option>
                            <option value="Ekonomi dan Bisnis Islam">Ekonomi dan Bisnis Islam</option>
                        </select>
                    </div>
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">Program Studi</label>
                        <select class="form-select" required name="program_studi" required aria-label="Default select example">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="Pendidikan Agama Islam (PAI)">Pendidikan Agama Islam (PAI)</option>
                            <option value="Pendidikan Islam Anak Usia Dini (PIAUD)">Pendidikan Islam Anak Usia Dini (PIAUD)</option>
                            <option value="Pendidikan Bahasa Arab (PBA)">Pendidikan Bahasa Arab (PBA)</option>
                            <option value="Hukum Keluarga Islam (HKI)">Hukum Keluarga Islam (HKI)</option>
                            <option value="Komunikasi Penyiaran Islam (KPI)">Komunikasi Penyiaran Islam (KPI)</option>
                            <option value="Ekonomi Syariah (ES)">Ekonomi Syariah (ES)</option>
                            <option value="Pendidikan Guru Madrasah Ibtida'iyah (PGMI)">Pendidikan Guru Madrasah Ibtida'iyah (PGMI)</option>
                            <option value="Akuntansi Syariah (AS)">Akuntansi Syariah (AS)</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col form-group">
                        <label for="datetime" class="form-label">Tahun Akademik</label>
                        <input type="text" class="form-control" required name="akademik" placeholder="eg, 2022/2023 Ganjil" />
                    </div>
                    <div class="col form-group">
                        <label for="exampleFormControlInput1" class="form-label">Semester</label>
                        <input type="text" class="form-control" required name="semester" placeholder="Isi dalam bentuk romawi" />
                    </div>
                </div>

                <br>
                <div class="text-center d-grid gap-2">
                    <button class="btn btn-block btn-primary" type="submit">Generate PDF</button>
                </div>
            </form>
        </div>
</section>
<!-- End Contact Section -->