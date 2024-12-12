<link rel="stylesheet" href="<?= base_url('_assets/dist/css/adminlte.min.css'); ?>">
<table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
    <tr>
        <td rowspan='5' style='width: 100px;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
            RUMAH SAKIT UMUM
            <p style='font-size:30px;color:#14B937'>DARMAYU</p>
        </td>
    </tr>
    <tr>
        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
    </tr>
    <tr>
        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
    </tr>
</table>
<hr>
<table border="0" width="100%">
    <thead>
        <tr>
            <td height="30" class="text-center" style="font-size: 14px;font-weight: bold;"><b>ASSESMEN GIZI</b></td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($assGz as $row) : ?>
            <tr>
                <td width="100%">
                    <table border='0' style="font-family:Arial, Helvetica, sans-serif; font-size: 14px;">
                        <tbody>
                            <tr>
                                <td>No RM</td>
                                <td style="padding-left: 30px;">: <?= $row->no_rm ?></td>
                            </tr>
                            <tr>
                                <td>Nama Pasien</td>
                                <td style="font-weight: bold;padding-left: 30px;">: <?= $row->nama ?></td>
                            </tr>
                            <tr>
                                <td>Tgl Lahir/Usia</td>
                                <td style="padding-left: 30px;">: <?= $row->tgl_lahir ?> / <?= $row->umur ?></td>
                            </tr>
                            <tr>
                                <td>Tgl Masuk</td>
                                <td style="padding-left: 30px;">: <?= $row->tgl_masuk ?></td>
                            </tr>
                            <tr>
                                <td>DPJP</td>
                                <td style="padding-left: 30px;">: <?= $row->nama_pegawai ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>
<table width="100%" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size: 14px;">
    <tbody>
        <?php
        foreach ($assGz as $row) :
            if ($row->skrining_perawat == 1) {
                $cek = '[✓] Ringan (Nilai skor 0)';
            } else {
                $cek = '[ ] Ringan (Nilai skor 0)';
            }
            if ($row->skrining_perawat == 2) {
                $cek2 = '[✓] Sedang (Nilai skor 1)';
            } else {
                $cek2 = '[ ] Sedang (Nilai skor 1)';
            }
            if ($row->skrining_perawat == 3) {
                $cek3 = '[✓] Tinggi (Nilai skor >= 2)';
            } else {
                $cek3 = '[ ] Tinggi (Nilai skor >= 2)';
            }
            if ($row->skrining_ahli_gizi == 1) {
                $ah1 = '[✓] Ringan (Nilai skor 0)';
            } else {
                $ah1 = '[ ] Ringan (Nilai skor 0)';
            }
            if ($row->skrining_ahli_gizi == 2) {
                $ah2 = '[✓] Sedang (Nilai skor 1)';
            } else {
                $ah2 = '[ ] Sedang (Nilai skor 1)';
            }
            if ($row->skrining_ahli_gizi == 3) {
                $ah3 = '[✓] Tinggi (Nilai skor >= 2)';
            } else {
                $ah3 = '[ ] Tinggi (Nilai skor >= 2)';
            }
            if ($row->kondisi_khusus == 1) {
                $kondisi = '[✓] Tidak';
            } else {
                $kondisi = '[ ] Tidak';
            }
            if ($row->kondisi_khusus == 2) {
                $kondisi2 = '[✓] Ya ' . $row->kondisi_khusus_ket;
            } else {
                $kondisi2 = '[ ] Ya';
            }
            if ($row->diet_awal == 1) {
                $diet1 = '[✓] Makanan Umum';
            } else {
                $diet1 = '[ ] Makanan Umum';
            }
            if ($row->diet_awal == 2) {
                $diet2 = '[✓] Makanan Khusus';
            } else {
                $diet2 = '[ ] Makanan Khusus';
            }
            if ($row->tindak_lanjut == 1) {
                $lanjut1 = '[✓] Perlu Asuhan Gizi';
            } else {
                $lanjut1 = '[ ] Perlu Asuhan Gizi';
            }
            if ($row->tindak_lanjut == 2) {
                $lanjut2 = '[✓] Belum Perlu Asuhan Gizi';
            } else {
                $lanjut2 = '[ ] Belum Perlu Asuhan Gizi';
            }
        ?>
            <tr>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="3" style="font-weight: bold; padding:5px;">1. Risiko Malnutrisi Berdasarkan Hasil Skrining Oleh Perawat, Kondisi Pasien Termasuk Kategori :
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $cek ?>
                                </td>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $cek2 ?>
                                </td>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $cek3 ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-weight: bold; padding:5px">2. Verifikasi Skrining Gizi Oleh Ahli Gizi, Kondisi Pasien Termasuk Kategori :
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $ah1 ?>
                                </td>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $ah2 ?>
                                </td>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $ah3 ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-weight: bold; padding:5px">3. Pasien Mempunyai Kondisi Khusus :
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $kondisi ?>
                                </td>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $kondisi2 ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-weight: bold; padding:5px">4. Alergi Makanan
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 20px;"><?= $row->alergi ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-weight: bold; padding:5px">5. Preskripsi Diet Awal :
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $diet1 ?>
                                </td>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $diet2 ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-weight: bold; padding:5px">6. Tindak Lanjut :
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $lanjut1 ?>
                                </td>
                                <td style="padding: 5px;padding-left: 20px;">
                                    <?= $lanjut2 ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<br>
<br>
<table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%; font-size:14px'>
    <tr>
        <td style='width:120px;text-align:center;'>
        </td>
        <td style='width:120px;text-align:center;'>
        </td>
        <td style='width:50px;text-align:center;font-size: 14px;;'>
            <h6>Madiun, <?php echo date('d-m-Y') ?></h6>
        </td>
    </tr>
    <tr>
        <td style='width:120px;text-align:center;'>
        </td>
        <td style='width:120px;text-align:center;'>
        </td>
        <td style='width:50px;text-align:center;font-size: 14px;'>
            <h6>PPJA</h6>
        </td>
    </tr>
    <tr>
        <td style='width:120px;text-align:center;'>
        </td>
        <td style='width:120px;text-align:center;'>
        </td>
        <td style='width:50px;text-align:center;'>
            <img src="<?= $row->ttd ?>" width="100px" height="100px">
        </td>
    </tr>
    <?php foreach ($assGz as $row) : ?>
        <tr>
            <td style='width:120px;text-align:center;'>
            </td>
            <td style='width:120px;text-align:center;'>
            </td>
            <td style='width:50px;text-align:center;font-weight:bold;font-size: 14px;'>
                <h6><u><?= $row->ttd_user ?></u></h6>
            </td>
        </tr>
    <?php endforeach ?>
    <tr>
        <td style='width:120px;text-align:center;'>
        </td>
        <td style='width:120px;text-align:center;'>
        </td>
        <td style='width:50px;text-align:center;font-size: 14px;'>
            <h6><i>Nama & Tanda Tangan</i></h6>
        </td>
    </tr>
</table>