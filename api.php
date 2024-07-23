<?php

include 'config.php';

if(isset($_GET['id'])){
    $id = str_replace("'","",$_GET["id"]);
    $id = str_replace("\\","",$id); // for no more SQLinjection XD
    user_info($id);
}


function user_info($id){
    global $db;
    $data = mysqli_num_rows(mysqli_query($db,"SELECT * FROM users WHERE id='$id'"));
    if($data == 0){
        die(json_encode(array("success"=>false,"info"=>[])));
    }else{
        $info = [];
        $d = mysqli_query($db,"SELECT * FROM users WHERE id='$id'");
        $d = mysqli_fetch_array($d);
        $info["id"] = $id;
        $info["username"] = $d["username"];
        $info["email"] = $d["email"];
        $info["fullname"]=  $d["fullname"];
        die(json_encode(array("success"=>true,"info"=>$info)));
    }
}
?>