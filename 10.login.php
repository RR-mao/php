<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;
   while ($row=mysqli_fetch_array($result)) {
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;
     }
   } 
   //檢查登入是否成功
   if ($login==TRUE) {
    session_start();
   //將登入的使用者帳號存入 Session 中，之後可以在其他頁面判斷是否已登入
    $_SESSION["id"]=$_POST["id"];
   //顯示登入成功的訊息
    echo "登入成功";
   //使用 meta 標籤自動跳轉頁面，3 秒後導向 11.bulletin.php
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }

  else{
   //如果登入失敗，顯示錯誤訊息
    echo "帳號/密碼 錯誤";
   // 3 秒後跳轉回登入頁面（2.login.html）
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
