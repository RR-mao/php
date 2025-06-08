<?php
    // 關閉錯誤訊息
    error_reporting(0);
    // 啟用 Session
    session_start();

    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 顯示提示
        echo "請登入帳號";
        // 3 秒後跳轉登入頁
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 根據 GET 傳入的 bid 刪除對應的佈告資料
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        #echo $sql;
        
        // 執行 SQL 刪除失敗
        if (!mysqli_query($conn,$sql)){
            // 顯示錯誤訊息
            echo "佈告刪除錯誤";
        }else{
            // 顯示成功訊息
            echo "佈告刪除成功";
        }
        // 3 秒後回佈告欄列表
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
