<?php 
    //登入用到的正確的帳號跟密碼
    if (($_POST["id"] == "john") && ($_POST["pwd"]=="john1234"))
        //輸入的帳密正確
        echo "登入成功";
    else
        //否則登入失敗
        echo "登入失敗";
?>
