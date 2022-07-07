<?php
function formatJawabHitungKecepatan($text)
{
  if (strpos($text, ".")) {
    return number_format($text, 2, ",", ".");
  } else {
    return $text;
  }
}

// FUNCTION START HITUNG KECEPATAN SATUAN KM
function hariKeJamSatuanKm()
{
  if ($_SESSION['hariHitungKecepatan'] != false) {
    $hj = $_SESSION['hariHitungKecepatan'] * 24;
    return $hj;
  } else {
    return 0;
  }
}

function jamKeJamSatuanKm()
{
  if ($_SESSION['jamHitungKecepatan'] != false) {
    $jj = $_SESSION['jamHitungKecepatan'];
    return $jj;
  } else {
    return 0;
  }
}

function menitKeJamSatuanKm()
{
  if ($_SESSION['menitHitungKecepatan'] != false) {
    $mj = $_SESSION['menitHitungKecepatan'] / 60;
    return $mj;
  } else {
    return 0;
  }
}

function detikKeJamSatuanKm()
{
  if ($_SESSION['detikHitungKecepatan'] != false) {
    $dj = ($_SESSION['detikHitungKecepatan'] / 60) / 60;
    return $dj;
  } else {
    return 0;
  }
}

function jawabHitungKecepatanKm()
{
  // Km/jam
  $jawab_1 = formatJawabHitungKecepatan(round($_SESSION['jarakHitungKecepatan'] / $_SESSION['waktu'], 2));
  // M/menit
  $j = $_SESSION['jarakHitungKecepatan'] / $_SESSION['waktu'];
  $jawab_2 = formatJawabHitungKecepatan(round(($j * 1000) / 60, 2));

  if ($jawab_1 > 0 and $jawab_2 > 0) { ?>
    <ul>
      <li>Jadi, Kecepatan anda adalah <b><?php echo $jawab_1 ?></b> km/jam atau <b><?php echo $jawab_2 ?></b> m/menit</li>
    </ul>
  <?php
  } else if ($jawab_1 > 0 and $jawab_2 == 0) { ?>
    <ul>
      <li>Jadi, Kecepatan anda adalah <b><?php echo $jawab_1 ?></b> km/jam</li>
    </ul>
  <?php
  } else if ($jawab_1 == 0 and $jawab_2 > 0) { ?>
    <ul>
      <li>Jadi, Kecepatan anda adalah <b><?php echo $jawab_2 ?></b> m/menit</li>
    </ul>
  <?php
  } else if ($jawab_1 == 0 and $jawab_2 == 0) { ?>
    <ul>
      <li>Tidak Terdefinisi</li>
    </ul>
  <?php
  }
}

// FUNCTION END HITUNG KECEPATAN SATUAN KM
// FUNCTION START HITUNG KECEPATAN SATUAN METER
function hariKeMenitSatuanM()
{
  if ($_SESSION['hariHitungKecepatan'] != false) {
    $hj = ($_SESSION['hariHitungKecepatan'] * 24) * 60;
    return $hj;
  } else {
    return 0;
  }
}

function jamKeMenitSatuanM()
{
  if ($_SESSION['jamHitungKecepatan'] != false) {
    $jj = $_SESSION['jamHitungKecepatan'] * 60;
    return $jj;
  } else {
    return 0;
  }
}

function menitKeMenitSatuanM()
{
  if ($_SESSION['menitHitungKecepatan'] != false) {
    $mj = $_SESSION['menitHitungKecepatan'];
    return $mj;
  } else {
    return 0;
  }
}

function detikKeMenitSatuanM()
{
  if ($_SESSION['detikHitungKecepatan'] != false) {
    $dj = ($_SESSION['detikHitungKecepatan'] / 60);
    return $dj;
  } else {
    return 0;
  }
}

function jawabHitungKecepatanM()
{
  //meter/menit
  $jawab_1 = formatJawabHitungKecepatan(round($_SESSION['jarakHitungKecepatan'] / $_SESSION['waktu'], 2));
  // meter/detik
  $j = $_SESSION['jarakHitungKecepatan'] / $_SESSION['waktu'];
  $jawab_2 = formatJawabHitungKecepatan(round($j / 60, 2));

  if ($jawab_1 > 0 and $jawab_2 > 0) { ?>
    <ul>
      <li>Jadi, Kecepatan anda adalah <b><?php echo $jawab_1 ?></b> m/menit atau <b><?php echo $jawab_2 ?></b> m/detik</li>
    </ul>
  <?php
  } else if ($jawab_1 > 0 and $jawab_2 == 0) { ?>
    <ul>
      <li>Jadi, Kecepatan anda adalah <b><?php echo $jawab_1 ?></b> m/menit</li>
    </ul>
  <?php
  } else if ($jawab_1 == 0 and $jawab_2 > 0) { ?>
    <ul>
      <li>Jadi, Kecepatan anda adalah <b><?php echo $jawab_2 ?></b> m/detik</li>
    </ul>
  <?php
  } else if ($jawab_1 == 0 and $jawab_2 == 0) { ?>
    <ul>
      <li>Tidak Terdefinisi</li>
    </ul>
  <?php
  }
}


// Function Global Hitung Kecepatan
function cekDiKetahuiHari()
{
  if ($_SESSION['hariHitungKecepatan'] != false) {
    echo $_SESSION['hariHitungKecepatan'] . ' hari ';
  }
}
function cekDiKetahuiJam()
{
  if ($_SESSION['jamHitungKecepatan'] != false) {
    echo $_SESSION['jamHitungKecepatan'] . ' jam ';
  }
}
function cekDiKetahuiMenit()
{
  if ($_SESSION['menitHitungKecepatan'] != false) {
    echo $_SESSION['menitHitungKecepatan'] . ' menit ';
  }
}
function cekDiKetahuiDetik()
{
  if ($_SESSION['detikHitungKecepatan'] != false) {
    echo $_SESSION['detikHitungKecepatan'] . ' detik ';
  }
}

function diKetahuiHitungKecepatan()
{ ?>
  <br>
  <p>Diketahui :</p>
  <ul>
    <li>Jarak = <b>
        <?php formatAngkaDiketahui($_SESSION['jarakHitungKecepatan']);
        echo  ' ' . $_SESSION['satuan2HitungKecepatan'] ?></b>
    </li>
    <li>Waktu = <b><?php cekDiKetahuiHari() . cekDiKetahuiJam() . cekDiKetahuiMenit() . cekDiKetahuiDetik() ?></b></li>
  </ul>
  <p>Ditanya :</p>
  <ul>
    <li>Kecepatan = ?</li>
  </ul>
  <p>Jawab :</p>
<?php
}

function cek()
{
  if ($_SESSION['satuan2HitungKecepatan'] == "km") {
    diKetahuiHitungKecepatan();
    jawabHitungKecepatanKm();
  } else if ($_SESSION['satuan2HitungKecepatan'] == "meter") {
    diKetahuiHitungKecepatan();
    jawabHitungKecepatanM();
  }
}

function HitungKecepatan($haris, $jams, $menits, $detiks)
{
  $_SESSION['waktu'] = $haris + $jams + $menits + $detiks;
  cek();
}

// FUNCTION FINAL\
function jawabanHitungKecepatan()
{
  if ($_SESSION['jarakHitungKecepatan'] <= 0) {
    // Pengecekan jarak
    echo "Mohon maaf, jarak perjalanan yang anda masukkan tidak valid";
  } else if ($_SESSION['jarakHitungKecepatan'] > 0 and $_SESSION['hariHitungKecepatan'] == false and $_SESSION['jamHitungKecepatan'] == false and $_SESSION['menitHitungKecepatan'] == false and $_SESSION['detikHitungKecepatan'] == false) {
    echo "Mohon masukkan waktu anda";
  } else if ($_SESSION['jarakHitungKecepatan'] > 0 and $_SESSION['hariHitungKecepatan'] <= 00 and $_SESSION['jamHitungKecepatan'] <= 00 and $_SESSION['menitHitungKecepatan'] <= 00 and $_SESSION['detikHitungKecepatan'] <= 00) {
    echo "Mohon masukkan waktu yang benar";
  } else if ($_SESSION['jarakHitungKecepatan'] > 0) {
    if ($_SESSION['satuan2HitungKecepatan'] == "km") {
      // SATUAN KM
      HitungKecepatan(hariKeJamSatuanKm(), jamKeJamSatuanKm(), menitKeJamSatuanKm(), detikKeJamSatuanKm());
    } else if ($_SESSION['satuan2HitungKecepatan'] == "meter") {
      HitungKecepatan(hariKeMenitSatuanM(), jamKeMenitSatuanM(), menitKeMenitSatuanM(), detikKeMenitSatuanM());
    }
  }
}
