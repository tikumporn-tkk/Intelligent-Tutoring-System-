<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){

        $ID_lesson     = (isset($_GET['ID_lesson']) ? $_GET['ID_lesson'] : '');
        $id_course     = (isset($_GET['id']) ? $_GET['id'] : '');
        $Lessonfile1   = (isset($_GET['Lessonfile1']) ? $_GET['Lessonfile1'] : '');
        $session_id    =  $_SESSION['session_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'component/head.php';
    ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
   <?php
    include 'component/header.php';
    ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"><!-- Menu -->
    <?php
    include 'component/menu_std.php';
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
 <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
 <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
 

                  <!-- ส่วนชื่อบทเรียน -->
    <div class="row">
                    <div class="box-header">
                    <?php
                                        $sql_lesson = "SELECT * FROM  lesson JOIN course ON course.ID_course=lesson.ID_course 
                                        WHERE 	lesson.ID_lesson   = $ID_lesson";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){
                                ?>
                                        <h3 class="box-title"><?=$row_lesson['Lessonname']?></h3> <hr> 
                                        <?php
                                            $i++;
                                            }
                                        ?>
                            <!-- ส่วนโชว์pdf -->
                                <?php
                                        $sql_lesson = "SELECT * FROM  lesson WHERE 	ID_lesson = $ID_lesson ";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){                                      
                                                         
                                ?>
                          
                                      <p class="mb-8">
                                        <?php
                                        if($row_lesson['Lessonfile1']!=''){

                                         ?>
                                    
                                         
                                     <iframe  style=" width:100%;height:1000px;" scrolling="auto" TYPE="application/vnd.adobe.pdfxml"
                                     src="filelesson/<?=$row_lesson['Lessonfile1'] ; ?>"  
                                      ></iframe>
                                      
                                     <?php 
                                      } 
                                      ?></p>
                                        <?php
                                      
                                            $i++;
                                            }
                                        ?>

                            
                    
      <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    
        <!-- /.col -->
</section>
<!-- /.content -->
</div>

        
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
    








  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php
     include 'component/footer.php';
    ?>
  </footer>

  <!-- Control Sidebar -->
    <?php
     include 'component/Control_Sidebar.php';
    ?>
  <!-- /.control-sidebar -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
   
<?php
    include 'component/class.php';
?>
</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>