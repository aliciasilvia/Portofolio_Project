<!DOCTYPE html>
<html>
    <head>
        <title>Healthy Food - Performance</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- My CSS -->
        <link rel="stylesheet" href="style1.css">

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

        <link rel="icon" href="Icon/HealtyFood.ico" type="image/x-icon">

        <style>
            .table-view table{
                border-collapse: collapse;
            }
            .table-view table, .table-view th, .table-view td {
                border: 1px solid black;
            }
            input[type="text"]{
                width: 150px; /* Atur lebar yang Anda inginkan */
            }
            input[type="number"]{
                width: 150px; /* Atur lebar yang Anda inginkan */
            }
            input[type="date"]{
                width: 150px; /* Atur lebar yang Anda inginkan */
            }
            input[type="submit"]{
                border: 0px;
                width: 80px; /* Atur lebar yang Anda inginkan */
                background-color: #6CBB3C;
            }
            input[type="reset"]{
                border: 0px;
                width: 80px; /* Atur lebar yang Anda inginkan */
                background-color: #4FC0D0;

            }
            input[type="update"]{
                width: 80px; /* Atur lebar yang Anda inginkan */
            }
            input[type="button"] {
                border: 0px;
                width: 80px; /* Sesuaikan lebar sesuai kebutuhan Anda */
                background-color: #D4181D;
            }
            select {
                width: 150px; /* Atur lebar yang Anda inginkan */
            }
            .table-view tr:nth-child(even) {
            background-color: #DFE8CC;
            }
            .table-view tr:nth-child(odd) {
            background-color: #FFF;
            }
            .table-view th{
                background-color: #79AC78;
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <div class="main-container d-flex">
            <div class="sidebar" id="side_nav">
                <div class="header-box px-4 pt-4 pb-4 d-flex justify-content-between">
                    <h1 class="fs-4"><img src="Icon/HealtyFood.ico" alt="Healthy Food" width="24" height="24" class="d-inline-block align-text-top me-2"><span
                            class="text-black">Healthy Food</span></h1>
                    <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                            class="fal fa-stream"></i></button>
                </div>
                <ul class="list-unstyled px-2">
                    <li class=""><a href="home.php" class="text-decoration-none px-3 py-2 d-block"><i
                                class="fal fa-home"></i> Home</a></li>
                    <li class="active"><a href="performance.php" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
                            Performance</a></li>
                </ul>
            </div>
            <div class="content" style="background:#FFF8D6">
                <nav class="navbar navbar-expand-md navbar-light" style="background:#739072">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between d-md-none d-block">
                         <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
                            <a class="navbar-brand fs-4" href="#"><span class="rounded px-2 py-0 text-white" style="background: #79AC78">HF</span></a>
                        </div>
                        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fal fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#"><img src="image/tamara.jpeg" width="50" height="50" class="rounded-circle"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="dashboard-content px-3 pt-4">
                    <h2 class="fs-5" align="center"> PERFORMANCE</h2>
                    <hr/>
                    <?php
                        //Connection
                        include 'connection.php';

                        //Main
                        if(isset($_GET ['aksi'])){
                            switch ($_GET ['aksi']){
                                case "edit";
                                    edit($con);
                                    view($con);
                                    break;
                                case "hapus";
                                    hapus($con);
                                    break;
                                case "show";
                                    show($con);
                                    view($con);
                                    break;
                                default :
                                    echo "<h3>Aksi <i>".$_GET['aksi']."</i> Belum Tersedia</h3>";
                                    add($con);
                                    view($con);
                            }
                        }
                        else{
                            add($con);
                            view($con);
                        }

                        //Function View
                        include 'connection.php';
                        function view($con) {
                            ?>
                            <br/>
                            <div class="table-view">
                                <table cellspacing="2" align="center" cellpadding="2" width="100%">
                                    <tr align="center">
                                        <th>Tanggal</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Status Kerja</th>
                                        <th>Posisi</th>
                                        <th>Total</th>
                                        <th>Grade</th>
                                        <th>Aksi</th>
                                    </tr>
                                        <?php 
                                            $sql = "SELECT * FROM performance";
                                            $result = mysqli_query($con,$sql) or die(mysqli_error($sql));
                                            if(mysqli_num_rows($result)>0){
                                                while($data = mysqli_fetch_array($result)){	
                                        ?>
                                                    <tr align="center">
                                                        <td><?= date("d M Y",strtotime($data['tgl_penilaian'])); ?></td>
                                                        <td><?= $data['nik']; ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= $data['status_kerja']; ?></td>
                                                        <td><?= $data['position']; ?></td>
                                                        <td><?= $data['total']; ?></td>
                                                        <td><?= $data['grade']; ?></td>
                                                        <td align="center"> 
                                                            <a href="performance.php?aksi=show&nik=<?= $data['nik']; ?>" style="text-decoration: none;">
                                                            <img src='Icon/view.ico' width='20' height='20' title='view'/>
                                                            </a>
                                                            <a href="performance.php?aksi=edit&nik=<?= $data['nik']; ?>" style="text-decoration: none;">
                                                                <img src='Icon/edit.ico' width='20' height='20' title='edit'/>
                                                            </a>
                                                            <a href="performance.php?aksi=hapus&nik=<?= $data['nik']; ?>" style="text-decoration: none;" onclick="return confirm('Yakin Hapus?')">
                                                                <img src='icon/delete.ico' width='20' height='20' title='delete'/>
                                                            </a>
                                                        </td>
                                                    </tr>
                                        <?php 
                                                } 
                                            }
                                            else{
                                        ?>
                                                <tr>
                                                    <td colspan="8" align="center"><i>Data Belum Ada</i></td>
                                                </tr>
                                        <?php
                                            }
                                        ?>
                                </table>
                            </div>
                            <br/><br/>
                            <?php
                        }
                        //Close Function View

                        //Function Add
                        include 'connection.php';
                        function add($con){
                            ?>
                            <div class="table-add" align="center">
                                <form action="" method="POST" enctype="multipart/form-data" name="form">
                                <h6 align="right"><input type="submit" name="insert" value="Simpan"/></h6>
                                <h6 align="right"><input width="100%" type="reset" value="Clear"/></h6>
                                        <table border ="0" cellspacing="2" align="center" cellpadding="1" width="100%">
                                            <tr>
                                                <td><h6><b>Foto  </b></h6></td>
                                                <td colspan="3"><input type="file" accept=".png, .jpg, .jpeg, .jfif, .gif" name="foto" required /></td>
                                            </tr>
                                            <tr rowspan="2">
                                                <td><h6><b>Tanggal Penilaian  </b></h6></td>
                                                <td><input type="date" name="tgl_penilaian" required /></td>
                                                <td><h6><b>Responsibility (30%)</b></h6></td>
                                                <td><input type="number" name="responsibility" id="responsibility" min="0" max="100" required /> (0-100)</td>
                                            </tr>
                                            <tr rowspan="2">
                                                <td><h6><b>NIK  </b></h6></td>
                                                <td><input type="number" name="nik" required></td>
                                                <td><h6><b>Teamwork (30%)</b></h6></td>
                                                <td><input type="number" name="teamwork" id="teamwork" min="0" max="100" required /> (0-100)</td>
                                            </tr>
                                            <tr rowspan="2">
                                                <td><h6><b>Nama  </b></h6></td>
                                                <td><input type="text" name="nama" required /></td>
                                                <td><h6><b>Management Time (40%)</b></h6></td>
                                                <td><input type="number" name="management_time" id="management_time" min="0" max="100" required /> (0-100)</td>
                                            </tr>
                                            <tr>
                                                <td><h6><b>Status Kerja  </b></h6></td>
                                                <td>
                                                    <select name="status_kerja" required>
                                                        <option value="Tetap">Tetap</option>
                                                        <option value="Tidak Tetap">Tidak Tetap</option>
                                                    </select>
                                                </td>
                                                <td><h6><b>Total  </b></h6></td>
                                                <td><input type="number" name="total" id="total" value="0" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><h6><b>Posisi  </b></h6></td>
                                                <td><input type="text" name="position" required /></td>
                                                <td><h6><b>Grade  </b></h6></td>
                                                <td><input type="text" name="grade" id="grade" readonly /></td>
                                            </tr>
                                        </table>
                                </form>
                            </div>
                       
                            <?php
                                if(isset($_POST['insert'])){
                                    //$img	    = $_FILES['foto']['name'];
                                    $nik	    = $_POST['nik'];
                                    $foto 	    = $_FILES['foto']['tmp_name'];
                                    $nama	    = $_POST['nama'];
                                    $status	    = $_POST['status_kerja'];
                                    $posisi	    = $_POST['position'];
                                    $tgl	    = $_POST['tgl_penilaian'];
                                    $respon	    = $_POST['responsibility'];
                                    $teamwork	= $_POST['teamwork'];
                                    $manage	    = $_POST['management_time'];
                                    $total	    = (0.3*$respon)+(0.3*$teamwork)+(0.4*$manage);
                                    if ($total >= 80){
                                        $grade = 'A';
                                    }elseif ($total >= 60){
                                        $grade = 'B';
                                    }elseif ($total >= 40){
                                        $grade = 'C';
                                    }else{
                                        $grade = 'D';
                                    }
                                    $fotonm     = $nama.'-'.uniqid().'.png';
                                    move_uploaded_file($foto, 'image/'.$fotonm);
                                    $sql 	    = "INSERT INTO performance (nik, foto, nama, status_kerja, position, tgl_penilaian,
                                                                            responsibility, teamwork, management_time, total, grade) 
                                                    VALUES ('$nik','$fotonm','$nama','$status','$posisi','$tgl','$respon','$teamwork','$manage',
                                                            '$total','$grade')";
                                    $result     = mysqli_query($con,$sql);
                                    if($result) {
                                        echo '<script>window.location.href = "performance.php";</script>';
                                    }
                                }
                        }
                        //Close Function Add
                    
                        //Function Show
                        include 'connection.php';
                        function show($con){
                            $nik 	= $_GET['nik'];
                            $sql 	= "SELECT * FROM performance WHERE nik='$nik'";
                            $result = mysqli_query($con,$sql);
                            while($data = mysqli_fetch_array($result)){
                            ?>
                                <form action="performance.php" method="POST" enctype="multipart/form-data" name="form">
                                    <h6 align="right"><input type="button" value="Cancel" onclick="window.location.href='performance.php'"/></h6>
                                    <div class="show">
                                        <table border ="0" cellspacing="2" align="center" cellpadding="1" width="100%">
                                            <tr>
                                                <td><h6><b>Foto  </b></h6></td>
                                                <td colspan="3"><?= "<img src='image/".$data['foto']."' width='100' height='100' title='".$data['nama']."'/>"; ?></td>
                                            </tr>
                                            <tr rowspan="2">
                                                <td><h6><b>Tanggal Penilaian  </b></h6></td>
                                                <td><input type="date" name="tgl_penilaian" value="<?= $data['tgl_penilaian']; ?>" readonly /></td>
                                                <td><h6><b>Responsibility (30%)</b></h6></td>
                                                <td><input type="number" name="responsibility" value="<?= $data['responsibility']; ?>" readonly /></td>
                                            </tr>
                                            <tr rowspan="2">
                                                <td><h6><b>NIK  </b></h6></td>
                                                <td><input type="number" name="nik" value="<?= $data['nik']; ?>" readonly /></td>
                                                <td><h6><b>Teamwork (30%)</b></h6></td>
                                                <td><input type="number" name="teamwork" value="<?= $data['teamwork']; ?>" readonly /></td>
                                            </tr>
                                            <tr rowspan="2">
                                                <td><h6><b>Nama  </b></h6></td>
                                                <td><input type="text" name="nama" value="<?= $data['nama']; ?>" readonly /></td>
                                                <td><h6><b>Management Time (40%)</b></h6></td>
                                                <td><input type="number" name="management_time" value="<?= $data['management_time']; ?>" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><h6><b>Status Kerja  </b></h6></td>
                                                <td>
                                                    <select name="status_kerja" readonly>
                                                        <option value="tidak tetap" <?php if ($data['status_kerja'] == 'Tidak Tetap') echo 'selected'; ?>>Tidak Tetap</option>
                                                        <option value="tetap" <?php if ($data['status_kerja'] == 'Tetap') echo 'selected'; ?>>Tetap</option>
                                                    </select>
                                                </td>
                                                <td><h6><b>Total  </b></h6></td>
                                                <td><input type="number" name="total" value="<?= $data['total']; ?>" readonly /></td>
                                            </tr>
                                            <tr>
                                                <td><h6><b>Posisi  </b></h6></td>
                                                <td><input type="text" name="position" value="<?= $data['position']; ?>" readonly /></td>
                                                <td><h6><b>Grade  </b></h6></td>
                                                <td><input type="text" name="grade" value="<?= $data['grade']; ?>" readonly /></td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            <?php
                            }
                        }
                        //Close Function Show

                        //Function Edit
                        function edit($con){
                            include 'connection.php';
                            $nik 	= $_GET['nik'];
                            $sql 	= "SELECT * FROM performance WHERE nik ='$nik'";
                            $result = mysqli_query($con,$sql);
                            while($data = mysqli_fetch_array($result)){
                        ?>
                                <div class="edit">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <h6 align="right"><input type="submit" name="update" value="Simpan"/></h6>
                                        <h6 align="right"><input width="100%" type="reset" value="Clear"/></h6>
                                        <h6 align="right"><input type="button" value="Cancel" onclick="window.location.href='performance.php'"/></h6>
                                            <table border ="0" cellspacing="2" align="center" cellpadding="1" width="100%">
                                                <tr>
                                                    <td><h6><b>Foto  </b></h6></td>
                                                    <input type="hidden" name="old" value="<?= $data['foto']; ?>"/>
                                                    <td colspan="3">
                                                        <?= "<img src='image/".$data['foto']."' width='100' height='100' title='".$data['nama']."'/>"; ?>
                                                        <input type="file" accept=".png, .jpg, .jpeg, .jfif, .gif" name="foto" />
                                                    </td>
                                                </tr>
                                                <tr rowspan="2">
                                                    <td><h6><b>Tanggal Penilaian  </b></h6></td>
                                                    <td><input type="date" name="tgl_penilaian" value="<?= $data['tgl_penilaian']; ?>" required /></td>
                                                    <td><h6><b>Responsibility (30%)</b></h6></td>
                                                    <td><input type="number" name="responsibility" min="0" max="100" id="responsibility" value="<?= $data['responsibility']; ?>" required /> (0-100)</td>
                                                </tr>
                                                <tr rowspan="2">
                                                    <td><h6><b>NIK  </b></h6></td>
                                                    <td><input type="number" name="nik" value="<?= $nik ?>" readonly></td>
                                                    <td><h6><b>Teamwork (30%)</b></h6></td>
                                                    <td><input type="number" name="teamwork" min="0" max="100" id="teamwork" value="<?= $data['teamwork']; ?>" required /> (0-100)</td>
                                                </tr>
                                                <tr rowspan="2">
                                                    <td><h6><b>Nama  </b></h6></td>
                                                    <td><input type="text" name="nama" value="<?= $data['nama']; ?>"required /></td>
                                                    <td><h6><b>Management Time (40%)</b></h6></td>
                                                    <td><input type="number" name="management_time" min="0" max="100" id="management_time" value="<?= $data['management_time']; ?>"required /> (0-100)</td>
                                                </tr>
                                                <tr>
                                                    <td><h6><b>Status Kerja  </b></h6></td>
                                                    <td>
                                                        <select name="status_kerja" required>
                                                            <option value="tidak tetap" <?php if ($data['status_kerja'] == 'Tidak Tetap') echo 'selected'; ?>>Tidak Tetap</option>
                                                            <option value="tetap" <?php if ($data['status_kerja'] == 'Tetap') echo 'selected'; ?>>Tetap</option>
                                                        </select>
                                                    </td>
                                                    <td><h6><b>Total  </b></h6></td>
                                                    <td><input type="number" name="total" id="total" value="<?= $data['total']; ?>" readonly /></td>
                                                </tr>
                                                <tr>
                                                    <td><h6><b>Posisi  </b></h6></td>
                                                    <td><input type="text" name="position" value="<?= $data['position']; ?>" required /></td>
                                                    <td><h6><b>Grade  </b></h6></td>
                                                    <td><input type="text" name="grade" id="grade" value="<?= $data['grade']; ?>" readonly /></td>
                                                </tr>
                                            </table>
                                    </form>
                                </div>
                        <?php
                            }
                                
                            if(isset($_POST['update'])){
                                $nik 				= $_POST['nik'];
                                $ftold			    = $_POST['old'];
                                $ftnew			    = $_FILES['foto']['tmp_name'];
                                $nama 				= $_POST['nama'];
                                $status		        = $_POST['status_kerja'];
                                $posisi 			= $_POST['position'];
                                $tgl 		        = $_POST['tgl_penilaian'];
                                $respon 	        = $_POST['responsibility'];
                                $teamwork	 		= $_POST['teamwork'];
                                $manage	            = $_POST['management_time'];
                                $total	            = (0.3*$respon)+(0.3*$teamwork)+(0.4*$manage);
                                                            if ($total >= 80){
                                                                $grade = 'A';
                                                            }elseif ($total >= 60){
                                                                $grade = 'B';
                                                            }elseif ($total >= 40){
                                                                $grade = 'C';
                                                            }else{
                                                                $grade = 'D';
                                                            }
                                
                                if($ftnew==""){
                                    $sql 	= "UPDATE performance SET 
                                                nama='$nama', 
                                                status_kerja='$status',
                                                position='$posisi',
                                                tgl_penilaian ='$tgl',
                                                responsibility='$respon',
                                                teamwork='$teamwork',
                                                management_time='$manage',
                                                total='$total',
                                                grade='$grade'
                                                WHERE nik='$nik'";
                                    $result = mysqli_query($con,$sql);
                                }
                                else{
                                    unlink('image/'.$ftold);
                                    $loc	= $_FILES['foto']['tmp_name'];
                                    $filenm = $nama.'-'.uniqid().'.png';
                                    move_uploaded_file($loc, 'image/'.$filenm);
                                    $sql 	= "UPDATE performance SET 
                                                foto ='$filenm',
                                                nama='$nama', 
                                                status_kerja='$status',
                                                position='$posisi',
                                                tgl_penilaian ='$tgl',
                                                responsibility='$respon',
                                                teamwork='$teamwork',
                                                management_time='$manage',
                                                total='$total',
                                                grade='$grade'
                                                WHERE nik='$nik'";
                                    $result = mysqli_query($con,$sql);
                                }
                                if($result) {
                                    echo '<script>window.location.href = "performance.php";</script>';
                                }
                                else{
                                    echo "Query Error : ".mysqli_error($con);
                                }
                            }
                        }
                        //Close Function Edit

                        //Function Delete
                        function hapus($con){
                            if(isset($_GET['nik'])){
                                $id		    = $_GET['nik'];
                                $img 	    = $_GET['foto'];
                                
                                unlink('image/'.$img);
                                $sql	=  "DELETE FROM performance WHERE nik='$id'";
                                $result = mysqli_query($con,$sql);
                                if($result) {
                                    echo '<script>window.location.href = "performance.php";</script>';
                                }
                            }
                        }
                        //Close Function Delete
                    ?>
                    </div>
                </div>
            </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <script>
            $(".sidebar ul li").on('click', function () {
                $(".sidebar ul li.active").removeClass('active');
                $(this).addClass('active');
            });

            $('.open-btn').on('click', function () {
                $('.sidebar').addClass('active');

            });


            $('.close-btn').on('click', function () {
                $('.sidebar').removeClass('active');

            });
        </script>

        <script>
            // Fungsi JavaScript untuk menghitung total dan mengubah nilai pada input total dan grade
            function calculateTotalAndGrade() {
                const responsibility = parseFloat(document.getElementById("responsibility").value) || 0;
                const teamwork = parseFloat(document.getElementById("teamwork").value) || 0;
                const managementTime = parseFloat(document.getElementById("management_time").value) || 0;

                const total = (0.3 * responsibility) + (0.3 * teamwork) + (0.4 * managementTime);
                const grade = total >= 80 ? 'A' : (total >= 60 ? 'B' : (total >= 40 ? 'C' : 'D'));

                document.getElementById("total").value = total.toFixed(2);
                document.getElementById("grade").value = grade;
            }

            // Menambahkan event listener untuk setiap input
            const inputElements = document.querySelectorAll("#responsibility, #teamwork, #management_time");
            inputElements.forEach((input) => {
                input.addEventListener("input", calculateTotalAndGrade);
            });

            // Memanggil fungsi calculateTotalAndGrade saat halaman dimuat untuk menginisialisasi nilai
            calculateTotalAndGrade();
        </script>
    </body>
</html>