<?php 
    require_once('../../configs/conexao.php');

    if(!isset($_GET['id'])){
        echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
        $mysqli->close();
        exit;
    }

    $delete = $mysqli->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");

    if($delete){
        echo "<script> alert('Event has deleted successfully.'); location.replace('./') </script>";
    }else{
        echo "<pre>";
        echo "An Error occured.<br>";
        echo "Error: ".$mysqli->error."<br>";
        echo "SQL: ".$sql."<br>";
        echo "</pre>";
    }
    
    $mysqli->close();
?>