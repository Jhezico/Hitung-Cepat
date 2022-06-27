<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="assets/js/popper.min.js" crossorigin="anonymous"></script>
  <script src="assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <title>Perhitungan Rumus</title>
</head>

<body>
  <nav class="navbar navbar-expand-xxl bg-warning">
    <div class="container-fluid">
      <h2><a href="index.php" class="text-decoration-none text-dark">Hitung Cepat</a></h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse font-nav" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 font-hp">
          <li class="nav-item">
            <a class="nav-link active" href="https://jhezico.github.io/Profile-Zico-1/">About Me</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <form action="" method="GET" class="pt-3">
    <p class="mx-3 my-2">Silahkan pilih menu dibawah ini :</p>
    <div class="form-floating my-2 mx-3">
      <div class="input-group">
        <select class="form-select" name="menu" id="floatingSelectGrid">
          <option>Hitung Jarak</option>
          <option>Hitung Waktu</option>
          <option>Hitung Kecepatan</option>
        </select>
        <input type="submit" name="cari" value="Cari" class="btn btn-warning">
      </div>
    </div>
  </form>
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
            <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="jarak" required style="max-width: 150px;">
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
            <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="waktu" required style="max-width: 150px;">
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

        <input type="submit" name="submit" value="Hitung" class="btn btn-warning" style="font-size: 12px;">
      </form>
      <br>

      <div class="px-3">
        <?php
        if (isset($_POST['submit'])) {
          $kecepatan  = $_POST['jarak'];
          $waktu      = $_POST['waktu'];
          $satuan_1   = $_POST['satuan_1'];
          $satuan_2   = $_POST['satuan_2'];

          if ($satuan_1 == "km/jam" and $satuan_2 == "Jam") {
            if ($kecepatan < 0 or $waktu < 0) {
              echo "Angka Yang Anda Masukkan Salah";
            } else {
              $hasil_km_1 = $kecepatan * $waktu;
              $hasil_m_1 = $hasil_km_1 * 1000;
        ?>
              <h6>Diketahui : </h6>
              <ul>
                <li>Kecepatan = <b><?php echo $kecepatan ?> km/jam</b></li>
                <li>Waktu = <b><?php echo $waktu ?></b> jam</li>
              </ul>
              <h6>Ditanya :</h6>
              <ul>
                <li>Jarak = ?</li>
              </ul>
              <h6>Jawab :</h6>
              <ul>
                <li>Jadi, jarak yang ditempuh adalah <span class="fw-bold"><?php echo number_format($hasil_km_1) ?></span> km atau <span class="fw-bold"><?php echo number_format($hasil_m_1) ?></span> m</li>
              </ul>
            <?php
            }
          } else if ($satuan_1 == "m/menit" and $satuan_2 == "Menit") {
            if ($kecepatan < 0 or $waktu < 0) {
              echo "Angka Yang Anda Masukkan Salah";
            } else {
              $hasil_m_1 = ($kecepatan) * ($waktu);
              $hasil_km_1 = $hasil_m_1 / 1000;
            ?>
              <h6>Diketahui : </h6>
              <ul>
                <li>Kecepatan = <b><?php echo $kecepatan ?> m/menit</b></li>
                <li>Waktu = <b><?php echo $waktu ?></b> menit</li>
              </ul>
              <h6>Ditanya :</h6>
              <ul>
                <li>Jarak = ?</li>
              </ul>
              <h6>Jawab :</h6>
              <ul>
                <li>Jadi, jarak yang ditempuh adalah <span class="fw-bold"><?php echo number_format($hasil_m_1) ?><span> m atau <span class="fw-bold"><?php echo round($hasil_km_1, 2) ?></span> km</li>
              </ul>
            <?php
            }
          } else if ($satuan_1 == "km/jam" and $satuan_2 == "Menit") {
            if ($kecepatan < 0 or $waktu < 0) {
              echo "Angka Yang Anda Masukkan Salah";
            } else {
              $hasil_km_1 = $kecepatan * ($waktu / 60);
              $hasil_m_1 = $hasil_km_1 * 1000;
            ?>
              <h6>Diketahui : </h6>
              <ul>
                <li>Kecepatan = <b><?php echo $kecepatan ?> km/jam</b></li>
                <li>Waktu = <b><?php echo $waktu ?></b> menit</li>
              </ul>
              <h6>Ditanya :</h6>
              <ul>
                <li>Jarak = ?</li>
              </ul>
              <h6>Jawab :</h6>
              <ul>
                <li>Jadi, jarak yang ditempuh adalah <span class="fw-bold"><?php echo round($hasil_km_1, 1) ?></span> km atau <span class="fw-bold"><?php echo number_format($hasil_m_1) ?></span> m</li>
              </ul>
            <?php
            }
          } else if ($satuan_1 == "m/menit" and $satuan_2 == "Jam") {
            if ($kecepatan < 0 or $waktu < 0) {
              echo "Angka Yang Anda Masukkan Salah";
            } else {
              $hasil_m_1 = $kecepatan * ($waktu * 60);
              $hasil_km_1 = $hasil_m_1 / 1000;
            ?>
              <h6>Diketahui : </h6>
              <ul>
                <li>Kecepatan = <b><?php echo $kecepatan ?> m/menit</b></li>
                <li>Waktu = <b><?php echo $waktu ?></b> jam</li>
              </ul>
              <h6>Ditanya :</h6>
              <ul>
                <li>Jarak = ?</li>
              </ul>
              <h6>Jawab :</h6>
              <ul>
                <li>Jadi, jarak yang ditempuh adalah <span class="fw-bold"><?php echo number_format($hasil_m_1) ?></span> m atau <span class="fw-bold"><?php echo $hasil_km_1 ?></span> km</li>
              </ul>
        <?php
            }
          }
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
            <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="jarak" required style="max-width: 150px;">
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
            <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="kecepatan" required style="max-width: 150px;">
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
          $jarak      = $_POST['jarak'];
          $kecepatan  = $_POST['kecepatan'];
          $satuan_1   = $_POST['satuan_1'];
          $satuan_2   = $_POST['satuan_2'];

          if ($satuan_1 == "km" and $satuan_2 == "km/jam") {
            if ($jarak <= 0 or $kecepatan <= 0) {
              echo "Angka Yang Anda Masukkan Salah";
            } else {
        ?>
              <p>Diketahui : </p>
              <ul>
                <li>Jarak = <b><?php echo number_format($jarak) . ' km'; ?></b></li>
                <li>Kecepatan = <b><?php echo number_format($kecepatan) . ' km/jam'; ?></b></li>
              </ul>

              <p>Ditanya : </p>
              <ul>
                <li>Waktu = ?</li>
              </ul>
              <?php
              // Rumus "Satuan km dan km/jam"
              $hasil_jam = $jarak / $kecepatan;
              // Cari Hari
              $hari = number_format(floor($hasil_jam / 24));
              $h = floor($hasil_jam / 24);
              // Cari Jam
              $j = ($hasil_jam / 24);
              $jam = floor(($j - $h) * 24);
              // Cari Menit
              $m = (($j - $h) * 24);
              $menit = floor(($m - $jam) * 60);
              // Cari Detik
              $d = (($m - $jam) * 60);
              $detik = round(($d - $menit) * 60, 1);
              //Rumur Mutlak
              if ($hari != 0 and $jam != 0 and $menit != 0 and $detik != 0) {
              ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $jam == 0 and $menit == 0 and $detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li><b><?= "Tidak Terdefinisi"; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $menit == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $menit == 0 and $detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $jam == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0 and $hari == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' hari ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($menit == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php
              }
            }
          } else if ($satuan_1 == "meter" and $satuan_2 == "m/menit") {
            if ($jarak <= 0 or $kecepatan <= 0) {
              echo "Angka Yang Anda Masukkan Salah";
            } else {
              ?>
              <p>Diketahui : </p>
              <ul>
                <li>Jarak = <b><?php echo number_format($jarak) . ' meter'; ?></b></li>
                <li>Kecepatan = <b><?php echo number_format($kecepatan) . ' m/menit'; ?></b></li>
              </ul>

              <p>Ditanya : </p>
              <ul>
                <li>Waktu = ?</li>
              </ul>
              <?php
              // Rumus Satuan meter dan m/menit
              $hasil_menit = $jarak / $kecepatan;
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
              $detik = round(($d - $menit) * 60, 1);
              //Rumur Mutlak
              if ($hari != 0 and $jam != 0 and $menit != 0 and $detik != 0) {
              ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $jam == 0 and $menit == 0 and $detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li><b><?= "Tidak Terdefinisi"; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $menit == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $menit == 0 and $detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $jam == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0 and $hari == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' hari ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($menit == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php
              }
            }
          } else if ($satuan_1 == "km" and $satuan_2 == "m/menit") {
            if ($jarak <= 0 or $kecepatan <= 0) {
              echo "Angka Yang Anda Masukkan Salah";
            } else {
              ?>
              <p>Diketahui : </p>
              <ul>
                <li>Jarak = <b><?php echo number_format($jarak) . ' km'; ?></b></li>
                <li>Kecepatan = <b><?php echo number_format($kecepatan) . ' m/menit'; ?></b></li>
              </ul>

              <p>Ditanya : </p>
              <ul>
                <li>Waktu = ?</li>
              </ul>
              <?php
              // Rumus Satuan km dan m/menit
              $hasil_jam = $jarak / (($kecepatan * 60) / (1000));
              // Cari Hari
              $hari = number_format(floor($hasil_jam / 24));
              $h = floor($hasil_jam / 24);
              // Cari Jam
              $j = ($hasil_jam / 24);
              $jam = floor(($j - $h) * 24);
              // Cari Menit
              $m = (($j - $h) * 24);
              $menit = floor(($m - $jam) * 60);
              // Cari Detik
              $d = (($m - $jam) * 60);
              $detik = round(($d - $menit) * 60, 1);
              //Rumur Mutlak
              if ($hari != 0 and $jam != 0 and $menit != 0 and $detik != 0) {
              ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $jam == 0 and $menit == 0 and $detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li><b><?= "Tidak Terdefinisi"; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $menit == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $menit == 0 and $detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $jam == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0 and $hari == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' hari ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($menit == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php
              }
            }
          } else if ($satuan_1 = "meter" and $satuan_2 = "km/jam") {
            if ($jarak <= 0 or $kecepatan <= 0) {
              echo "Angka Yang Anda Masukkan Salah";
            } else {
              ?>
              <p>Diketahui : </p>
              <ul>
                <li>Jarak = <b><?php echo number_format($jarak) . ' meter'; ?></b></li>
                <li>Kecepatan = <b><?php echo number_format($kecepatan) . ' km/jam'; ?></b></li>
              </ul>

              <p>Ditanya : </p>
              <ul>
                <li>Waktu = ?</li>
              </ul>
              <?php
              // Rumus Satuan meter dan km/jam
              $hasil_menit = $jarak / (($kecepatan * 1000) / 60);
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
              $detik = round(($d - $menit) * 60, 1);
              //Rumur Mutlak
              if ($hari != 0 and $jam != 0 and $menit != 0 and $detik != 0) {
              ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $jam == 0 and $menit == 0 and $detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li><b><?= "Tidak Terdefinisi"; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $menit == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $menit == 0 and $detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $jam == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0 and $hari == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0 and $hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0 and $menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' hari ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($menit == 0 and $jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($detik == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $menit . ' menit '; ?></b></li>
                </ul>
              <?php } else if ($menit == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $jam . ' jam ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($jam == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $hari . ' hari ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
              <?php } else if ($hari == 0) { ?>
                <p>Jawab =</p>
                <ul>
                  <li>Jadi, waktu yang dibutuhkan adalah <b><?= $jam . ' jam ' . $menit . ' menit ' . $detik . ' detik '; ?></b></li>
                </ul>
        <?php
              }
            }
          }
        }
        ?>
      </div>
    <?php
    } else if ($menu == "Hitung Kecepatan") { ?>
      <h1 class="text-center mt-5 alert">Belum buat Function/Algoritma nya Beb😘 masi PUSING!</h1>
    <?php
    }
  } else { ?>
    <h1 class="px-3 py-2 mt-3">Halo, Terima Kasih telah berkunjung di Web Ku</h1>
    <div class="px-3 mt-3 ucapan">
      <p>Halo, nama ku Zico. Aku adalah manusia sekaligus manusia yang membuat web ini.</p>
      <p>Untuk web ini aku buat karena mendapat inspirasi dari seorang youtuber yaitu <a href="https://www.youtube.com/c/DeaAfrizal">Dea Afrizal</a> dari video yang berjudul "Tutorial Implementasi Rumus Matematika Di Python Untuk Pemula"</p>
      <p>Kemudian untuk jawaban dari pertanyaan <b>"Apakah jawaban di web ini dapat dipercaya?"</b> adalah <b>"Iya"</b>Karena aku sudah melakukan uji coba secara intensif pada setiap rumus yang ada di web ini dan akurasi benar nya sudah mencapai 99%. Dan bila memang kalian menemukan kesalahkan pada hasil hitungan di web ini, aku sangat berharap kalian dapat melaporkan kesalahan tersebut melalui email <b>jhezico@gmail.com</b>. Karena laporan kalian sangat membantu aku dalam mengembangkan web ini.</p>
      <p>Untuk sekarang memang tampilan web ini masi apa ada nya karena aku masi memfokuskan untuk menambahkan opsi hitung yang lebih lengkap dan akurat.</p>
      <p>Untuk kritik dan saran bisa melalui email <b>jhezico@gmail.com</b>. Kritik dan saran kalian selalu saya tunggu demi kemajuan web ini.</p>
    </div>
  <?php
  }

  ?>

  <footer>
    <div class="all-footer footer-copy bg-warning p-2">
      <small>Copyright &copy; 2022 - Bitung Cepat</small>
    </div>
  </footer>
</body>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href)
  }
</script>

</html>