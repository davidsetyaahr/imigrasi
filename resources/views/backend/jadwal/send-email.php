<!DOCTYPE html>
<html lang="en">
<head>
    <title>PAPALASAK</title>
</head>
<body>
    <h1 style="color:#3c4099">Jadwal Pemeriksaan Pengajuan Paspor Hilang atau Rusak :</h1>
    <p>Anda dijadwalkan melakukan pemeriksaan pada :</p>
    <table>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?= $details['tanggal'] ?></td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td><?= $details['tempat'] ?></td>
        </tr>
    </table>
    <br>
    <b>Note: Kepada pemohon diharapkan membawa dokumen asli dan foto copy: KTP,Kartu Keluarga,Akte Lahir/Ijazah/Buku Nikah dan Surat Keterangan Hilang Kepolisian</b>
</body>
</html>