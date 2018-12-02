<?php
if (isset($_POST['id_soal'])) {
    include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

    $id_soal = $_POST['id_soal'];

    $data = array();
    $query = "SELECT nama_soal, nama_matpel 
    FROM soal s, matpel m 
    WHERE s.id_matpel = m.id_matpel
    AND s.id_soal = $id_soal";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $data += $row;
    }

    $easy = array();
    $query = "SELECT id_pertanyaan, pertanyaan 
    FROM pertanyaan WHERE id_soal = $id_soal 
    AND jenis = 'easy'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $query = "SELECT id_jawaban, id_pertanyaan, jawaban, benar
            FROM jawaban WHERE id_pertanyaan = ".$row['id_pertanyaan'];
            $res2 = mysqli_query($connect, $query);

            if ($res2) {
                $jwb = array();
                while ($row2 = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
                    $row_jwb = array();
                    foreach ($row2 as $key => $value) {
                        if ($key == "benar") {
                            if ($value == "0") {
                                $row_jwb += [$key => false];
                            }
                            else {
                                $row_jwb += [$key => true];
                            }
                        }
                        else {
                            $row_jwb += [$key => $value];
                        }
                    }

                    array_push($jwb, $row_jwb);
                }

                $row += ["pilihan_jawaban" => $jwb];
            }
            
            array_push($easy, $row);
        }
    }

    $medium = array();
    $query = "SELECT id_pertanyaan, pertanyaan 
    FROM pertanyaan WHERE id_soal = $id_soal 
    AND jenis = 'medium'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $query = "SELECT id_jawaban, jawaban, benar
            FROM jawaban WHERE id_pertanyaan = ".$row['id_pertanyaan'];
            $res2 = mysqli_query($connect, $query);

            if ($res2) {
                $jwb = array();
                while ($row2 = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
                    $row_jwb = array();
                    foreach ($row2 as $key => $value) {
                        if ($key == "benar") {
                            if ($value == "0") {
                                $row_jwb += [$key => false];
                            }
                            else {
                                $row_jwb += [$key => true];
                            }
                        }
                        else {
                            $row_jwb += [$key => $value];
                        }
                    }

                    array_push($jwb, $row_jwb);
                }

                $row += ["pilihan_jawaban" => $jwb];
            }
            
            array_push($medium, $row);
        }
    }

    $hard = array();
    $query = "SELECT id_pertanyaan, pertanyaan 
    FROM pertanyaan WHERE id_soal = $id_soal 
    AND jenis = 'hard'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $query = "SELECT id_jawaban, jawaban, benar
            FROM jawaban WHERE id_pertanyaan = ".$row['id_pertanyaan'];
            $res2 = mysqli_query($connect, $query);

            if ($res2) {
                $jwb = array();
                while ($row2 = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
                    $row_jwb = array();
                    foreach ($row2 as $key => $value) {
                        if ($key == "benar") {
                            if ($value == "0") {
                                $row_jwb += [$key => false];
                            }
                            else {
                                $row_jwb += [$key => true];
                            }
                        }
                        else {
                            $row_jwb += [$key => $value];
                        }
                    }

                    array_push($jwb, $row_jwb);
                }

                $row += ["pilihan_jawaban" => $jwb];
            }
            
            array_push($hard, $row);
        }
    }

    // array_push($data, array("easy" => $easy, "medium" => $medium, "hard" => $hard));
    $data += ["easy" => $easy];
    $data += ["medium" => $medium];
    $data += ["hard" => $hard];

    echo json_encode($data);
}
else {
    header("location:index.html");
}
?>