<?php
    // 關閉錯誤訊息
    error_reporting(0);
    // 啟用 Session
    session_start();
     // 如果尚未登入
    if (!$_SESSION["id"]) {
        // 顯示提示訊息
        echo "請登入帳號";
        // 3 秒後導向登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 連接資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // SQL 刪除語句：根據 GET 傳入的 id 刪除對應使用者
        $sql="delete from user where id='{$_GET["id"]}'";
        #echo $sql;
        // 若刪除失敗
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";
        }else{
            // 顯示成功訊息
            echo "使用者刪除成功";
        }
        // 3 秒後跳轉回使用者列表頁
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>
