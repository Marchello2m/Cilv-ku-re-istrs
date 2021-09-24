<?php
namespace App;
class HumanWriter
{
    public function write()
    {
        $name= $_POST['name'];
        $surname = $_POST['surname'];
        $pk = $_POST['pk'];
        $comments = $_POST['comments'];

        $fp = fopen("humans.csv","a");
        $cvsData = $name . ";" . $surname. ";" . $pk . ";". $comments ."\n";
        if($fp) {
            fwrite($fp, $cvsData); // Write information to the file
            fclose($fp); // Close the file
        }
    }
}