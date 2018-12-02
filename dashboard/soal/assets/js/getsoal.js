var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

var dataSoal;
var jumlahSoal;
var curIdx = 0;
var jumlahJawaban;
var gbest = 0;
var soal;
var curBenar;
var vi = 0;
var nilai = 0;
var idUser;
var pos = Math.floor(Math.random() * (+2 - +0)) + +0;
console.log(pos);

$(document).ready(function() {
    var id = getUrlParameter("id");

    $.ajax({
        url: 'check-session.php',
        success: function (data) {
            idUser = data.trim();
        },
        error: function () {
            window.location = "/dashboard/soal?fl=server-error";
        }
    });

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'get-data-soal.php',
        data: {
            id_soal: id
        },
        success:function(data) {
            console.log(data);
            dataSoal = data;
            $("title").html(data.nama_soal+" - Penditium");
            initSoal();
            getSoal();
            $("#loader").css("display", "none");
        }
    });

    $("#next").on("click", function(){
        getNext();
    });

    $("#submit").on("click", function() {
        getNext();

        $.ajax({
            method: 'post',
            url: "submit.php",
            data: {
                id_soal: id,
                benar: gbest,
                salah: (jumlahSoal-gbest),
                nilai: nilai,
                id_user: idUser
            },
            success: function (data) {
                console.log("Success");
                $(".soal-wrapper").html("<div class='center p-10'><h1>Anda Mendapatkan Nilai</h1><h2>"+nilai+"</h2><a class='btn green' href='/dashboard/achieve.php'>Lihat Nilai</a></div>");
            }
        });
    });
});

function initSoal() {
    $("#title").html(dataSoal.nama_soal);
    $("#matpel").html(dataSoal.nama_matpel);
    jumlahSoal = dataSoal.easy.length;
    jumlahJawaban = dataSoal.easy[0].pilihan_jawaban.length;
    soal = [dataSoal.easy, dataSoal.medium, dataSoal.hard];
}

function nl2br (str, is_xhtml) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function getSoal() {
    $("#soal").html(nl2br(soal[pos][curIdx].pertanyaan));
    $("#jawaban").empty();
    $("#counter").html((curIdx+1)+"/"+jumlahSoal);
    
    for (let i = 0; i < jumlahJawaban; i++) {
        $("#jawaban").append("<label><input type='radio' name='jawaban' value='"+
        soal[pos][curIdx].pilihan_jawaban[i].id_jawaban
        +"'>"+soal[pos][curIdx].pilihan_jawaban[i].jawaban+"</label><br>")

        if (soal[pos][curIdx].pilihan_jawaban[i].benar) {
            curBenar = soal[pos][curIdx].pilihan_jawaban[i].id_jawaban;
        }
    }

    if (curIdx+1 == jumlahSoal) {
        $("#submit").css("display", "initial");
        $("#next").css("display", "none");
    }
}

function getNext() {
    curIdx++;
    var idSelected = $("input[name='jawaban']:checked").val();
    var pbest = 0;
    if (idSelected == curBenar) {
        pbest = 1;
    }
    gbest += pbest;

    if (curIdx < jumlahSoal) {
        vi = 1*vi + 0.5*Math.random()*(pbest-pos) + 1*Math.random()*(gbest-pos);
        pos += vi;
        pos = Math.round(pos);
        if (pos < 0) {
            pos = 0;
        }
        else if (pos > 2) {
            pos = 2;
        }
    
        getSoal();
    }
    else {
        nilai = Math.round(gbest*100.0/jumlahSoal);
        console.log("Nilai : "+nilai);
    }

    //catatan
    console.log("Posisi : "+pos);
    console.log("Pbest : "+pbest);
    console.log("Gbest : "+gbest);
}