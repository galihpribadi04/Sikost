<?php
    require 'conn.php';
//    unset($_SESSION['logged-in']);
    $err='';

    function checkLogin(array $data, &$db){
        $condition = "'{$data[0]}'=pencari.u_email AND '{$data[1]}'=pencari.u_password";
 
        $hasil = $db->query("SELECT * FROM pencari WHERE ".$condition)->fetch();
//        print_r($hasil['depan']);
        
        if(!empty($hasil)){
            $_SESSION['logged-in'] = array();
            $_SESSION['logged-in']["user"]= $hasil['u_username'];
            $_SESSION['logged-in']["mail"]= $hasil['u_email'];
            //$_SESSION['logged-in']["rights"]= $hasil['admin'];
            
            header('Location: index.php');
        }
        else{
            $_SESSION['err'] = 1;
            header('Location: login.php');    
        }
    }

    if(isset($_SESSION['err'])){
        $err = $_SESSION['err'];
        unset($_SESSION['err']);   
    }

    if(isset($_SESSION['logged-in'])){
        header('Location: index.php');
    }
    else if(!empty($_POST['submit'])){
        
        if(empty($_POST['email'])){
            $_SESSION['err'] = 1;
            header('Location: login.php');   
            return false;
        }
        
        if(empty($_POST['pass'])){
            $_SESSION['err'] = 1;
            header('Location: login.php');   
            return false;
        }
//        checkLogin(['anjay@gmail.com', '202cb962ac59075b964b07152d234b70']);
        checkLogin([$_POST['email'], $db->query("SELECT MD5('{$_POST['pass']}')")->fetch()[0]], $db);
    }
?>
