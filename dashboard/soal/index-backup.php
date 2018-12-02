<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kerjakan Soal</title>

        <link rel="stylesheet" href="./assets/css/index-style.css">

        <!--jQuery-->
        <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>

        <!--Datatable-->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <div class="inner-wrapper">
            <h1>Kerjakan Soal</h1>
            <table id="list-soal">
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
                    include 'php_connection/connect.php';

                    $query = "SELECT id_soal, nama_soal, nama_matpel FROM soal s, matpel m WHERE s.id_matpel = m.id_matpel";
                    $result = mysqli_query($connect, $query);

                    if ($result) {
                        $i=1;
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo "<tr>";
                            echo "<td>".$i++."</td>";
                            echo "<td>".$row['nama_soal']."</td>";
                            echo "<td>".$row['nama_matpel']."</td>";
                            echo "<td><a href='soal.php?id=".$row['id_soal']."'>Kerjakan</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <script>
        $(document).ready(function () {
           $("#list-soal").DataTable();
        });
        </script>
    </body>
</html>