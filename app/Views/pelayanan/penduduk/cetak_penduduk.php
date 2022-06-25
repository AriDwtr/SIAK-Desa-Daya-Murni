<?php
$tahun = date("Y");
function getRomawi($bln)
{
  switch ($bln) {
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
function tgl_indo($tanggal)
{
  $bulan = array(
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

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
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
    }

    table {
      border-collapse: separate;
      border-spacing: 2px 0.2rem;
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
  <div id=halaman>
    <?php foreach ($penduduk as $penduduk) : ?>
      <div style="float:right;">
        <table>
          <tbody>
            <tr>
              <td style="width: 30%;">Kelurahan</td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;"><?= ucwords($penduduk->kelurahan) ?></td>
            </tr>
            <tr>
              <td style="width: 30%;">Kecamatan</td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;"><?= ucwords($penduduk->kecamatan) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div style="float:left;">
        <table>
          <tbody>
            <tr>
              <td style="width: 30%;">Nomor Kartu Keluarga</td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;"><b><?= $penduduk->no_kk ?></b></td>
            </tr>
            <tr>
              <td style="width: 30%;">Alamat</td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;"><?= ucwords($penduduk->alamat) ?></td>
            </tr>
            <tr>
              <td style="width: 30%;">RT / RW</td>
              <td style="width: 5%;">:</td>
              <td style="width: 65%;"><?= ucwords($penduduk->rtrw) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    <?php endforeach ?>
    <div style="clear: left;">
      <table border="1px" style="width:100%;">
        <tr>
          <th style="width:3%;">No</th>
          <th style="width:20%;">Nama Lengkap</th>
          <th style="width:20%;">NIK</th>
          <th style="width:20%;">Tempat ,TGL Lahir</th>
          <th style="width:10%;">Jenis Kelamin</th>
          <th style="width:10%;">Agama</th>
          <th style="width:10%;">Pekerjaan</th>
          <th style="width:7%;">Status</th>
        </tr>
        <?php
        $no = 1;
        foreach ($ayah as $ayah) :
        ?>
          <tr>
            <td>
              <center><?= $no ++ ?></center>
            </td>
            <td>
              <center><b><?= ucwords($ayah->nama_ayah) ?></b></center>
            </td>
            <td>
              <center><b><?= $ayah->nik_ayah ?></b></center>
            </td>
            <td>
              <center><?= ucwords($ayah->tempat_lahir_ayah) . ', ' . date('j F Y', strtotime($ayah->tgl_lahir_ayah)) ?>
            </td>
            <td>
              <center><?= $ayah->jenis_kelamin_ayah ?></center>
            </td>
            <td>
              <center><?= $ayah->agama_ayah ?></center>
            </td>
            <td>
              <center><?= $ayah->pekerjaan_ayah ?></center>
            </td>
            <td>
              <center>Suami</center>
            </td>
          </tr>
          <?php foreach ($ibu as $ibu) : ?>
            <tr>
              <td>
                <center><?= $no ++ ?></center>
              </td>
              <td>
                <center><b><?= ucwords($ibu->nama_ibu) ?></b></center>
              </td>
              <td>
                <center><b><?= $ibu->nik_ibu ?></b></center>
              </td>
              <td>
                <center><?= ucwords($ibu->tempat_lahir_ibu) . ', ' . date('j F Y', strtotime($ibu->tgl_lahir_ibu)) ?>
              </td>
              <td>
                <center><?= $ibu->jenis_kelamin_ibu ?></center>
              </td>
              <td>
                <center><?= $ibu->agama_ibu ?></center>
              </td>
              <td>
                <center><?= $ibu->pekerjaan_ibu ?></center>
              </td>
              <td>
                <center>Istri</center>
              </td>
            </tr>
          <?php endforeach ?>
          <?php foreach ($anak as $anak) : ?>
            <tr>
              <td>
                <center><?= $no ++ ?></center>
              </td>
              <td>
                <center><b><?= ucwords($anak->nama_anak) ?></b></center>
              </td>
              <td>
                <center><b><?= $anak->nik_anak ?></b></center>
              </td>
              <td>
                <center><?= ucwords($anak->tempat_lahir_anak) . ', ' . date('j F Y', strtotime($anak->tgl_lahir_anak)) ?>
              </td>
              <td>
                <center><?= $anak->jenis_kelamin_anak ?></center>
              </td>
              <td>
                <center><?= $anak->agama_anak ?></center>
              </td>
              <td>
                <center><?= $anak->pekerjaan_anak ?></center>
              </td>
              <td>
                <center>Anak</center>
              </td>
            </tr>
          <?php endforeach ?>

        <?php endforeach ?>
      </table>
      <br>
      <div style="text-align: right;">Desa Daya Murni, <?= $tgl ?></div><br>
      <div style="text-align: right;">Yang bertanda tangan,</div><br><br><br><br><br>
      <div style="text-align: right;">
        <?php foreach ($kades as $kades) : ?>
          <b><u><?= strtoupper($kades->nama) ?></b></u>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</body>

</html>