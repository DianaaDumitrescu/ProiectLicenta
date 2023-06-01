<?php
session_start();
include "../connection.php";

$intrebare_nr = "";
$intrebare = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$raspuns = "";
$count = 0;
$rasp = "";


$intnr = $_GET["intrebarenr"];

if (isset($_SESSION["raspuns"][$intnr])) {
    $rasp = $_SESSION["raspuns"][$intnr];
}

$res = mysqli_query($link, "SELECT * FROM intrebari WHERE materie='$_SESSION[materie_examen]' && intrebare_nr=$_GET[intrebarenr]");
$count = mysqli_num_rows($res);

if ($count == 0) {
    echo "Finalizat";
} else {
    while ($row = mysqli_fetch_array($res)) {
        $intrebare_nr = $row["intrebare_nr"];
        $intrebare = $row["intrebare"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];

    }
    ?>
    <br>


    <table>
        <tr>
            <td style="font-weight: bold; font-size: 18px; padding-left: 5px" colspan="2">
                <?php echo "(" . $intrebare_nr . ") " . $intrebare; ?>
            </td>
        </tr>


    </table>

    <table>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>"
                    onclick="radioclick(this.value,<?php echo $intrebare_nr ?>)" <?php
                       if ($rasp == $opt1) {
                           echo "Verificat";
                       }

                       ?>>
            </td>

            <td style="padding-left: 10px">
                <?php
                if (strpos($opt1, 'imagini/') != false) {
                    ?>
                    <img src="admin/<?php echo $opt1; ?>" height="30" width="30">
                    <?php

                } else {
                    echo $opt1;
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>"
                    onclick="radioclick(this.value,<?php echo $intrebare_nr ?>)" <?php
                       if ($rasp == $opt2) {
                           echo "Verificat";
                       }

                       ?>>
            </td>

            <td style="padding-left: 10px">
                <?php
                if (strpos($opt2, 'imagini/') != false) {
                    ?>
                    <img src="admin/<?php echo $opt2; ?>" height="30" width="30">
                    <?php

                } else {
                    echo $opt2;
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>"
                    onclick="radioclick(this.value,<?php echo $intrebare_nr ?>)" <?php
                       if ($rasp == $opt3) {
                           echo "Verificat";
                       }

                       ?>>
            </td>

            <td style="padding-left: 10px">
                <?php
                if (strpos($opt3, 'imagini/') != false) {
                    ?>
                    <img src="admin/<?php echo $opt3; ?>" height="30" width="30">
                    <?php

                } else {
                    echo $opt3;
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>"
                    onclick="radioclick(this.value,<?php echo $intrebare_nr ?>)" <?php
                       if ($rasp == $opt4) {
                           echo "Verificat";
                       }

                       ?>>
            </td>

            <td style="padding-left: 10px">
                <?php
                if (strpos($opt4, 'imagini/') != false) {
                    ?>
                    <img src="admin/<?php echo $opt4; ?>" height="30" width="30">
                    <?php

                } else {
                    echo $opt4;
                }
                ?>
            </td>
        </tr>


    </table>
    <?php
}

?>