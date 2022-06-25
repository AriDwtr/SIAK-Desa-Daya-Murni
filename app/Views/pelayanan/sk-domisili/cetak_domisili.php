<?php
$tahun=date("Y");
function getRomawi($bln){
                switch ($bln){
                    case 1:
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$tgl = tgl_indo(date('Y-m-d'));
$bulan = date('n');
$bul = getRomawi($bulan);

$path = 'assets/dist/banyuasin.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIAK DAYA MURNI</title>
  <style>
    @font-face {
      font-family: 'Times New Roman';
      font-weight: normal;
      font-style: normal;
      font-variant: normal;
      src: url("http://db.onlinewebfonts.com/t/32441506567156636049eb850b53f02a.ttf") format("truetype");
    }

    body {
      font-family: Elegance, sans-serif;
    }

    #p1 {
      padding: 0;
      margin: 0;
      font-size: 25px;
      line-height: 30px;
      font-weight: bold;
    }

    #halaman {
      width: auto;
      height: auto;
      position: absolute;
      padding-top: 10px;
      padding-left: 30px;
      padding-right: 30px;
      padding-bottom: 80px;
    }

    table {
      border-collapse: separate;
      border-spacing: 5px 1rem;
    }
  </style>

</head>

<body>
  <table width="100%" border="0">
    <tr>
      <td width="5%" align="center"><img id="#p1" src="<?php echo $base64 ?>" width="140" height="110" /></td>
      <td width="95%" align="center">
        <p id="p1">
          PEMERINTAH KABUPATEN BANYUASIN<br>
          KECAMATAN MUARA SUGIHAN<br>
          DESA DAYA MURNI
        </p>
        <p style="padding:0;margin:0;">Alamat : Jln. Pangeran Diponegoro Desa Daya Murni Muara 
        Sugihan Jalur 16 Kode Pos : 30976</p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <hr style="height:2px;border:none;color:#333;background-color:#333;padding:0;margin:2;" />
        <hr style="height:4px;border:none;color:#333;background-color:#333;padding:0;margin:2;" />
      </td>
    </tr>
  </table>
  <center>
    <p style="margin:0;"><b><u>SURAT KETERANGAN DOMISILI</u></b></p>
  </center>
  <center>
  <?php foreach ($sk as $sk) : ?>
    <p style="margin:0;">Nomor : 01.0<?= $sk->domisili + 1 ?>/DM-SD/<?=$bul?>/<?=$tahun?></p>
    <?php endforeach ?>
  </center>
  <div id=halaman>
    <p>Yang bertanda tangan dibawah ini Kepala Desa Daya Murni menerangkan bahwa :</p>
    <table style="margin-left:20;">
      <?php foreach ($domisili as $index => $data) : ?>
        <tr>
          <td style="width: 30%;">NIK</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b><?= $data->nik ?></b></td>
        </tr>
        <tr>
          <td style="width: 30%;">Nama</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><?= strtoupper($data->nama) ?></td>
        </tr>
        <tr>
          <td style="width: 30%;">Jenis Kelamin</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><?= $data->jenis_kelamin ?></td>
        </tr>
        <tr>
          <td style="width: 30%;">Tempat, tanggal lahir</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><?= ucwords($data->tempat_lahir) . ', ' . date('j F Y', strtotime($data->tgl_lahir)) ?></td>
        </tr>
        <tr>
          <td style="width: 30%; vertical-align: top;">Agama</td>
          <td style="width: 5%; vertical-align: top;">:</td>
          <td style="width: 65%;"><?= $data->agama ?></td>
        </tr>
        <tr>
          <td style="width: 30%; vertical-align: top;">Pekerjaan</td>
          <td style="width: 5%; vertical-align: top;">:</td>
          <td style="width: 65%;"><?= ucwords($data->pekerjaan) ?></td>
        </tr>
        <tr>
          <td style="width: 30%;">Alamat</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><?= ucwords($data->alamat) ?></td>
        </tr>
      <?php endforeach ?>
    </table>
    <p align="justify" style="line-height: 30px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Data Diri Atas, Bahwa yang bersangkutan benar
      penduduk yang berdomisili di Desa Daya Murni Kecamatan Muara Sugihan Kabupaten
      Banyuasin Provinsi Sumatera Selatan dan terdaftar dalam NIK <b><?= $data->nik ?></b>
    </p>
    <p align="justify" style="line-height: 30px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan Domisili ini kami buat 
      dengan sebenarnya untuk digunakan sebagaimana perlunya.
    </p>
    <div style="text-align: right;">Desa Daya Murni, <?= $tgl ?></div><br>
    <div style="text-align: right;">Yang bertanda tangan,</div><br><br><br><br><br>
    <div style="text-align: right;">
    <?php foreach ($kades as $kades) : ?>
      <b><u><?= strtoupper($kades->nama) ?></b></u>
    <?php endforeach ?>
    </div>
  </div>
</body>

</html>