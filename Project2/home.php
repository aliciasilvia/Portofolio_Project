<!DOCTYPE html>
<html>
    <head>
        <title>Healty Food - Home</title>
        <style>
        .tabel-container {
            display: flex;
            justify-content: center;
        }

        .tabel-home {
            width: 25%;
            border: 1px solid black;
            margin: 10px; /* Atur sesuai kebutuhan Anda */
            text-align:center;
        }

        .tabel-home-container {
            display: flex;
            justify-content: center;
        }

        .tabel-home-container-2 {
            display: flex;
            justify-content: center;
            align:center;
        }
        .tabel-home-2 td{
            border: 1px solid black;
        }
        .tabel-home-2 {
            width: 90%;
            border: 1px solid black;
            text-align:center;
        }

        th, td {
            padding: 10px;
        }

        th{
            background-color:#79ac78;
        }
        tr:nth-child(even) {
            background-color: #DFE8CC;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

    </style>
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
    </head>
    <body>
        <!-- Connection -->
        <?php
            include 'connection.php'
        ?>

        <div class="main-container d-flex">
            <div class="sidebar" id="side_nav">
                <div class="header-box px-4 pt-4 pb-4 d-flex justify-content-between">
                    <h1 class="fs-4"><img src="Icon/HealtyFood.ico" alt="Healthy Food" width="24" height="24" class="d-inline-block align-text-top me-2"><span
                            class="text-black">Healthy Food</span></h1>
                    <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                            class="fal fa-stream"></i></button>
                </div>
                <ul class="list-unstyled px-2">
                    <li class="active"><a href="home.php" class="text-decoration-none px-3 py-2 d-block"><i
                                class="fal fa-home"></i> Home</a></li>
                    <li class=""><a href="performance.php" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
                            Performance</a></li>
                </ul>
            </div>
            <div class="content" style="background:#fff6d6">
                <nav class="navbar navbar-expand-md navbar-light" style="background:#739072">
                    <div class="container-fluid" >
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
                    <h2 class="fs-5" align="center"> HOME</h2>
                    <hr/>
                    <?php
                        $sql = "SELECT 
                                SUM(CASE WHEN status_kerja = 'tetap' THEN 1 ELSE 0 END) AS count_tetap,
                                SUM(CASE WHEN status_kerja = 'tidak tetap' THEN 1 ELSE 0 END) AS count_tidak_tetap
                                FROM performance";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $count_tetap = $row["count_tetap"];
                            $count_tidak_tetap = $row["count_tidak_tetap"];
                    ?>
                            <div class="tabel-container">
                            <table class ="tabel-home">
                                <tr align="center">
                                    <th colspan="2">Jumlah Karyawan</th>
                                </tr>
                                <tr>
                                    <td colspan="2" align="left"><?= date("Y-m-d"); ?></td>
                                </tr>
                                <tr align="left">
                                    <td>Tetap</td>
                                    <td><?= $count_tetap;  ?> </td>
                                </tr>
                                <tr align="left">
                                    <td>Tidak Tetap</td>
                                    <td><?= $count_tidak_tetap; ?> </td>
                                </tr>
                            </table>
                    <?php
                        } else {
                            echo "Error fetching data from the database.";
                        }
            
                        $sql1 = "SELECT 
                                SUM(CASE WHEN status_kerja = 'tetap' AND grade = 'A'  THEN 1 ELSE 0 END) AS count_tetapA,
                                SUM(CASE WHEN status_kerja = 'tetap' AND grade = 'B'  THEN 1 ELSE 0 END) AS count_tetapB,
                                SUM(CASE WHEN status_kerja = 'tetap' AND grade = 'C'  THEN 1 ELSE 0 END) AS count_tetapC,
                                SUM(CASE WHEN status_kerja = 'tetap' AND grade = 'D'  THEN 1 ELSE 0 END) AS count_tetapD,
                                SUM(CASE WHEN status_kerja = 'tidak tetap' AND grade = 'A' THEN 1 ELSE 0 END) AS count_tidak_tetapA,
                                SUM(CASE WHEN status_kerja = 'tidak tetap' AND grade = 'B' THEN 1 ELSE 0 END) AS count_tidak_tetapB,
                                SUM(CASE WHEN status_kerja = 'tidak tetap' AND grade = 'C' THEN 1 ELSE 0 END) AS count_tidak_tetapC,
                                SUM(CASE WHEN status_kerja = 'tidak tetap' AND grade = 'D' THEN 1 ELSE 0 END) AS count_tidak_tetapD
                                FROM performance";

                                $result1 = mysqli_query($con, $sql1);

                        if ($result1) {
                            $row = mysqli_fetch_assoc($result1);
                            $count_tetapA = $row["count_tetapA"];
                            $count_tetapB = $row["count_tetapB"];
                            $count_tetapC = $row["count_tetapC"];
                            $count_tetapD = $row["count_tetapD"];
                    ?>
                            <table class = "tabel-home">
                                <tr align="center">
                                    <th colspan="2">Hasil Performance Karyawan Tetap</th>
                                </tr>
                                <tr>
                                    <td colspan="2" align="left"><?= date("Y"); ?></td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td><?= $count_tetapA;  ?> </td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td><?= $count_tetapB; ?> </td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td><?= $count_tetapC; ?> </td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td><?= $count_tetapD; ?> </td>
                                </tr>
                            </table>
                    <?php
                            } else {
                            echo "Error fetching data for Tetap employees from the database.";
                            }
                        
                            $result2 = mysqli_query($con, $sql1);

                        if ($result2) {
                            $row = mysqli_fetch_assoc($result2);
                            $count_tidak_tetapA = $row["count_tidak_tetapA"];
                            $count_tidak_tetapB = $row["count_tidak_tetapB"];
                            $count_tidak_tetapC = $row["count_tidak_tetapC"];
                            $count_tidak_tetapD = $row["count_tidak_tetapD"];

                    ?>
                            <table class ="tabel-home">
                                <tr align="center">
                                    <th colspan="2">Hasil Performance Karyawan Tidak Tetap</th>
                                </tr>
                                <tr>
                                    <td colspan="2" align="left"><?= date("Y"); ?></td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td><?= $count_tidak_tetapA;  ?> </td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td><?= $count_tidak_tetapB; ?> </td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td><?= $count_tidak_tetapC; ?> </td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td><?= $count_tidak_tetapD; ?> </td>
                                </tr>
                            </table>
                        </div>
                    <?php
                        } else {
                            echo "Error fetching data for Tidak Tetap employees from the database.";
                        }
                    
                            echo "<br><br>";

                        function showtable($con){
                            ?>
                            <h4 align="center">Karyawan Tetap dengan Performance C dan D<br/><?= date("Y"); ?></h4>
                            <div class="tabel-home-container">
                            <p id="currentDate"></p>
                                    <table class="tabel-home-2">
                                        <tr>
                                            <th>Foto</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                        </tr>
                                        <?php 
                                            $sql2 = "SELECT * FROM performance WHERE status_kerja= 'tetap' AND (grade = 'C' OR grade = 'D')";
                                            $result3 = mysqli_query($con,$sql2) or die(mysqli_error($sql2));
                                            if(mysqli_num_rows($result3)>0){
                                                while($data = mysqli_fetch_array($result3)){	
                                        ?>
                                        <tr>
                                                    <td><?= "<img src='image/".$data['foto']."' width='100' height='100' title='".$data['nama']."'/>"; ?></td>
                                                    <td><?= $data['nik'];?></td>
                                                    <td><?= $data['nama']; ?></td>
                                                    <td><?= $data['position']; ?></td>
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
                                <br>
                                <h4 align="center">Karyawan Tidak Tetap dengan Performance C dan D<br/><?= date("Y"); ?></h4>
                                <div class="tabel-home-container-2">
                                    <p id="currentDate"></p>
                                        <table class="tabel-home-2">
                                            <tr>
                                                <th>Foto</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Posisi</th>
                                            </tr>

                                            <?php 
                                                $sql2 = "SELECT * FROM performance WHERE status_kerja= 'tidak tetap' AND (grade = 'C' OR grade = 'D')";
                                                $result3 = mysqli_query($con,$sql2) or die(mysqli_error($sql2));
                                                if(mysqli_num_rows($result3)>0){
                                                    while($data = mysqli_fetch_array($result3)){	
                                            ?>
                                                        <tr>
                                                            <td><?= "<img src='image/".$data['foto']."' width='100' height='100' title='".$data['nama']."'/>"; ?></td>
                                                            <td><?= $data['nik'];?></td>
                                                            <td><?= $data['nama']; ?></td>
                                                            <td><?= $data['position']; ?></td>
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
                            
                            showtable($con);            
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
    </body>
</html>