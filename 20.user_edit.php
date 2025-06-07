<?php

    // 關閉錯誤訊息
    error_reporting(0);
    // 啟用 Session
    session_start();
    // 若未登入
    if (!$_SESSION["id"]) {
        // 顯示登入提示
        echo "請登入帳號";
        // 3 秒後跳轉至登入頁
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 執行更新 SQL：根據 POST 的帳號 id 更新對應密碼
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            // 顯示錯誤訊息
            echo "修改錯誤";
            // 3 秒後跳轉回使用者管理頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }else{
            // 顯示成功訊息
            echo "修改成功，三秒鐘後回到網頁";
            // 同樣跳轉回使用者管理頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>
