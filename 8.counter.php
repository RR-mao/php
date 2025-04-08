<?php
    session_start();
    if (!isset($_SESSION["counter"]))
        $_SESSION["counter"]=1;
    else
        $_SESSION["counter"]++;
    
    echo "counter=".$_SESSION["counter"];
    //會轉到"9.reset_counter.php"來重製counter
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>
