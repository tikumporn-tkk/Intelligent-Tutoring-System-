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
                         $sql_course        = "SELECT * FROM course JOIN member ON  course.ID_teacher = member.ID_member
                         WHERE 	ID_course   = $id";
                         $result_course     = $conn->query( $sql_course );
                         $row_course        = $result_course->fetch_array(MYSQLI_BOTH);
                    ?>
                    <div class="callout callout-info" style="background-image: url(../dist/img/shutterstock_1060094186.jpg);" >
                        <h1>ชื่อคลาส <?=$row_course['Coursename']?></h1><br>
                        <h3>ชื่อวิชา  <?=$row_course['Detail']?></h3>
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
                                        data-toggle         ="modal" 
                                        data-target         ="#Modaladdstuden" 
                                        type                ="button" class="btn btn-success pull-right open-AddBookDialog3" >
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
                                        data-toggle         ="modal" 
                                        data-target         ="#Modaladdlesson" 
                                        type                = "button" class="btn btn-success pull-right open-AddBookDialog3" >
                                        <i class="fa fa-fw fa-plus"> </i>เพิ่มบทเรียน
                                    </a>
                            </div>
                            <h3 class="box-title">บทเรียน</h3> <hr> 
                        <!-- Post -->
                            <div class="post">
                                <?php
                                        $sql_lesson = "SELECT * FROM lesson LEFT JOIN  lessonuploadfile ON  lesson.ID_lesson = lessonuploadfile.ID_lesson
                                        WHERE 	ID_course   = $id ORDER BY Lessonname";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){
                                ?>
                                    <div class="callout  <?php if($i%2==0){echo "callout-danger";}else{echo "callout-warning";}?>">
                                        <a class="small-box-footer">
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
                                        data-toggle         ="modal" 
                                        data-target         ="#Modaladdtest" 
                                        type                ="button" class="btn btn-success pull-right open-AddBookDialog3" >
                                        <i class="fa fa-fw fa-plus"> </i>เพิ่มแบบทดสอบ
                                    </a>
                            </div>  
                            <h3 class="box-title">แบบทดสอบ</h3> <hr>
                            <!-- Post --> 
                            <div class="post">
                                    <?php
                                         $sql_lesson = "SELECT * FROM lesson LEFT JOIN  lessonuploadfile ON  lesson.ID_lesson = lessonuploadfile.ID_lesson
                                         WHERE 	ID_course   = $id ORDER BY Lessonname";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){
                                    ?>
                                    <!-- /.col -->
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="box collapsed-box box-solid <?php if($i%2==0){echo "box-success";}else{echo "box-danger";}?>">
                                            <div class="box-header with-border">
                                            <a href="professor_course_test.php?ID_test=<?=$row_lesson['ID_lesson']?>"><h3 class="box-title"><?=$row_lesson['Lessonname']?>
                                            </h3></a>

                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.box-tools -->
                                            </div>
                                            <!-- /.box-header -->
                                       
                                            <div class="box-body">
                                            <div class="box">
                                                    <div class="box-header">
                                                        <h3 class="box-title">ข้อมูลแบบทดสอบ</h3>
                                                        <div class="box-tools">
                                                            <ul class="pagination pagination-sm no-margin pull-right">
                                                            <li><a href="#">&laquo;</a></li>
                                                            <li><a href="#">1</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">&raquo;</a></li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body no-padding">
                                                        <table class="table">
                                                        <?php
                                                            $sql_test = "SELECT * FROM test LEFT JOIN test_detail 
                                                            ON test.ID_test = test_detail.ID_test ";
                                                            $result_test = $conn->query($sql_test);
                                                        ?>
                                <div class="box-footer">
                                </div>
                                    <thead>
                                        <th>จัดการข้อมูล</th>
                                        <th>รหัสแบบทดสอบ</th>
                                        <th>ลำดับข้อ</th>
                                        <th>คำถาม</th>
                                        <th>ตัวเลือกที่ 1</th>
                                        <th>ตัวเลือกที่ 2</th>
                                        <th>ตัวเลือกที่ 3</th>
                                        <th>ตัวเลือกที่ 4</th>
                                        <th>ตัวช่วยที่ 1</th>
                                        <th>ตัวช่วยที่ 2</th>
                                        <th>ตัวช่วยที่ 3</th>
                                        <th>เฉลย</th>
                                    </thead>
                                    <?php
                                        $i=0;
                                        while( $row = $result_test->fetch_array(MYSQLI_BOTH) ){
                                        ?>
                                    <tr>
                                        <td >
                                        <a href="#" 
                                                data-toggle        ="modal" 
                                                data-target="#Modalview" 
                                                data-id          =  "<?=$row["ID"]?>"
                                                data-id_test     =  "<?php echo $row["ID_test"];?>"
                                                data-no          =  "<?php echo  $row["No"];?>"
                                                data-question    =  "<?php echo $row["Question"];?>"
                                                data-choice1     =  "<?php echo $row["Choice1"];?>"
                                                data-choice2     =  "<?php echo $row["Choice2"];?>"
                                                data-choice3     =  "<?php echo $row["Choice3"];?>"
                                                data-choice4     =  "<?php echo $row["Choice4"];?>"
                                                data-hint1       =  "<?php echo $row["Hint1"];?>"
                                                data-hint2       =  "<?php echo $row["Hint2"];?>"
                                                data-hint3       =  "<?php echo $row["Hint3"];?>"
                                                data-answer      =  "<?php echo $row["Answer"];?>"
                                                type="button" class="btn btn-info open-AddBookDialog">
                                                ดูข้อมูล
                                        </a>
                                        <a href="#" 
                                                data-toggle        ="modal" 
                                                data-target="#Modaledit"
                                                data-id       =  "<?=$row["ID"]?>" 
                                                data-id_test     =  "<?php echo $row["ID_test"];?>"
                                                data-no   =  "<?php echo  $row["No"];?>"
                                                data-question     =  "<?php echo $row["Question"];?>"
                                                data-choice1    =  "<?php echo $row["Choice1"];?>"
                                                data-choice2       =  "<?php echo $row["Choice2"];?>"
                                                data-choice3       =  "<?php echo $row["Choice3"];?>"
                                                data-choice4       =  "<?php echo $row["Choice4"];?>"
                                                data-hint1       =  "<?php echo $row["Hint1"];?>"
                                                data-hint2       =  "<?php echo $row["Hint2"];?>"
                                                data-hint3       =  "<?php echo $row["Hint3"];?>"
                                                data-answer       =  "<?php echo $row["Answer"];?>"
                                                type="button" class="btn btn-warning open-AddBookDialog2">
                                                แก้ไข
                                        </a>
                                        <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                                                {window.location='function/professor_test_del.php?ID=
                                                <?php echo $row["ID"];?>';}" class="btn btn-danger">
                                        ลบ</a>
                                        </a>
                                        </td>
                                        <td><?php echo $row["ID_test"];?></td>
                                        <td><?php echo $row["No"];?></td>
                                        <td><?php echo $row["Question"];?></td>
                                        <td> <?php echo $row["Choice1"];?></td>
                                        <td><?php echo $row["Choice2"];?></td>
                                        <td><?php echo $row["Choice3"];?></td>
                                        <td><?php echo $row["Choice4"];?></td>
                                        <td><?php echo $row["Hint1"];?></td> 
                                        <td><?php echo $row["Hint2"];?></td> 
                                        <td><?php echo $row["Hint3"];?></td> 
                                        <td><?php echo $row["Answer"];?></td>                                                                           
                                    </tr>
                                    <?php
                                        }
                                    ?>

                                                        </table>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    </div>

                                    <!-- <div class="callout  <?php if($i%2==0){echo "callout-danger";}else{echo "callout-warning";}?>">
                                        <a href="#show_test" class="small-box-footer">
                                            <h4><?=$row_lesson['Lessonname']?></h4></a>
                                            <p><?=$row_lesson['Detail']?></p> 
                                            <?php
                                                if($row_lesson['ID_file']!=''){
                                            ?>
                                                <a href="Showfile.php?ID_file=<?=$row_lesson['ID_file']?>" target=_blank>ดาวน์โหลดไฟล์</a> 
                                            <?php
                                            }
                                            ?>                                      
                                    </div> -->
                                        <?php
                                            $i++;
                                            }
                                        ?>

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

<!-- จัดการข้อมูลแบบทดสอบ เพิ่ม ลบ แก้ไข แสดง -->
<!-- คำสั่งเรียกดูข้อมูลในแว่นขยาย -->
<form method="post" action="">
    <div class="modal modal-default fade" id="Modalview" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h5>ดูข้อมูล</h5>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-6 ">
                                <label for="ID" >รหัสลำดับ</label>
                                <input  type="text" class="form-control" id="ID" name="ID" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="ID_test">รหัสแบบทดสอบ</label>
                                <input type="text" class="form-control" id="ID_test" name="ID_test" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  id="No" name="No" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea type="text" class="form-control" id="Question" name="Question" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice1">ตัวเลือกที่ 1</label>
                                <textarea type="text" class="form-control" id="Choice1" name="Choice1" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice2">ตัวเลือกที่ 2</label>
                                <textarea type="text" class="form-control"  id="Choice2" name="Choice2" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice3">ตัวเลือกที่ 3</label>
                                <textarea type="text" class="form-control" id="Choice3" name="Choice3" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice4">ตัวเลือกที่ 4</label>
                                <textarea type="text" class="form-control" id="Choice4" name="Choice4" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint1">ตัวช่วยที่ 1</label>
                                <textarea type="text" class="form-control" id="Hint1" name="Hint1" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint2">ตัวช่วยที่ 2</label>
                                <textarea type="text" class="form-control" id="Hint2" name="Hint2" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint3">ตัวช่วยที่ 3</label>
                                <textarea type="text" class="form-control" id="Hint3" name="Hint3" readonly></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Answer">เฉลย</label>
                                <textarea type="text" class="form-control" id="Answer" name="Answer" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->

<!-- คำสั่งเรียกดูข้อมูลในแว่นขยาย -->
<form method="post" action="function/professor_test_edit.php">
    <div class="modal modal-default fade" id="Modaledit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h5>แก้ไขข้อมูล</h5>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                        <div class="form-group col-md-6 ">
                                <label for="ID" >รหัสลำดับ</label>
                                <input  type="text" class="form-control" id="ID" name="ID" readonly>
                            </div>
                        <div class="form-group col-md-6 ">
                                <label for="ID_test">รหัสแบบทดสอบ</label>
                                <input type="text" class="form-control" id="ID_test" name="ID_test" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"  id="No" name="No" readonly>
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

<!-- คำสั่งเรียกเพิ่มข้อมูลในแว่นขยาย -->
<form method="post" action="function/professor_test_add.php">
    <div class="modal modal-default fade" id="Modaladdtest" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>เพิ่มข้อมูลแบบทดสอบ</h3>
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

  /* คำสั่งเรียกดูข้อมูลในแว่นขยาย */
  $(document).on("click", ".open-AddBookDialog", function () {

        var ID           = $(this).data('id');
        $(".modal-body #ID").val( ID );

        var ID_test           = $(this).data('id_test');
        $(".modal-body #ID_test").val( ID_test );

        var No           = $(this).data('no');
        $(".modal-body #No").val( No );

        var Question         = $(this).data('question');
        $(".modal-body #Question").val( Question );

        var Choice1   = $(this).data('choice1');
        $(".modal-body #Choice1").val( Choice1 );
            
        var Choice2    = $(this).data('choice2');
        $(".modal-body #Choice2").val(Choice2);
            
        var Choice3     = $(this).data('choice3');
        $(".modal-body #Choice3").val( Choice3 );

        var Choice4     = $(this).data('choice4');
        $(".modal-body #Choice4").val( Choice4 );

        var Hint1     = $(this).data('hint1');
        $(".modal-body #Hint1").val( Hint1 );

        var Hint2     = $(this).data('hint2');
        $(".modal-body #Hint2").val( Hint2 );

        var Hint3     = $(this).data('hint3');
        $(".modal-body #Hint3").val( Hint3 );

        var Answer     = $(this).data('answer');
        $(".modal-body #Answer").val( Answer );

        $('#Modalview').modal('show');
});

/* คำสั่งเรียกแก้ไขข้อมูลในแว่นขยาย */
$(document).on("click", ".open-AddBookDialog2", function () {

        var ID           = $(this).data('id');
        $(".modal-body #ID").val( ID );

        var ID_test           = $(this).data('id_test');
        $(".modal-body #ID_test").val( ID_test );

        var No           = $(this).data('no');
        $(".modal-body #No").val( No );

        var Question         = $(this).data('question');
        $(".modal-body #Question").val( Question );

        var Choice1   = $(this).data('choice1');
        $(".modal-body #Choice1").val( Choice1 );
            
        var Choice2    = $(this).data('choice2');
        $(".modal-body #Choice2").val(Choice2);
            
        var Choice3     = $(this).data('choice3');
        $(".modal-body #Choice3").val( Choice3 );

        var Choice4     = $(this).data('choice4');
        $(".modal-body #Choice4").val( Choice4 );

        var Hint1     = $(this).data('hint1');
        $(".modal-body #Hint1").val( Hint1 );

        var Hint2     = $(this).data('hint2');
        $(".modal-body #Hint2").val( Hint2 );

        var Hint3     = $(this).data('hint3');
        $(".modal-body #Hint3").val( Hint3 );

        var Answer     = $(this).data('answer');
        $(".modal-body #Answer").val( Answer );

        $('#Modaledit').modal('show');
});

</script>
</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>