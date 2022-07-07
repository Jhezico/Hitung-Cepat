<?php
include 'function/HitungJarak.php';
include 'function/HitungWaktu.php';
include 'function/functionGlobal.php';
include 'function/HitungKecepatan.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="assets/spopper.min.js" crossorigin="anonymous"></script>
  <script src="assets/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="assets/jQuery.min.js" crossorigin="anonymous"></script>
  <link href="assets/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <title>Perhitungan Rumus</title>
</head>

<body>
  <nav class="navbar navbar-expand-xxl bg-warning navbar-light">
    <div class="container-fluid">
      <h2><a class="text-decoration-none text-dark" href="index.php">Hitung Cepat</a></h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse font-nav" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 font-hp">
          <form action="" method="GET" class="pt-3" class="d-flex">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Silahkan pilih menu dibawah ini :</a>
              <ul class="dropdown-menu font-hpp" aria-labelledby="navbarDropdown">
                <div class="input-group p-2">
                  <select class="form-select" name="menu" id="floatingSelectGrid">
                    <option>Hitung Jarak</option>
                    <option>Hitung Waktu</option>
                    <option>Hitung Kecepatan</option>
                  </select>
                  <input type="submit" name="cari" value="Kirim" class="btn btn-warning">
                </div>
              </ul>
            </li>
          </form>
          <li class="nav-item">
            <a class="nav-link active" href="https://jhezico.github.io/Profile-Zico-1/">About Me</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  if (isset($_GET['cari'])) {
    $menu = $_GET['menu'];
    if ($menu == "Hitung Jarak") {
  ?>
      <h1 class="px-3 py-2">Hitung Jarak</h1>
      <form action="" method="post" class="px-3">
        </div>
        <div class="input-group mb-3">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="kecepatan" required style="max-width: 150px;" autocomplete="off">
            <label for=" floatingInput" style="font-size: 12px; margin-top: 3px;" class="text-dark">Masukkan kecepatan</label>
          </div>
          <div>
            <div class="form-floating mx-2">
              <select class="form-select" name="satuan_1" id="floatingSelectGrid">
                <option>km/jam</option>
                <option>m/menit</option>
              </select>
              <label for="floatingSelectGrid" class="text-truncate text-dark" style="font-size: 12px;">Pilih Satuan</label>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="waktu" required style="max-width: 150px;" autocomplete="off">
            <label for="floatingInput" style="font-size: 12px; margin-top: 3px;" class="text-dark">Masukkan Waktu</label>
          </div>
          <div>
            <div class="form-floating mx-2">
              <select class="form-select" name="satuan_2" id="floatingSelectGrid">
                <option>Jam</option>
                <option>Menit</option>
              </select>
              <label for="floatingSelectGrid" class="text-truncate text-dark" style="font-size: 12px;">Pilih Satuan</label>
            </div>
          </div>
        </div>
        <input type="submit" name="submit" value="Hitung" class="btn btn-warning" style="font-size: 12px">
      </form>
      <br>
      <div class="px-3">
        <?php
        if (isset($_POST['submit'])) {
          $_SESSION['kecepatanHitungJarak'] = $_POST['kecepatan'];
          $_SESSION['waktuHitungJarak']     = $_POST['waktu'];
          $_SESSION['satuan1HitungJarak']   = $_POST['satuan_1'];
          $_SESSION['satuan2HitungJarak']   = $_POST['satuan_2'];
          // Km/jam dan jam
          jawabHitungJarak_1();
          // meter dan m/menit
          jawabHitungJarak_2();
          // km/jam dan menit
          jawabHitungJarak_3();
          // m/menit dan jam
          jawabHitungJarak_4();
        }
        ?>
      </div>
    <?php
    } else if ($menu == "Hitung Waktu") { ?>
      <h1 class="px-3 py-2">Hitung Waktu</h1>
      <form action="" method="post" class="px-3">
        </div>
        <div class="input-group mb-3">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="jarak" required style="max-width: 150px;" placeholder="name@example.com">
            <label for=" floatingInput" style="font-size: 12px; margin-top: 3px;" class="text-dark">Masukkan Jarak</label>
          </div>
          <div>
            <div class="form-floating mx-2">
              <select class="form-select" name="satuan_1" id="floatingSelectGrid">
                <option>km</option>
                <option>meter</option>
              </select>
              <label for="floatingSelectGrid" class="text-truncate text-dark" style="font-size: 12px;">Pilih Satuan</label>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="kecepatan" required style="max-width: 150px;">
            <label for="floatingInput" style="font-size: 12px; margin-top: 3px;" class="text-dark">Masukkan Kecepatan</label>
          </div>
          <div>
            <div class="form-floating mx-2">
              <select class="form-select" name="satuan_2" id="floatingSelectGrid">
                <option>km/jam</option>
                <option>m/menit</option>
              </select>
              <label for="floatingSelectGrid" class="text-truncate text-dark" style="font-size: 12px;">Pilih Satuan</label>
            </div>
          </div>
        </div>

        <input type="submit" name="submit_waktu" value="Hitung" class="btn btn-warning" style="font-size: 12px;">
      </form>
      <div class="px-3">
        <?php
        if (isset($_POST['submit_waktu'])) {

          $_SESSION['jarakHitungWaktu'] = $_POST['jarak'];
          $_SESSION['kecepatanHitungWaktu'] = $_POST['kecepatan'];
          $_SESSION['satuan1HitungWaktu'] = $_POST['satuan_1'];
          $_SESSION['satuan2HitungWaktu'] = $_POST['satuan_2'];

          // km dan km/jam
          jawabHitungWaktu_1();
          // meter dan meter/menit
          jawabHitungWaktu_2();
          // km dan meter/menit
          jawabHitungWaktu_3();
          // meter dan km/jam
          jawabHitungWaktu_4();
        }
        ?>
      </div>
    <?php
    } else if ($menu == "Hitung Kecepatan") { ?>
      <h1 class="px-3 py-2">Hitung Kecepatan</h1>
      <form action="" method="post" class="px-3">
        <div class="input-group mb-3">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="jarak" required style="max-width: 150px;" autocomplete="off">
            <label for="floatingInput" style="font-size: 12px; margin-top: 3px;" class="text-dark">Masukkan Jarak</label>
          </div>
          <div>
            <div class="form-floating mx-2">
              <select class="form-select" name="satuan_2" id="floatingSelectGrid">
                <option>km</option>
                <option>meter</option>
              </select>
              <label for="floatingSelectGrid" class="text-truncate text-dark" style="font-size: 12px;">Pilih Satuan</label>
            </div>
          </div>
        </div>
        <p>Masukkan Waktu :</p>
        <div class="input-group mb-3">
          <div>
            <p>Hari :</p>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="max-width: 60px;" autocomplete="off" name="hari">
          </div>
          <div>
            <p class="px-2">Jam :</p>
            <input type="text" class="mx-2 form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="max-width: 60px;" autocomplete="off" name="jam">
          </div>
          <div>
            <p>Menit :</p>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="max-width: 60px;" autocomplete="off" name="menit">
          </div>
          <div>
            <p class="px-2">Detik :</p>
            <input type="text" class="mx-2 form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="max-width: 60px;" autocomplete="off" name="detik">
          </div>
        </div>

        <input type="submit" name="submit_kecepatan" value="Hitung" class="btn btn-warning" style="font-size: 12px;">
      </form>
      <div class="px-3">
      <?php
      if (isset($_POST['submit_kecepatan'])) {
        $_SESSION['hariHitungKecepatan'] = $_POST['hari'];
        $_SESSION['jamHitungKecepatan'] = $_POST['jam'];
        $_SESSION['menitHitungKecepatan'] = $_POST['menit'];
        $_SESSION['detikHitungKecepatan'] = $_POST['detik'];
        $_SESSION['jarakHitungKecepatan'] = $_POST['jarak'];
        $_SESSION['satuan2HitungKecepatan'] = $_POST['satuan_2'];
        jawabanHitungKecepatan();
      }
    }
      ?>
      </div>
    <?php
  } else { ?>
      <h1 class="px-3 py-2 mt-3">Halo, Terima Kasih telah berkunjung di Web Ku</h1>
      <div class="px-3 mt-3 ucapan">
        <p>Halo, nama ku Zico. Aku adalah manusia sekaligus manusia yang membuat web ini.</p>
        <p>Untuk web ini aku buat karena mendapat inspirasi dari seorang youtuber yaitu <a href="https://www.youtube.com/c/DeaAfrizal">Dea Afrizal</a> dari video yang berjudul "Tutorial Implementasi Rumus Matematika Di Python Untuk Pemula"</p>
        <p>Kemudian untuk jawaban dari pertanyaan <b>"Apakah jawaban di web ini dapat dipercaya?"</b> adalah <b>"Iya"</b>Karena aku sudah melakukan uji coba secara intensif pada setiap rumus yang ada di web ini dan akurasi benar nya sudah mencapai 99%. Dan bila memang kalian menemukan kesalahkan pada hasil hitungan di web ini, aku sangat berharap kalian dapat melaporkan kesalahan tersebut melalui email <b>jhezico@gmail.com</b>. Karena laporan kalian sangat membantu aku dalam mengembangkan web ini.</p>
        <p>Untuk sekarang memang tampilan web ini masih apa ada nya karena aku masi memfokuskan untuk menambahkan opsi hitung yang lebih lengkap dan akurat.</p>
        <p>Untuk kritik dan saran bisa melalui email <b>jhezico@gmail.com</b>. Kritik dan saran kalian selalu saya tunggu demi kemajuan web ini.</p>
      </div>
    <?php
  }

    ?>
    <footer>
      <div class="all-footer footer-copy p-2 mx-2">
        <small>Copyright &copy; 2022 - Hitung Cepat</small>
      </div>
    </footer>

</body>
<script>
  $(function() {
    var pastValue, pastSelectionStart, pastSelectionEnd;

    $("input").on("keydown", function() {
      pastValue = this.value;
      pastSelectionStart = this.selectionStart;
      pastSelectionEnd = this.selectionEnd;
    }).on("input propertychange", function() {
      var regex = /^[0-9]+\.?[0-9]*$/;

      if (this.value.length > 0 && !regex.test(this.value)) {
        this.value = pastValue;
        this.selectionStart = pastSelectionStart;
        this.selectionEnd = pastSelectionEnd;
      }
    });
  });
</script>


<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href)
  }
</script>

</html>