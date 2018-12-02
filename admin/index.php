<!DOCTYPE html>
<html>
    <?php
    session_start();
    if (!isset($_SESSION['admin-logged-in']) || !$_SESSION['admin-logged-in']) {
        header("location:/admin/login.php");
    }

    include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Learning Admin</title>

        <!--jQuery-->
        <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
        <!--Datatable-->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <link rel="stylesheet" href="assets/css/style-index.css">
    </head>
    <body>
        <div id="wrapper">
            <a class="btn blue" href="tambah-soal.php">Tambah Soal</a>
            <a class="btn blue" href="logout.php">Keluar</a>
            <table id="daftar-soal">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Soal</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT id_soal, nama_soal, nama_matpel FROM soal s, matpel m WHERE s.id_matpel = m.id_matpel";
                    if ($result = mysqli_query($connect, $query)) {
                        $no = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo "<tr>";
                            echo "<td>".$no++."</td>";
                            echo "<td>".$row['nama_soal']."</td>";
                            echo "<td>".$row['nama_matpel']."</td>";
                            echo "<td class='align-center'>
                                    <a href='edit.php?id=".$row['id_soal']."' class='btn yellow'>Edit</a>
                                    <a href='remove.php?id=".$row['id_soal']."' class='btn red'>Hapus</a>
                            </td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <script>
            $(document).ready( function () {
                $('#daftar-soal').DataTable();
            } );
            </script>
        </div>
    </body>
</html>