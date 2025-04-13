<?php
    error_reporting(0);
    session_start();
    if (!$_SESSION["id"]) {
        echo "請先登入";
        // 使用 meta 標籤讓頁面自動在 3 秒後跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 如果已經登入，顯示歡迎訊息並顯示登出及管理功能的連結
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        // 建立與資料庫的連接
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 執行 SQL 查詢，取得所有佈告資料
        $result=mysqli_query($conn, "select * from bulletin");
        // 顯示一個表格，將佈告資料列出
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        // 使用 while 迴圈遍歷查詢結果中的每一列資料
        while ($row=mysqli_fetch_array($result)){
            // 顯示修改與刪除按鈕，並傳遞佈告編號（bid）到相關的頁面
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";

            // 顯示該筆佈告的編號
            echo $row["bid"];
            echo "</td><td>";

            // 顯示佈告的類別
            echo $row["type"];
            echo "</td><td>"; 

            // 顯示佈告的標題
            echo $row["title"];
            echo "</td><td>";

            // 顯示佈告的內容
            echo $row["content"]; 
            echo "</td><td>";

             // 顯示佈告的發佈時間
            echo $row["time"];
            echo "</td></tr>";
        }
        echo "</table>";
    
    }

?>
