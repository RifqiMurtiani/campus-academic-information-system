<?php
include "../koneksi.php";
// include("controller/aksi_mhs.php");

// $update = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$_GET[id]'");
$data = mysqli_fetch_array($query);
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
                <h4 class="card-title mb-3 text-primary text-uppercase">edit mahasiswa</h4>

                <form action="controller/user_mhs_controller.php" method="post">
                    
                    <div class="form-floating mb-3">
                        <input name="id_user" type="hidden" class="form-control" id="floatingTextInput2" placeholder="name@example.com" value="<?php echo $data['id_user'] ?>">
                        <input name="nama" type="text" class="form-control" id="floatingTextInput2" placeholder="name@example.com" value="<?php echo $data['nama'] ?>">
                        <label for="floatingTextInput2">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control" id="floatingTextInput3" placeholder="name@example.com" value="<?php echo $data['username'] ?>">
                        <label for="floatingTextInput3">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingTextInput4" placeholder="name@example.com" >
                        <label for="floatingTextInput4">Ganti password</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">I agree to the Terms and Conditions of this Website.</label>
                    </div>
                    <button type="submit" name="ubah" class="btn btn-primary">Submit</button>
                    <a type="button" class="btn btn-danger" href="mahasiswa.php">back</a>
                    <?php
                    echo @$alert; ?>
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