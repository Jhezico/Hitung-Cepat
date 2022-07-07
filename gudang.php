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

  if ($jawab_1 > 0 and $jawab_2 > 0) {
    echo "Kecepatan nya adalah " . $jawab_1 . ' km/jam atau ' . $jawab_2 . ' m/menit';
  } else if ($jawab_1 > 0 and $jawab_2 == 0) {
    echo "Kecepatan nya adalah " . $jawab_1 . ' km/jam';
  } else if ($jawab_1 == 0 and $jawab_2 > 0) {
    echo "Kecepatan nya adalah " . $jawab_2 . ' m/menit';
  } else if ($jawab_1 == 0 and $jawab_2 == 0) {
    echo "Tidak Terdefinisi";
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

  if ($jawab_1 > 0 and $jawab_2 > 0) {
    echo "Kecepatan nya adalah " . $jawab_1 . ' m/menit atau ' . $jawab_2 . ' m/detik';
  } else if ($jawab_1 > 0 and $jawab_2 == 0) {
    echo "Kecepatan nya adalah " . $jawab_1 . ' m/menit';
  } else if ($jawab_1 == 0 and $jawab_2 > 0) {
    echo "Kecepatan nya adalah " . $jawab_2 . ' m/detik';
  } else if ($jawab_1 == 0 and $jawab_2 == 0) {
    echo "Tidak Terdefinisi";
  }
}


// Function Global Hitung Kecepatan
function  cekDiKetahuiHari()
{
  if ($_SESSION['hariHitungKecepatan'] != false) {
    return $_SESSION['hariHitungKecepatan'] . ' hari ';
  }
}
function cekDiKetahuiJam()
{
  if ($_SESSION['jamHitungKecepatan'] != false) {
    return $_SESSION['jamHitungKecepatan'] . ' jam ';
  }
}
function cekDiKetahuiMenit()
{
  if ($_SESSION['menitHitungKecepatan'] != false) {
    return $_SESSION['menitHitungKecepatan'] . ' menit ';
  }
}
function cekDiKetahuiDetik()
{
  if ($_SESSION['detikHitungKecepatan'] != false) {
    return $_SESSION['detikHitungKecepatan'] . ' detik ';
  }
}

function diKetahuiHitungKecepatan()
{ ?>
  <h6>Diketahui :</h6>
  <ul>
    <li>Jarak = <b><?php echo $_SESSION['jarakHitungKecepatan'] . ' ' . $_SESSION['satuan2HitungKecepatan'] ?></b></li>
    <li>Waktu = <b><?php echo cekDiKetahuiHari() . cekDiKetahuiJam() . cekDiKetahuiMenit() . cekDiKetahuiDetik() ?></li>
  </ul>
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
  $hari   = $_SESSION['hariHitungKecepatan'];
  $jam    = $_SESSION['jamHitungKecepatan'];
  $menit  = $_SESSION['menitHitungKecepatan'];
  $detik  = $_SESSION['detikHitungKecepatan'];
  // Hari Jam Menit Detik 
  if ($hari >= 0 and $jam >= 0 and $menit >= 0 and $detik >= 0) {
    $_SESSION['waktu'] = $haris + $jams + $menits + $detiks;
    cek();
  }
  // Hari
  else if ($hari >= 0 and $jam == false and $menit == false and $detik == false) {
    $_SESSION['waktu'] = $haris;
    cek();
  }
  // Jam
  else if ($hari == false and $jam >= 0 and $menit == false and $detik == false) {
    $_SESSION['waktu'] = $jams;
    cek();
  }
  // Menit
  else if ($hari == false and $jam == false and $menit >= 0 and $detik == false) {
    $_SESSION['waktu'] = $menits;
    cek();
  }
  // Detik
  else if ($hari == false and $jam == false and $menit  == false and $detik >= 0) {
    $_SESSION['waktu'] = $detiks;
    cek();
  }
  // Jam Menit
  else if ($hari == false and $jam >= 0 and $menit  >= 0 and $detik == false) {
    $_SESSION['waktu'] = $jams + $menits;
    cek();
  }
  // Hari Jam
  else if ($hari >= 0 and $jam >= 0 and $menit  == false and $detik == false) {
    $_SESSION['waktu'] = $jams + $haris;
    cek();
  }
  // Menit Detik
  else if ($hari == false and $jam == false and $menit  >= 0 and $detik >= 0) {
    $_SESSION['waktu'] = $menits + $detiks;
    cek();
  }
  // Hari Menit
  else if ($hari >= 0 and $jam == false and $menit  >= 0 and $detik == false) {
    $_SESSION['waktu'] = $menits + $haris;
    cek();
  }
  // Jam Detik
  else if ($hari == false and $jam >= 0 and $menit  == false  and $detik >= 0) {
    $_SESSION['waktu'] = $jams + $detiks;
    cek();
  }
  // Hari Detik
  else if ($hari >= 0 and $jam == false and $menit == false and $detik >= 0) {
    $_SESSION['waktu'] = $haris + $detiks;
    cek();
  }
  // Hari Jam Menit
  else if ($hari >= 0 and $jam >= 0 and $menit >= 0 and $detik == false) {
    $_SESSION['waktu'] = $haris + $jams + $menits;
    cek();
  }
  // Hari Jam Detik
  else if ($hari >= 0 and $jam >= 0 and $menit == false and $detik >= 0) {
    $_SESSION['waktu'] = $haris + $jams + $detiks;
    cek();
  }
  // Hari Menit Detik
  else if ($hari >= 0 and $jam == false and $menit >= 0  and $detik >= 0) {
    $_SESSION['waktu'] = $haris + $menits + $detiks;
    cek();
  }
  // Jam Menit Detik
  else if ($hari == false and $jam >= 0 and $menit >= 0  and $detik >= 0) {
    $_SESSION['waktu'] = $jams + $menits + $detiks;
    cek();
  } else if ($hari <= -1 or $jam <= -1 or $menit <= -1 or $detik <= -1) {
    echo "Harap masukkan waktu yang valid";
  }
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
