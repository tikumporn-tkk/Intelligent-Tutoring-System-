<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==1){
        $id = (isset($_GET['id']) ? $_GET['id'] : '');
        $session_id =  $_SESSION['session_id'];
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
    include 'component/menu_tch.php';
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
                    <?php
                         $sql_course = "SELECT * FROM course JOIN member ON  course.ID_teacher = member.ID_member
                         WHERE 	ID_course = $id";
                         $result_course     = $conn->query( $sql_course );
                         $row_course = $result_course->fetch_array(MYSQLI_BOTH);
                    ?>
                    <div class="callout callout-info" style="background-image: url(../dist/img/shutterstock_1060094186.jpg);" >
                        <h1>ชื่อคลาส <?=$row_course['Coursename']?></h1><br>
                        <h3>ชื่อวิชา  <?=$row_course['Coursename']?></h3>
                        &nbsp;<br>
                        &nbsp;<br>
                        &nbsp;<br>
                    </div>
    <div class="row">
                    <div class="box-header">
                        <h3 class="box-title">หลักสูตร</h3>
                    </div>
        <!-- /.col -->
        <div class="col-md-12">
             <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">รายละเอียดหลักสูตร</a></li>
                        <li><a href="#studen" data-toggle="tab">ผู้เรียน</a></li>
                        <li><a href="#timeline" data-toggle="tab">บทเรียน</a></li>
                        <li><a href="#settings" data-toggle="tab">แบบทดสอบ</a></li>
                    </ul>
                        <!-- รายละเอียดหลักสูตร -->
            <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                            
                    
                            </div>
                            <!-- /.post -->
                    </div>
      
                        <!-- ผู้เรียน -->
                    <div class="tab-pane" id="studen">
                        <div class="active tab-pane" id="activity">
                            <div class="box-footer">
                                    <a href="#" 
                                        data-toggle        ="modal" 
                                        data-target="#Modaladdstuden" 
                                        type= "button" class="btn btn-success pull-right open-AddBookDialog3" >
                                        <i class="fa fa-fw fa-plus"> </i>เพิ่มผู้เรียน
                                    </a>
                            </div>
                            <h3 class="box-title">ผู้เรียน</h3> <hr>
                            <!-- Post -->
                            <div class="post">
            
            
                            </div>
                            <!-- /.post -->
                        </div>
                    </div>

                        <!-- บทเรียน -->
                    <div class="tab-pane" id="timeline">
                        <div class="active tab-pane" id="activity">
                            <div class="box-footer">
                                    <a href="#" 
                                        data-toggle        ="modal" 
                                        data-target="#Modaladdlesson" 
                                        type= "button" class="btn btn-success pull-right open-AddBookDialog3" >
                                        <i class="fa fa-fw fa-plus"> </i>เพิ่มบทเรียน
                                    </a>
                            </div>
                            <h3 class="box-title">บทเรียน</h3> <hr> 
                        <!-- Post -->
                            <div class="post">
                                <?php
                                        $sql_lesson = "SELECT * FROM lesson LEFT JOIN  lessonuploadfile ON  lesson.ID_lesson = lessonuploadfile.ID_lesson
                                        WHERE 	ID_course = $id ORDER BY Lessonname";
                                        $result_lesson     = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){
                                ?>
                                    <div class="callout  <?php if($i%2==0){echo "callout-danger";}else{echo "callout-warning";}?>">
                                        <a href="show_lessonstd.php" class="small-box-footer">
                                            <h4><?=$row_lesson['Lessonname']?></h4></a>
                                            <p><?=$row_lesson['Detail']?></p> 
                                            <?php
                                                if($row_lesson['ID_file']!=''){
                                            ?>
                                                <a href="Showfile.php?ID_file=<?=$row_lesson['ID_file']?>" target=_blank>ดาวน์โหลดไฟล์</a> 
                                            <?php
                                            }
                                            ?>                                      
                                    </div>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                            </div>
                            <!-- /.post -->
                        </div>    
                    </div>

                     <!-- /.แบบทดสอบ -->
                     <div class="tab-pane" id="settings">
                        <div class="active tab-pane" id="activity">
                            <div class="box-footer">
                                    <a href="#" 
                                        data-toggle        ="modal" 
                                        data-target="#Modaladdtest" 
                                        type= "button" class="btn btn-success pull-right open-AddBookDialog3" >
                                        <i class="fa fa-fw fa-plus"> </i>เพิ่มแบบทดสอบ
                                    </a>
                            </div>  
                            <h3 class="box-title">แบบทดสอบ</h3> <hr>
                            <!-- Post --> 
                            <div class="post">
                           
        
                            </div>
                            <!-- /.post -->
                        </div>    
                    </div>
                    
      <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
        <!-- /.col -->
</section>
<!-- /.content -->
</div>


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

<!-- คำสั่งเรียกเพิ่มข้อมูลผู้เรียนในแว่นขยาย -->
<form method="post" action="function/member_add.php">
    <div class="modal modal-default fade" id="Modaladdstuden" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>เพิ่มผู้เรียน</h3>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-6 ">
                                <label for="Email">อีเมล</label>
                                <input type="text" class="form-control" id="Email" name="Email" placeholder="กรุณากรอก Email ผู้เรียน" >
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-success"  >บันทึก</button>
                        <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->

<!-- คำสั่งเรียกเพิ่มข้อมูลผู้เรียนในแว่นขยาย -->
<form method="post" enctype="multipart/form-data" action="function/t_lesson_add.php">
    <div class="modal modal-default fade" id="Modaladdlesson" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>เพิ่มบทเรียน</h3>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                        <input type="hidden" class="form-control" id="ID_course" name="ID_course" value="<?=$id?>" >
                        <div class="form-group col-md-12 ">
                                <label for="Lessonname">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" >
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Detail">รายละเอียด</label>
                                <textarea cols="30" rows="10" class="form-control" id="Detail" name="Detail"></textarea>
                                
                            </div>
                        <div class="form-group col-md-6 ">
                                <label for="upfile">ไฟล์บทเรียน (ขนาดไฟล์ไม่เกิน 1 MB)</label>
                                <input type="file"  id="upfile" name="upfile" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button   type="submit" name="Submit" class="btn btn-success" > อัปโหลดข้อมูล</button>
                        <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->

<!-- คำสั่งเรียกเพิ่มข้อมูลในแว่นขยาย -->
<form method="post" action="function/professor_test_add.php">
    <div class="modal modal-default fade" id="Modaladdtest" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>เพิ่มข้อมูล</h3>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                        
                        <div class="form-group col-md-6 ">
                                <label for="ID_test">รหัสแบบทดสอบ</label>
                                <input type="text" class="form-control" id="ID_test" name="ID_test" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  id="No" name="No" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea type="text" class="form-control" id="Question" name="Question" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice1">ตัวเลือกที่ 1</label>
                                <textarea type="text" class="form-control" id="Choice1" name="Choice1" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice2">ตัวเลือกที่ 2</label>
                                <textarea type="text" class="form-control"  id="Choice2" name="Choice2" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice3">ตัวเลือกที่ 3</label>
                                <textarea type="text" class="form-control" id="Choice3" name="Choice3" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice4">ตัวเลือกที่ 4</label>
                                <textarea type="text" class="form-control" id="Choice4" name="Choice4" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint1">ตัวช่วยที่ 1</label>
                                <textarea type="text" class="form-control" id="Hint1" name="Hint1" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint2">ตัวช่วยที่ 2</label>
                                <textarea type="text" class="form-control" id="Hint2" name="Hint2" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint3">ตัวช่วยที่ 3</label>
                                <textarea type="text" class="form-control" id="Hint3" name="Hint3" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Answer">เฉลย</label>
                                <textarea type="text" class="form-control" id="Answer" name="Answer" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-success"  >บันทึก</button>
                        <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>