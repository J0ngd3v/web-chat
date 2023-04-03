<?php

    require "../auth_db.php";
    $user_id = $_POST['user_id'];
    $nama_user = $_POST['nama_user'];
    $chat = $_POST['chat'];
    date_default_timezone_set('Asia/Jakarta');
    $waktu = date('h:i:s a');;
    $query = "INSERT INTO `chat` (`id_chat`, `user_id`, `nama_user`, `chat`, `waktu`) VALUES (NULL, '$user_id', '$nama_user', '$chat', '$waktu')";
    $qu = mysqli_query($auth_conn , $query);

    if($qu > 0){
        header("location: index.php");
    }else{
        header("location: index.php?send=false");
    }