<?php
include "../koneksi.php";

session_start();
if (isset($_SESSION['msg'])) {
    $showmsg = $_SESSION['msg'];
    $_SESSION['msg'] = null;
}
session_write_close();
if (isset($showmsg)) {
    echo "<script>alert('{$showmsg}');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>

    <title>Document</title>
    <style>
        body {
            background: #eee;
        }
    </style>
</head>

<body>
    <?php include('includes\navbar.php'); ?>
    <main>
        <div class="container mt-3">


            <div class="card mb-3 p-3">
                <form action="controller\user_mhs_controller.php" method="post" class="row g-3 needs-validation " novalidate>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Nama Mahasiswa</label>
                        <select name="nama_mahasiswa" id="select_box" class="form-select" id="validationCustom04" required>
                            <option  selected disabled value="">Pilih</option>
                            <?php
                            $query = mysqli_query($conn, "SELECT DISTINCT nama_mahasiswa FROM mahasiswa,user WHERE mahasiswa.nama_mahasiswa NOT IN (SELECT nama FROM user)") or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($query)) :
                            ?>
                                <option value=<?= $data['nama_mahasiswa'] ?>><?= $data['nama_mahasiswa'] ?> </option>;
                            <?php endwhile; ?>
                        </select>
                        <div class="invalid-feedback">
                            Dipilih dulu cuyy
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input name="username" type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Isikan Usernamenya cuyy
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom02" class="form-label">Password</label>
                        <input type="password" class="form-control" id="validationCustom02" name="password" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-3  d-flex align-items-end justify-content-end">
                        <button name="simpan" class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>

            <div class="card shadow ">
                <div class="card-body">
                    <h4 class="card-title">Data Mahasiswa</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $mhs = mysqli_query($conn, "SELECT * FROM user");
                            while ($data = mysqli_fetch_array($mhs)) :
                            ?>
                                <tr>
                                    <td data-title="No"><?= $no++ ?></td>
                                    <td data-title="Nama"><?= $data['nama'] ?></td>
                                    <td data-title="Username"><?= $data['username'] ?></td>
                                    <td data-title="Role"><?php 
                                        if($data['role']==1){
                                            echo "Admin";
                                        }elseif($data['role']==2){
                                            echo "Dosen";
                                        }elseif($data['role']==3){
                                            echo "Mahasiswa";
                                        }else{
                                            echo "NA";
                                        }
                                    ?></td>
                                    <td data-title="aksi">
                                        <a href="edit_mhs.php?id=<?= $data['id_user']; ?>" class="btn btn-success text-white mb-2">Edit</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_user'] ?>">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>


                                <!-- Modal -->
                                <div class="modal fade" id="hapus<?= $data['id_mahasiswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">PERINGATAN !</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin menghapus data <?= $data['nama_mahasiswa'] ?>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                <a href="controller\aksi_mhs.php?hapus=<?= $data['id_mahasiswa']; ?>" class="btn btn-danger mb-2">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<script>
    var select_box_element = document.querySelector('#select_box');
    dselect(select_box_element, {
        search: true
    });
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>