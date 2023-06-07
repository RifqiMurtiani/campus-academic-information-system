<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Drop Down Sidebar Menu | CodingLab</title>
    <link rel="stylesheet" href="dashboard_style.css" />
    <link rel="stylesheet" href="admin\style\mhs.css" />
    <link
      rel="stylesheet"
      href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans"
    />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <?php include('admin\includes\sidebar.php'); ?>

    <section class="home-section">
      <div class="home-content">
        <i class="bx bx-menu"></i>
        <span class="text">Drop Down Sidebar</span>
      </div>

      <!-- ############################### TAMBAH ############################### -->
      <div
        class="modal fade"
        id="modalTambah"
        tabindex="-1"
        aria-labelledby="modalTambah"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Tambah Mahasiswa
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form action="admin\aksi_mhs.php" class="form" method="post">
                <div class="input-box">
                  <label>NIM</label>
                  <input name="nim" type="text" placeholder="NIM" required />
                </div>
                <div class="input-box">
                  <label>Nama Mahasiswa</label>
                  <input
                  name="nama_mahasiswa"
                    type="text"
                    placeholder="Nama mahasiswa"
                    required
                  />
                </div>
                <div class="column">
                  <div class="input-box">
                    <label>Orang Tua</label>
                    <input
                    name="nama_orang_tua"
                      type="text"
                      placeholder="Nama orang tua"
                      required
                    />
                  </div>
                  <div class="input-box">
                    <label>Tanggal lahir</label>
                    <input
                    name="tanggal_lahir"
                      type="date"
                      placeholder="Tanggal lahir"
                      required
                    />
                  </div>
                </div>
              
                <div class="input-box address">
                  <label>Alamat</label>
                  
                  <div class="column">
                    <input name="alamat" type="text" placeholder="Masukkan Kota" required />
                  </div>
                </div>
                <button name="simpan" type="submit" class="btnmodal">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- ############################### UBAH ############################### -->
      <div
        class="modal fade"
        id="modalUbah"
        tabindex="-1"
        aria-labelledby="modalUbah"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalUbah">
                Detail Mahasiswa
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form action="admin\aksi_mhs.php" class="form" method="post">
              <input type="text" name="id_mahasiswa" id="id_mahasiswa">
                <div class="input-box">
                  <label>NIM</label>
                  <input name="nim" id="nim" type="text" placeholder="NIM"  />
                </div>
                <div class="input-box">
                  <label>Nama Mahasiswa</label>
                  <input
                  name="nama_mahasiswa"
                    type="text"
                    placeholder="Nama mahasiswa"
                    id="nama_mahasiswa"
                  />
                </div>
                <div class="column">
                  <div class="input-box">
                    <label>Orang Tua</label>
                    <input
                    name="nama_orang_tua"
                      type="text"
                      placeholder="Nama orang tua"
                      id="nama_orang_tua"
                    />
                  </div>
                  <div class="input-box">
                    <label>Tanggal lahir</label>
                    <input
                    name="tanggal_lahir"
                      type="date"
                      placeholder="Tanggal lahir"
                      id="tanggal_lahir"
                    />
                  </div>
                </div>
              
                <div class="input-box address">
                  <label>Alamat</label>
                  
                  <div class="column">
                    <input name="alamat" type="text" placeholder="Masukkan Kota" id="alamat" />
                  </div>
                </div>
                <button name="ubah" type="submit" class="btnmodal">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- ############################### HAPUSS ############################### -->
      <div
        class="modal fade"
        id="modalHapus"
        tabindex="-1"
        aria-labelledby="modalHapus"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalHapus">
                Detail Mahasiswa
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form action="admin\aksi_mhs.php" class="form" method="post">
              <input type="hidden" name="id_mahasiswa" id="id_mahasiswa">
              <div class="input-box">
                    <h5 class="text-center">Apakah anda yakin akan menghapus data ini ? <br>
                    <input
                    name="nama_mahasiswa"
                      type="text"
                      placeholder="Nama mahasiswa"
                      id="nama_mahasiswa"
                    />
                  </h5>
                  </div>
                  <div class="modal-footer border-0">
                    <button type="submit" name="hapus" class="btn btn-primary"> Ya </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Keluar </button>

                  </div>
                  
              
              </form>
            </div>
          </div>
        </div>
      </div>


      <div class="main">
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-sm-8">
                  <h2>Data <b>Mahasiswa</b></h2>
                </div>
                <div id="button-add" class="col-sm-5">
                  <button
                    type="button"
                    class="btn btn-info add-new"
                    data-bs-toggle="modal"
                    data-bs-target="#modalTambah"
                  >
                    <i class="fa fa-plus"></i> Add New
                  </button>
                </div>
              </div>
            </div>

            <div id="no-more-tables">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nama Orang Tua</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <?php
                $no = 1;
                $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id_mahasiswa ASC");
                while ($data = mysqli_fetch_array($mhs)) :
                ?>
                <tbody>
                  <tr>
                    <td data-title="No"><?= $no++ ?></td>
                    <td data-title="NIM"><?= $data['nim'] ?></td>
                    <td data-title="Nama"><?= $data['nama_mahasiswa'] ?></td>
                    <td data-title="Tanggal Lahir"><?= $data['tanggal_lahir'] ?></td>
                    <td data-title="Alamat"><?= $data['alamat'] ?></td>
                    <td data-title="Nama Orang Tua"><?= $data['nama_orang_tua'] ?></td>
                    <td style="display:none;"><?= $data['id_mahasiswa'] ?></td>
                    <td data-title="Aksi">
                      
                      <a class="editbtn text-success " 
                        ><i class="material-icons">&#xE254;</i></a
                      >
                      <a class="deletebtn text-danger " 
                        ><i class="material-icons">&#xE872;</i></a
                      >
                    </td>
                  </tr>
                </tbody>
                <?php endwhile; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#modalUbah').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id_mahasiswa').val(data[6]);
                $('#nim').val(data[1]);
                $('#nama_mahasiswa').val(data[2]);
                $('#tanggal_lahir').val(data[3]);
                $('#alamat').val(data[4]);
                $('#nama_orang_tua').val(data[5]);

            });
        });
    </script>
    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#modalHapus').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('.modal-body #id_mahasiswa').val(data[6]);
                $('.modal-body #nama_mahasiswa').val(data[2]);
                
                

                
            });
        });
    </script>

    <script>
      let arrow = document.querySelectorAll(".arrow");
      for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
          let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
          arrowParent.classList.toggle("showMenu");
        });
      }
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".bx-menu");
      console.log(sidebarBtn);
      sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });

      function btnAdd(x) {
        if (x.matches) {
          document.getElementById("button-add").className =
            "d-flex align-items-start";
        } else {
          document.getElementById("button-add").className = "col-sm-4";
        }
      }
      var x = window.matchMedia("(max-width: 768px)");
      btnAdd(x);
      x.addListener(btnAdd);
    </script>
  </body>
</html>
