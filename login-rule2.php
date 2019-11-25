<?php
    require 'conn.php';
//    unset($_SESSION['logged-in']);
    $err='';

    if(isset($_SESSION['err'])){
        $err = $_SESSION['err'];
        unset($_SESSION['err']);   
    }

    if(isset($_SESSION['logged-in'])){
        header('Location: index.php');
    }
    else if(isset($_POST['submit'])){
        
        // checkLogin(['anjay@gmail.com', '202cb962ac59075b964b07152d234b70']);
        // checkLogin([$_POST['email'], $db->query("SELECT MD5('{$_POST['pass']}')")->fetch()[0]], $db);
        $hasil = $db->query("SELECT p.* FROM pemilik p WHERE p.p_email='{$_POST['email']}' AND p.p_password=MD5('{$_POST['pass']}')")->fetch();
        header('Location: index.php');
        if(!empty($hasil)){
            $_SESSION['logged-in'] = array();
            $_SESSION['logged-in']["user"]= $hasil['p_username'];
            // $_SESSION['logged-in']["mail"]= $hasil['p_email'];
            $_SESSION['logged-in']["rights"]= $hasil['p_rights'];
            
            header('Location: indexP.php');
        }
        else{
            $_SESSION['err'] = 1;
            header('Location: login2.php');    
        }
    }
?>
