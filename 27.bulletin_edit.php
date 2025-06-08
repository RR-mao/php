<?php
     // 關閉錯誤訊息
    error_reporting(0);
    // 啟用 Session
    session_start();

    // 檢查是否登入
    if (!$_SESSION["id"]) {
        // 顯示提示訊息
        echo "請登入帳號";
        // 3 秒後導向登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
         // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
         // 執行 UPDATE SQL：根據 POST 傳入的資料修改 bulletin 資料表內容
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            // 顯示錯誤訊息
            echo "修改錯誤";
            // 跳轉回佈告欄列表
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }else{
            // 顯示成功訊息
            echo "修改成功，三秒鐘後回到佈告欄列表";
            // 跳轉回佈告欄列表
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>
