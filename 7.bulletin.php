<?php
    error_reporting(0);
    // 建立與資料庫的連線
    $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    // 查詢bulletin資料表的所有資料
    $result=mysqli_query($conn, "select * from bulletin");
    // 建立表格
    echo "<table border=2><tr><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
    
    while ($row=mysqli_fetch_array($result)){
        // 開始每一行資料
        echo "<tr><td>";
        // 顯示佈告編號
        echo $row["bid"];
        echo "</td><td>";
        // 顯示佈告類別
        echo $row["type"];
        echo "</td><td>"; 
         // 顯示標題
        echo $row["title"];
        echo "</td><td>";
         // 顯示佈告內容
        echo $row["content"]; 
        echo "</td><td>";
        // 顯示發佈時間
        echo $row["time"];
        echo "</td></tr>";
    }
    echo "</table>"
?>
