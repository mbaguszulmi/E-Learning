<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'php_connection/connect.php';
    
    $nama_soal = $_POST['nama_soal'];
    $nama_matpel = $_POST['nama_matpel'];
    $pertanyaan = $_POST['pertanyaan'];
    $jenis = $_POST['jenis'];
    $jawaban = $_POST['jawaban'];
    $benar = $_POST['benar'];
    //$id_soal
    //$id_pertanyaan
    
    $query = "SELECT id_matpel FROM matpel WHERE nama_matpel = '$nama_matpel'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $id_matpel = mysqli_fetch_array($result, MYSQLI_ASSOC)['id_matpel'];
        }
        else {
            $query = "INSERT INTO matpel(nama_matpel) VALUES('$nama_matpel');SELECT @id_matpel AS id_matpel";
    
            if (mysqli_multi_query($connect, $query)) {
                do {
                    if ($result = mysqli_store_result($connect)) {
                        $id_matpel = mysqli_fetch_array($result, MYSQLI_ASSOC)['id_matpel'];
                    }
                    mysqli_free_result($result);

                    if (!mysqli_more_results($connect)) {
                        break;
                    }
                } while(mysqli_next_result($connect));
            }
        }

        $query = "INSERT INTO soal(nama_soal, id_matpel) VALUES('$nama_soal', $id_matpel);SELECT @id_soal AS id_soal";
        if (mysqli_multi_query($connect, $query)) {
            do {
                if ($result = mysqli_store_result($connect)) {
                    $id_soal = mysqli_fetch_array($result, MYSQLI_ASSOC)['id_soal'];
                }
                mysqli_free_result($result);

                if (!mysqli_more_results($connect)) {
                    break;
                }
            } while(mysqli_next_result($connect));

            $jmlPertanyaan = count($pertanyaan);
            $jmlJawaban = (int)$_POST['jawaban-per-soal'];
            $curJawaban = 0;

            for ($i=0; $i < $jmlPertanyaan; $i++) { 
                $query = "INSERT INTO pertanyaan(id_soal, pertanyaan, jenis) VALUES ($id_soal, '$pertanyaan[$i]', '$jenis[$i]');SELECT @id_pertanyaan AS id_pertanyaan";

                if (mysqli_multi_query($connect, $query)) {
                    do {
                        if ($result = mysqli_store_result($connect)) {
                            $id_pertanyaan = mysqli_fetch_array($result, MYSQLI_ASSOC)['id_pertanyaan'];
                        }
                        mysqli_free_result($result);

                        if (!mysqli_more_results($connect)) {
                            break;
                        }
                    } while(mysqli_next_result($connect));

                    for ($j=$curJawaban; $j < $curJawaban+$jmlJawaban; $j++) {
                        if ($benar[$i] == (string)$j) {
                            $kebenaran = '1';
                        }
                        else {
                            $kebenaran = '0';
                        }
                        $query = "INSERT INTO jawaban(id_pertanyaan, jawaban, benar) VALUES ($id_pertanyaan, '$jawaban[$j]', $kebenaran)";
                        $result = mysqli_query($connect, $query);
                        
                        if (!$result) {
                            die('Unable to insert');
                        }
                    }
    
                    $curJawaban+=$jmlJawaban;
                }
                else {
                    die('Unable to insert');
                }
            }
        }
        else {
            die('Unable to insert');
        }
    }

    mysqli_close($connect);
}
else {
    echo $_SERVER['REQUEST_METHOD'];
}
?>