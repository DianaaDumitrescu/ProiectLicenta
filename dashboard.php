<?php
session_start();
include "header.php";
if(!isset($_SESSION["username"]))
{ 
    ?>
<script type="text/javascript">
    window.location="login.php";
    </script>
 <?php
}
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <!-- start editare -->

        <br>
        <div class="row">
            <br>
            <div class="rocol-lg-2 col-lg-push-10">

                <div id="curent_int" style="float:left">0</div>
                <div style="float:left">/</div>
                <div id="total_int" style="float:left">0</div>
            </div>

            <div class="row" style="margin-top: 30px">
                <div class="row">
                    <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color: white"
                        id="incarcare_intrebari"></div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-lg-6  col-lg-push-3" style="min-height: 50px">
                    <div class="col-lg-12  text-center">
                        <input type="button" class="btn btn-warning" value="înapoi" onclick="incarca_anterior();">&nbsp;
                        <input type="button" class="btn btn-success" value="Următoarea"
                            onclick="incarca_urmator();">&nbsp;
                    </div>
                </div>

            </div>
        </div>
        <!-- sfarsit editare -->


    </div>
</div>

<script type="text/javascript">
    function incarcare_total_int() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_int").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/incarcare_total_int.php", true);
        xmlhttp.send(null);
    }

    var intrebarenr = '1';
    incarcare_intrebari(intrebarenr);

    function incarcare_intrebari(intrebarenr) {
        document.getElementById("curent_int").innerHTML = intrebarenr;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "Finalizat") {
                    window.location = "rezultat.php";
                }
                else {
                    document.getElementById("incarcare_intrebari").innerHTML = xmlhttp.responseText;
                    incarcare_total_int();
                }
            }
        };
        xmlhttp.open("GET", "forajax/incarcare_intrebari.php?intrebarenr=" + intrebarenr, true);
        xmlhttp.send(null);
    }

    function radioclick(radiovaloare, intrebarenr)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            }
        };
        xmlhttp.open("GET", "forajax/salvare_raspuns_in_sesiune.php?intrebarenr=" +intrebarenr + "&valoare1=" + radiovaloare, true);
        xmlhttp.send(null);
    }

    function incarca_anterior() {
        if (intrebarenr == "1") {
            incarcare_intrebari(intrebarenr);
        }
        else {
            intrebarenr = eval(intrebarenr) - 1;
            incarcare_intrebari(intrebarenr);
        }
    }

    function incarca_urmator() {
        intrebarenr = eval(intrebarenr) + 1;
        incarcare_intrebari(intrebarenr);

    }


</script>


<?php
include "footer.php";
?>