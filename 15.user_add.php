<?php

// 關閉錯誤訊息
error_reporting(0);
// 啟用 Session
session_start();
// 檢查是否尚未登入
if (!$_SESSION["id"]) {
    // 提示訊息
    echo "請登入帳號";
    // 3 秒後導向登入頁面
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else{    
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   #新增資料SQL命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
   #echo $sql;
    // 執行 SQL 命令失敗
   if (!mysqli_query($conn, $sql)) {
       // 顯示錯誤訊息
     echo "新增命令錯誤";
   }
     // 新增成功
   else{
       // 顯示成功訊息
     echo "新增使用者成功，三秒鐘後回到網頁";
       // 3 秒後跳轉回使用者管理頁
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
   }
}
?>
