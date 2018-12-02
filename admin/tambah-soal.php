<!DOCTYPE html>
<html>
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Soal</title>

        <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>
              
        <link rel="stylesheet" href="assets/css/style-soal.css">
    </head>

    <body>
        <div id="wrapper">
            <h1>Tambah Soal</h1>
            <form action="add_soal.php" method="POST" autocomplete="off">
                <input type="text" name="nama_soal" placeholder="Nama Soal" required>
                <input type="text" name="nama_matpel" placeholder="Nama Mata Pelajaran" list="matpel-list" required>
                <datalist id="matpel-list">
                    <?php
                    $query = "SELECT nama_matpel FROM matpel";
                    if ($result = mysqli_query($connect, $query)) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $res = $row['nama_matpel'];
                            echo "<option value='$res'></option>";
                        }
                    }
                    ?>
                </datalist>
                <div id="soal-adder">
                    <table>
                        <tr>
                            <td>Jumlah soal</td>
                            <td>Jumlah jawaban per soal</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="number" min="1" value="1" id="jumlah-soal" placeholder="Jumlah soal"></td>
                            <td><input type="number" min="1" value="1" id="jawaban-per-soal" name="jawaban-per-soal" placeholder="Jawaban per-soal"></td>
                            <td><button id="set-jumlah-soal-btn" class="btn blue">Tambah</button></td>
                        </tr>
                    </table>
                </div>
                <div id="soal">

                </div>
                <input type="submit" value="Submit">
            </form>

            <script>
            $(document).ready(function () {
                $("#set-jumlah-soal-btn").on("click", function (event) {
                    event.preventDefault();
                    var jumlah = $("#jumlah-soal").val();
                    var jumlJawaban = 0;
                    var curSoal = 1;
                    var jmlJwb = $("#jawaban-per-soal").val();
                    
                    if (jumlah.length != 0 && jmlJwb.length != 0) {
                        jumlah = parseInt(jumlah);
                        jmlJwb = parseInt(jmlJwb);

                        for (let i = 0; i < jumlah*3; i++) {
                            $("#soal").append("<h3>Soal "+(curSoal)+" easy</h3>");
                            $("#soal").append("<textarea class='form-control pertanyaan' name='pertanyaan["+i+"]' placeholder='Masukkan Soal..' rows='3' required></textarea>");
                            $("#soal").append("<input type='hidden' name='jenis["+i+"]' value='easy'>");
                            for (let j = 0; j < jmlJwb; j++) {
                                var jawaban = "<table class='full-width'><tr><td class='align-center'><input type='radio' name='benar["+i+"]' value='"+jumlJawaban+"' required></td><td><input type='text' name='jawaban["+(jumlJawaban++)+"]' placeholder='Masukkan jawaban...' required></td></tr></table>"
                                $("#soal").append(jawaban);
                            }
                            
                            i++;
                            $("#soal").append("<h3>Soal "+(curSoal)+" medium</h3>");
                            $("#soal").append("<textarea class='form-control pertanyaan' name='pertanyaan["+i+"]' placeholder='Masukkan Soal..' rows='3' required></textarea>");
                            $("#soal").append("<input type='hidden' name='jenis["+i+"]' value='medium'>");
                            for (let j = 0; j < jmlJwb; j++) {
                                var jawaban = "<table class='full-width'><tr><td class='align-center'><input type='radio' name='benar["+i+"]' value='"+jumlJawaban+"' required></td><td><input type='text' name='jawaban["+(jumlJawaban++)+"]' placeholder='Masukkan jawaban...' required></td></tr></table>"
                                $("#soal").append(jawaban);
                            }
                            
                            i++;
                            $("#soal").append("<h3>Soal "+(curSoal)+" hard</h3>");
                            $("#soal").append("<textarea class='form-control pertanyaan' name='pertanyaan["+i+"]' placeholder='Masukkan Soal..' rows='3' required></textarea>");
                            $("#soal").append("<input type='hidden' name='jenis["+i+"]' value='hard'>");
                            for (let j = 0; j < jmlJwb; j++) {
                                var jawaban = "<table class='full-width'><tr><td class='align-center'><input type='radio' name='benar["+i+"]' value='"+jumlJawaban+"' required></td><td><input type='text' name='jawaban["+(jumlJawaban++)+"]' placeholder='Masukkan jawaban...' required></td></tr></table>"
                                $("#soal").append(jawaban);
                            }

                            curSoal++;
                        }

                        $("#soal-adder").css("display", "none");
                    }
                });
            });
            </script>
        </div>
    </body>
</html>