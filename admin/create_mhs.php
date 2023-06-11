<?php
include "..\koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
  <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
  <title>Bootstrap 5.0 Forms Cheatsheet</title>
</head>

<body>
  <div class="container p-5">

    <!-- <h5 class="pb-4">Bootstrap Form Template #1</h5> -->
    <div class="card mx-3 mt-n5 shadow-lg" style="border-radius: 10px; border-left:8px #007bff solid; border-right: none; border-top:none; border-bottom:none">
      <div class="card-body">
        <h4 class="card-title mb-3 text-primary text-uppercase">tambah mahasiswa</h4>

        <form action="controller\aksi_mhs.php" method="post">
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input name="nim" type="text" class="form-control" id="floatingTextInput1" placeholder="John">
                <label for="floatingTextInput1">NIM</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3 ">
                <input name="tanggal_lahir" type="date" class="form-control" id="floatingTextInput2" placeholder="Smith">
                <label for="floatingTextInput2">Tanggal lahir</label>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <input name="nama_mahasiswa" type="text" class="form-control" id="floatingTextInput2" placeholder="name@example.com">
            <label for="floatingTextInput2">Nama</label>
          </div>
          <div class="form-floating mb-3">
            <input name="alamat" type="text" class="form-control" id="floatingTextInput3" placeholder="name@example.com">
            <label for="floatingTextInput3">Alamat</label>
          </div>
          <div class="form-floating mb-3">
            <input name="nama_orang_tua" type="text" class="form-control" id="floatingTextInput4" placeholder="name@example.com">
            <label for="floatingTextInput4">Orang Tua</label>
          </div>
          <div class="row">
            <div class="col mb-3">
              <select name="id_jurusan" class="form-select" id="select_box">
                <option value="">Pilih Jurusan</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM jurusan") or die(mysqli_error($conn));
                while ($data = mysqli_fetch_array($query)) :
                ?>
                  <option value=<?= $data['id_jurusan'] ?>><?= $data['nama_jurusan'] ?> </option>;
                <?php endwhile; ?>
              </select>
            </div>
            <div class="col mb-3">
              <select name="id_angkatan" class="form-select" id="select_box2">
                <option value="">Pilih Angkatan</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM angkatan") or die(mysqli_error($conn));
                while ($data = mysqli_fetch_array($query)) :
                ?>
                  <option value=<?= $data['id_angkatan'] ?>><?= $data['tahun_angkatan'] ?> </option>;
                <?php endwhile; ?>
              </select>
            </div>
          </div>
          <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">I agree to the Terms and Conditions of this Website.</label>
          </div>
          <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
          <a type="button" class="btn btn-danger" href="mahasiswa.php">back</a>
          <?php
          // include('aksi_mhs.php');
          echo @$alert;
          ?>
        </form>
      </div>
    </div>
  </div>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>

</html>
<script>
  var select_box_element = document.querySelector('#select_box');
  var select_box_element2 = document.querySelector('#select_box2');

  dselect(select_box_element, {
    search: true
  });
  dselect(select_box_element2, {
    search: true
  });
</script>