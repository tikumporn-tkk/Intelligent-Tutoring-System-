<?php
    include 'function/connect.php';
      $testcomplie     = (isset($_POST['testcomplie']) ? $_POST['testcomplie'] : '');
      $outputtest      = "";
      $result      = "";

      if($testcomplie !=''){
        $result = system(".\c2.exe",$outputtest);
        echo "<script language=\"JavaScript\"> ,$result";
        echo "alert('ไม่สามารถ Run ได้');";
        echo "window.location='../checkcode.php';";	                             
    }
    else if($testcomplie =='') {
                       echo "<script language=\"JavaScript\">";
                       echo "alert('ไม่สามารถ Run ได้');";
                       echo "history.go(-1);";
                       echo "</script>";
                     }                                                                                            
?>