<?php
namespace App;
class Delete
{
    public function delete()
    {

        include "humans.csv"; // Using database connection file here
        $name= $_POST['name'];
        $surname = $_POST['surname'];
        $pk = $_POST['pk'];
        $comments = $_POST['comments'];
        $id = $_GET['id']; // get id through query string

        $cvsData = $name . ";" . $surname. ";" . $pk . ";". $comments ."\n";

        $del = fopen("humans.csv","a",'$id'); // delete query
        fwrite($del, $cvsData); // Write information to the file

        if($del)
        {
            fclose($del);// Close connection

            exit;
        }
        else
        {
            echo "Error deleting record"; // display error message if not delete
        }

    }
}
