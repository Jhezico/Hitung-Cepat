<?php

function diKetahuiHitungWaktu()
{
?>
  <p>Diketahui : </p>
  <ul>
    <li>Jarak = <b>
        <?php
        formatAngkaDiketahui($_SESSION['jarakHitungWaktu']);
        echo ' ' . $_SESSION['satuan1HitungWaktu'];
        ?></b></li>
    <li>Kecepatan = <b>
        <?php formatAngkaDiketahui($_SESSION['kecepatanHitungWaktu']);
        echo ' ' . $_SESSION['satuan2HitungWaktu'];
        ?></b></li>
  </ul>

  <p>Ditanya : </p>
  <ul>
    <li>Waktu = ?</li>
  </ul>
  <?php
}

function rumusMutlak($hari, $jam, $menit, $detik)
{
  //Rumur Mutlak
  if ($hari != 0 and $jam != 0 and $menit != 0 and $detik != 0) {
  ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
    </ul>
  <?php } else if ($hari == 0 and $jam == 0 and $menit == 0 and $detik == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li><b><?= "Tidak Terdefinisi"; ?></b></li>
    </ul>
  <?php } else if ($detik == 0 and $menit == 0 and $jam == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari '; ?></b></li>
    </ul>
  <?php } else if ($hari == 0 and $menit == 0 and $detik == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam '; ?></b></li>
    </ul>
  <?php } else if ($detik == 0 and $jam == 0 and $hari == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit '; ?></b></li>
    </ul>
  <?php } else if ($jam == 0 and $hari == 0 and $menit == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $detik . ' detik '; ?></b></li>
    </ul>
  <?php } else if ($detik == 0 and $hari == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit '; ?></b></li>
    </ul>
  <?php } else if ($detik == 0 and $menit == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam '; ?></b></li>
    </ul>
  <?php } else if ($jam == 0 and $hari == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit ' . $detik . ' detik '; ?></b></li>
    </ul>
  <?php } else if ($detik == 0 and $jam == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit '; ?></b></li>
    </ul>
  <?php } else if ($hari == 0 and $menit == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $detik . ' detik '; ?></b></li>
    </ul>
  <?php } else if ($menit == 0 and $jam == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $detik . ' detik '; ?></b></li>
    </ul>
  <?php } else if ($detik == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit '; ?></b></li>
    </ul>
  <?php } else if ($menit == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $detik . ' detik '; ?></b></li>
    </ul>
  <?php } else if ($jam == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
    </ul>
  <?php } else if ($hari == 0) { ?>
    <p>Jawab :</p>
    <ul>
      <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
    </ul>
<?php
  }
}

function formatAngkaHitungWaktu($text)
{
  if (strpos($text, ".00")) {
    return 0;
  } else {
    return number_format($text, 2, ",", ".");
  }
}

function jawabHitungWaktu_1()
{
  if ($_SESSION['satuan1HitungWaktu'] == "km" and $_SESSION['satuan2HitungWaktu'] == "km/jam") {
    if ($_SESSION['jarakHitungWaktu'] <= 0 or $_SESSION['kecepatanHitungWaktu'] <= 0) {
      echo "Angka Yang Anda Masukkan Salah";
    } else {
      diKetahuiHitungWaktu();
      // Rumus "Satuan km dan km/jam"
      $hasil_jam = $_SESSION['jarakHitungWaktu'] / $_SESSION['kecepatanHitungWaktu'];
      // Cari Hari
      $hari = floor($hasil_jam / 24);
      // Cari Jam
      $j = ($hasil_jam / 24);
      $jam = floor(($j - $hari) * 24);
      // Cari Menit
      $m = (($j - $hari) * 24);
      $menit = floor(($m - $jam) * 60);
      // Cari Detik
      $d = (($m - $jam) * 60);
      $detil = number_format(($d - $menit) * 60, 2);
      $detik = (string)$detil;

      if ($detik == "60") {
        $menit = $menit + 1;
      }
      rumusMutlak($hari, $jam, $menit, formatAngkaHitungWaktu($detik));
    }
  }
}

function jawabHitungWaktu_2()
{
  if ($_SESSION['satuan1HitungWaktu'] == "meter" and $_SESSION['satuan2HitungWaktu'] == "m/menit") {
    if ($_SESSION['jarakHitungWaktu'] <= 0 or $_SESSION['kecepatanHitungWaktu'] <= 0) {
      echo "Angka Yang Anda Masukkan Salah";
    } else {
      diKetahuiHitungWaktu();
      // Rumus Satuan meter dan m/menit
      $hasil_menit = $_SESSION['jarakHitungWaktu'] / $_SESSION['kecepatanHitungWaktu'];
      // Cari Hari
      $hari = floor(($hasil_menit / 60) / 24);
      // Cari Jamw
      $j = ($hasil_menit / 60) / 24;
      $jam = floor(($j - $hari) * 24);
      // Cari Menit
      $m = ($j - $hari) * 24;
      $menit = floor(($m - $jam) * 60);
      // Cari Detik 
      $d = ($m - $jam) * 60;
      $detil = number_format(($d - $menit) * 60, 2);
      $detik = (string)$detil;

      if ($detik == "60") {
        $menit = $menit + 1;
      }
      rumusMutlak($hari, $jam, $menit, formatAngkaHitungWaktu($detik));
    }
  }
}

function jawabHitungWaktu_3()
{
  if ($_SESSION['satuan1HitungWaktu'] == "km" and $_SESSION['satuan2HitungWaktu'] == "m/menit") {
    if ($_SESSION['jarakHitungWaktu'] <= 0 or $_SESSION['kecepatanHitungWaktu'] <= 0) {
      echo "Angka Yang Anda Masukkan Salah";
    } else {
      diKetahuiHitungWaktu();
      // Rumus Satuan km dan m/menit
      $hasil_jam = $_SESSION['jarakHitungWaktu'] / (($_SESSION['kecepatanHitungWaktu'] * 60) / (1000));
      // Cari Hari
      $hari = floor($hasil_jam / 24);
      // Cari Jam
      $j = ($hasil_jam / 24);
      $jam = floor(($j - $hari) * 24);
      // Cari Menit
      $m = (($j - $hari) * 24);
      $menit = floor(($m - $jam) * 60);
      // Cari Detik
      $d = (($m - $jam) * 60);
      $detil = number_format(($d - $menit) * 60, 2);
      $detik = (string)$detil;

      if ($detik == "60") {
        $menit = $menit + 1;
      }
      rumusMutlak($hari, $jam, $menit, formatAngkaHitungWaktu($detik));
    }
  }
}

function jawabHitungWaktu_4()
{
  if ($_SESSION['satuan1HitungWaktu'] == "meter" and $_SESSION['satuan2HitungWaktu'] == "km/jam") {
    if ($_SESSION['jarakHitungWaktu'] <= 0 or $_SESSION['kecepatanHitungWaktu'] <= 0) {
      echo "Angka Yang Anda Masukkan Salah";
    } else {
      diKetahuiHitungWaktu();
      // Rumus Satuan meter dan km/jam
      $hasil_menit = $_SESSION['jarakHitungWaktu'] / (($_SESSION['kecepatanHitungWaktu'] * 1000) / 60);
      // Cari Hari
      $hari = floor(($hasil_menit / 60) / 24);
      // Cari Jamw
      $j = ($hasil_menit / 60) / 24;
      $jam = floor(($j - $hari) * 24);
      // Cari Menit
      $m = ($j - $hari) * 24;
      $menit = floor(($m - $jam) * 60);
      // Cari Detik 
      $d = ($m - $jam) * 60;
      $detil = number_format(($d - $menit) * 60, 2);
      $detik = (string)$detil;

      if ($detik == "60") {
        $menit = $menit + 1;
      }
      rumusMutlak($hari, $jam, $menit, formatAngkaHitungWaktu($detik));
    }
  }
}
?>