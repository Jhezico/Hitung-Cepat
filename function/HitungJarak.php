<?php
function DiketahuiHitungJarak()
{
?>
  <div>
    <h6>Diketahui : </h6>
    <ul>
      <li>Kecepatan = <b>
          <?php
          formatAngkaDiketahui($_SESSION['kecepatanHitungJarak']);
          echo ' ' . $_SESSION['satuan1HitungJarak']
          ?></b></li>
      <li>Waktu = <b>
          <?php
          formatAngkaDiketahui($_SESSION['waktuHitungJarak']);
          echo ' ' . $_SESSION['satuan2HitungJarak'] ?></b></li>
    </ul>
    <h6>Ditanya :</h6>
    <ul>
      <li>Jarak = ?</li>
    </ul>
    <h6>Jawab :</h6>
  </div>
  <?php
}

function hitungJarak_1()
{
  return $_SESSION['kecepatanHitungJarak'] * $_SESSION['waktuHitungJarak'];
}
function hitungJarak_2()
{
  return ($_SESSION['kecepatanHitungJarak'] * $_SESSION['waktuHitungJarak']) * 1000;
}
function hitungJarak_3()
{
  return ($_SESSION['kecepatanHitungJarak'] * $_SESSION['waktuHitungJarak']) / 1000;
}
function hitungJarak_4()
{
  return $_SESSION['kecepatanHitungJarak'] * ($_SESSION['waktuHitungJarak'] / 60);
}
function hitungJarak_5()
{
  return $_SESSION['kecepatanHitungJarak'] * ($_SESSION['waktuHitungJarak'] * 60);
}


function jawabHitungJarak_1()
{
  if ($_SESSION['satuan1HitungJarak'] == "km/jam" and $_SESSION['satuan2HitungJarak'] == "Jam") {
    if ($_SESSION['kecepatanHitungJarak'] < 0 or $_SESSION['waktuHitungJarak'] < 0) {
      echo "Angka Yang Anda Masukkan Salah";
    } else {
      DiketahuiHitungJarak();
  ?>
      <ul>
        <li>
          Jadi, jarak yang ditempuh adalah
          <span class="fw-bold"><?= formatAngkaJawaban(hitungJarak_1()) ?></span> km atau
          <span class="fw-bold"><?= formatAngkaJawaban(hitungJarak_2()) ?></span> meter
        </li>
      </ul>
    <?php
    }
  }
}

function jawabHitungJarak_2()
{
  if ($_SESSION['satuan1HitungJarak'] == "m/menit" and $_SESSION['satuan2HitungJarak'] == "Menit") {
    if ($_SESSION['kecepatanHitungJarak'] < 0 or $_SESSION['waktuHitungJarak'] < 0) {
      echo "Angka Yang Anda Masukkan Salah";
    } else {
      DiketahuiHitungJarak();
    ?>
      <ul>
        <li>Jadi, jarak yang ditempuh adalah
          <span class="fw-bold"><?= formatAngkaJawaban(hitungJarak_1()) ?> meter atau</span>
          <span class="fw-bold"><?= formatAngkaJawaban(hitungJarak_3()) ?>km </span>
        </li>
      </ul>
    <?php
    }
  }
}

function jawabHitungJarak_3()
{
  if ($_SESSION['satuan1HitungJarak'] == "km/jam" and $_SESSION['satuan2HitungJarak'] == "Menit") {
    if ($_SESSION['kecepatanHitungJarak'] < 0 or $_SESSION['waktuHitungJarak'] < 0) {
      echo "Angka Yang Anda Masukkan Salah";
    } else {
      DiketahuiHitungJarak();
    ?>
      <ul>
        <li>Jadi, jarak yang ditempuh adalah
          <span class="fw-bold"><?= formatAngkaJawaban(hitungJarak_4()) ?></span> km atau
          <span class="fw-bold"><?= formatAngkaJawaban(hitungJarak_2()) ?></span> meter
        </li>
      </ul>
    <?php
    }
  }
}

function jawabHitungJarak_4()
{
  if ($_SESSION['satuan1HitungJarak'] == "m/menit" and $_SESSION['satuan2HitungJarak'] == "Jam") {
    if ($_SESSION['kecepatanHitungJarak'] < 0 or $_SESSION['waktuHitungJarak'] < 0) {
      echo "Angka Yang Anda Masukkan Salah";
    } else {
      DiketahuiHitungJarak();
    ?>
      <ul>
        <li>Jadi, jarak yang ditempuh adalah
          <span class="fw-bold"><?= formatAngkaJawaban(hitungJarak_5()) ?></span> meter atau
          <span class="fw-bold"><?= formatAngkaJawaban(hitungJarak_3()) ?></span> km
        </li>
      </ul>
<?php
    }
  }
}
