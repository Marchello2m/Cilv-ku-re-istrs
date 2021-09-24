<?php


require_once 'vendor/autoload.php';

use App\HumanReader;
use App\Delete;
$delete =new Delete();


$statistics=new HumanReader('humans.csv','r');
$records=$statistics->getRecords();

$name= $_POST['name'];
$surname = $_POST['surname'];
$pk = $_POST['pk'];
$comments = $_POST['comments'];

$fp = fopen("humans.csv","a");
$cvsData = $name . ";" . $surname. ";" . $pk . ";". $comments ."\n";
if($fp) {
    fwrite($fp, $cvsData);
    fclose($fp);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Cilvēku Reģistrs</title>
</head>
<body>


<style>
    #myInput {

        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

  input, table, th, td {
        border: 1px solid black;
    };

</style>


<div class="container">
    <form id="form1" name="form1" method="post" action="">
        <table class="formatTblClass">

            <tr>
                <td ><span>Vārds</span></td>
                <td ><label for="name"></label><input class="" type="text" name="name" id="name" /></td>
                <td ><span>Uzvārds</span></td>
                <td ><label for="surname"></label><input class="" name="surname" type="text" id="surname" /></td>
                <td ><span>PK</span></td>
                <td ><label for="pk"></label><input class="" name="pk" type="text" id="pk"  /></td>
                <td ><span>Papildus Informācija</td>
                <td><label for="comments"></label><textarea name="comments" id="comments"></textarea></td>


            </tr>

        </table>
        <input type="submit" name="Submit" id="Submit" value="Submit" />
        <input type="reset" name="Reset" id="button" value="Reset" />
    </form>


</div>


<div class="container">
    <table class="table" id="myTable">
        <tbody>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for pk" title="pk">
        <div>

            <tr >
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>pk</th>
                <th>Papilduinformacija</th>

            </tr>
        </div>
        <?php foreach($records as $record):?>
            <tr>
                <th scope ="row"><?php echo $record['name'];?></th>
                <td><?php echo $record['surname'];?></td>
                <td><?php echo $record['pk'];?></td>
                <td><?php echo $record['info'];?></td>
<td><a href="#" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this Human Data?');">Delete</a></td>

            </tr>
        <?php endforeach;?>
        </tbody>



    </table>
</div>
<script>
    function myFunction() {
        let input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById(["myTable"]);
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
