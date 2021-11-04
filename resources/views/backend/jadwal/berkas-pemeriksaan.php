<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        @page { margin: 0 }
        body { margin: 0; font-family : 'arial';font-size:11pt;line-height:1.5}
        .sheet {
        margin: 0;
        overflow: auto;
        position: relative;
        box-sizing: border-box;
        page-break-after: always;
        }

        /** Paper sizes **/
        body.A4 .sheet { width: 210mm; height: 296mm }

        /** Padding area **/
        .padding-10mm { padding: 20.54mm }

        /** For screen preview **/
        @media screen {
            body { background: #e0e0e0 }
            .sheet {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
                margin: 5mm auto;
            }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
        body.A4 { width: 210mm }
        }
        @page { size: A4 }        
    </style>
</head>
<body class="A4">
    <section class="sheet">
        <div class="padding-10mm">
            <table width="100%">
                <tr>
                    <td>
                        <img src="<?= asset('backend/img/logo.png') ?>" width="100%" alt="">
                    </td>
                    <td width="80%" align="center" style="font-size:11px">
                        KEMENTeRIAN HUKUM DAN HAK ASASI MANUSIA
                        <br>
                        REPUBLIK INDONESIA
                        <br>
                        <b>KANTOR IMIGRASI KELAS I TPI JEMBER</b>
                        <br>
                        Jalan Letjend D.I Panjaitan Nomor 47, Jember 68121
                        <br>
                        Telepon (0331) 335494, 333177, Faksimili (0331) 333157
                        <br>
                        Laman: http://jember.imigrasi.go.id; Email: kanimjember@gmail.com
                    </td>
                    <td width="10%"></td>
                </tr>
            </table>
            <hr style="margin-top:0px">
            <center>
                <h4 style="margin-bottom:0px"><b><u>BERITA ACARA PEMERIKSAAN</u></b></h4>
                <h4 style="margin-top:0px;font-weight:normal">NOMOR W15.IMI.IMI.4-GR.03.01-2.<?= $detail->no_pemeriksaan ?></h4>
            </center>
            <br>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pada hari ini, <?= $hari ?> tanggal <?= $tgl ?> bulan <?= $bulan ?> tahun <?= $thn ?> Pukul <?= $jam ?>, saya:</p>
            <p>
                <center>
                    <b><?= strtoupper($detail->nama_petugas) ?></b>
                </center>
            </p>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= ucwords($detail->pangkat) ?>, NIP.<?= ucwords($detail->nip) ?>, <?= ucwords($detail->jabatan) ?> pada Kantor Imigrasi Kelas II TPI Jember, melakukan pemeriksaan terhadap seorang <?= ucwords($detail->jenis_kelamin) ?> berkebangsaan Indonesia yang belum saya kenal sebelumnya, bernama dan memeiliki identitas jati diri sebagai berikut:</p>
            <p>
                <center>
                    <b><?= $detail->nama ?></b>
                </center>
            </p>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lahir di <?= $detail->tempat_lahir ?>, tanggal <?= date('d F Y', strtotime($detail->tgl_lahir)) ?>, agama <?= $detail->agama ?>, status <?= $detail->status_pernikahan ?>, pekerjaan <?= $detail->pekerjaan ?>, alamat <?= $detail->alamat ?>. Pemegang Dokumen Perjalanan Republik Indonesia (DPRI) Nomor <?= $pertanyaan[5]->jawaban ?> atas nama <b> <?= $detail->nama ?></b> yang diterbitkan <?= $pertanyaan[6]->jawaban ?> berlaku s/d <?= $pertanyaan[7]->jawaban ?>. </p>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bersangkutan diperiksa dan didengar keterangannya sesuai Pasal 40 ayat (2) dan ayat (3) Peraturan Mentri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2014 tentang Paspor Biasa dan Surar Perjalanan Laksana Paspor.</p>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atas pemeriksaan dan pertanyaan pemeriksa yang diperiksa menjawab dan memberikan keterangan sebagai berikut:</p>
            <br>
            <table width="100%">
                <tr>
                    <td width="50%" align="center"><b><u>PERTANYAAN</u></b></td>
                    <td width="50%" align="center"><b><u>JAWABAN</u></b></td>
                </tr>
            </table>
            <?php 
                foreach ($pertanyaan as $key => $value) {
                    $key++;
            ?>
                <p>
                    <?= sprintf("%02s",$key)."&nbsp;&nbsp;".$value->pertanyaan ?>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= sprintf("%02s",$key).".".$value->jawaban ?>
                </p>
            <?php
                }
            ?>
            <br>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setelah Berita Acara Pemeriksaan ini selesai dibuat kemudian dibacakan kembali kepada yang diperiksa dengan bahsa yang mudah dimengerti, yang diperiksa menyatakan setuju dan membenarkan semua keterangan yang diberikan tersebut diatas, untuk menguatkannya dibutuhkan tanda tangan dibawah ini. </p>
            <br>
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">
                        Terperiksa, 
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <?= $detail->nama ?>
                    </td>
                </tr>
            </table>
            <br>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian Berita Acara Pemeriksaan ini dibuat dnegan sebenarnya atas kekuatan sumpah jabatan, kemudian ditutup dan ditandatangani di Jember pada hari ini, tanggal, bulan dan tahun tersebut diatas</p>
            <br>
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">
                        Pemeriksa, 
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <?= ucwords($detail->nama_petugas) ?>
                        <br>
                        NIP. <?= $detail->nip ?>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>
