<?php
    // 關閉錯誤訊息
    error_reporting(0);
    // 啟用 Session
    session_start();

    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 顯示提示
        echo "please login first";
        // 3 秒後跳轉至登入頁
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
         // 組合新增 SQL 指令，插入 bulletin 資料表
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        if (!mysqli_query($conn, $sql)){
             // 顯示錯誤訊息
            echo "新增命令錯誤";
        }
        // 執行成功
        else{
            // 顯示成功訊息
            echo "新增佈告成功，三秒鐘後回到網頁";
            // 跳轉回佈告欄列表
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
