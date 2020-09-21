<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==1){
        $id = (isset($_GET['id_course']) ? $_GET['id_course'] : '');
       
        $id_course       = (isset($_GET['id_course']) ? $_GET['id_course'] : '');
        $session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );
        $ID_lesson     = (isset($_GET['ID_lesson']) ? $_GET['ID_lesson'] : '');
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
                        <h1><?=$row_course['Coursename']?></h1><br>
                        <h3>  <?=$row_course['Detail']?></h3>
                        &nbsp;<br>
                        &nbsp;<br>
                        &nbsp;<br>
                    </div>
    <div class="row">
                    <div class="box-header">
                    <i class="fa fa-bank"></i>&nbsp;<h3 class="box-title">ชั้นเรียน</h3>
                    </div>
        <!-- /.col -->
        <div class="col-md-12">
             <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">รายละเอียดชั้นเรียน</a></li>
                        <li><a href="#studen" data-toggle="tab">ผู้เรียน</a></li>
                        <li><a href="#timeline" data-toggle="tab">บทเรียน</a></li>
                        <li><a href="#settings" data-toggle="tab">แบบทดสอบ(ปรนัย)</a></li>
                        <li><a href="#testcode" data-toggle="tab">แบบทดสอบ(อัตนัย)</a></li>
                        <li><a href="#waitstuden" data-toggle="tab">คำร้องขอ</a></li>
                    </ul>
                        <!-- รายละเอียดหลักสูตร -->
            <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                            <div class="box-header">
                    <div class="col-md-8-center">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="../dist/img/user_icon.png" alt="User profile picture">

                        <h3 class="profile-username text-center"><?=$_SESSION['session_firstname']." ".$_SESSION['session_lastname']?></h3>

                        <p class="text-muted text-center"><?=$_SESSION['session_school']?></p>

                        <ul class="list-group list-group-unbordered">
                        <li class="list-group-item"> 
                        <b>ชื่อชั้นเรียน : </b> <a class="pull-right"><?=$row_course['Coursename']?></a>
                        </li>
                        <li class="list-group-item">
                            <b>รายละเอียด : </b> <a class="pull-right"> <?=$row_course['Detail']?></a>
                        </li>
                        </ul>

                        <a href="#" 
                                                data-toggle ="modal" 
                                                data-target         ="#Modaledit_course" 
                                                data-id_course       =  "<?php echo $row_course["ID_course"]?>"
                                                data-coursename      =  "<?php echo $row_course["Coursename"];?>"
                                                data-detail          =  "<?php echo $row_course["Detail"];?>"
                                                type="button" class="btn btn-primary btn-block open-AddBookDialog9"><b>แก้ไขรายละเอียด</b></a>
                        </div>
                    
                        <!-- /.box-body -->
                        </div>
                    </div>
                    </div>
                  </div>
                            <!-- /.post -->
                </div>
                    
                        
                        <!-- ผู้เรียน -->
                    <div class="tab-pane" id="studen">
                        <div class="active tab-pane" id="activity">
                           
                            <h3 class="box-title">ผู้เรียน</h3> <hr>
                            <!-- Post -->
                            <div class="post">
                            <div class="row">
        <div class="col-xs-12">
              <div class="box-tools">
                
                <!-- /.box-header -->
            
            
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อ</th>
                  <th>เวลา</th>
                  <th>วันที่</th>
                  <th>สถานะ</th>
                  <th></th>
                  
                </tr>
                
                <?php
                                        $sql_wait = "SELECT * FROM course JOIN  regis_course ON course.ID_course = regis_course.ID_course JOIN member ON  regis_course.ID_member = member.ID_member
                                        WHERE member.ID_type = '2' AND  regis_course.ID_course = '$id' AND regis_course.status = 'approve' ";
                                        $result_wait      = $conn->query( $sql_wait );
                                        $i=1;
                                            while( $row_wait = $result_wait->fetch_array(MYSQLI_BOTH) ){
                                ?>
                <tr>
                  <td> <?=$i++?></td>
                  <td><?=$row_wait['Firstname']." ".$row_wait['Lastname']?></td>
                  <td><?=$row_wait['time']?></td>
                  <td><?=$row_wait['data']?></td>
                  <td><span class="label label-success"><?=$row_wait['status']?></span></td>
                  <td> <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                   {window.location='function/member_course_del.php?ID_regis=<?php echo $row_wait["ID_regis"];?>&id=<?php echo $id ?>';}" class="glyphicon glyphicon-remove">
                        </a> 
                  </td>   
                </tr>
                                        <?php
                                            $i++;
                                            }
                                        ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
            
                            </div>
                            <!-- /.post -->
                        </div>
                    </div>




                    <!-- คำร้องขอ -->
                        <div class="tab-pane" id="waitstuden">
                        <div class="active tab-pane" id="activity">
                            <div class="box-footer">
                                    <a href="#" 
                                        data-toggle         ="modal" 
                                        data-target         ="#Modaladdwaitstuden" >
                                        
                                    </a>
                            </div>
                            <h3 class="box-title">คำร้องขอ</h3> <hr>
                            <!-- Post -->
                            <div class="post">
                 <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
              <div class="box-tools">
               
            <!-- /.box-header -->
            
            
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อ</th>
                  <th>เวลา</th>
                  <th>วันที่</th>
                  <th>สถานะ</th>
                  <th></th>
                  
                </tr>
                
                <?php
                                        $sql_wait = "SELECT * FROM course JOIN  regis_course ON course.ID_course = regis_course.ID_course JOIN member ON  regis_course.ID_member = member.ID_member
                                        	WHERE member.ID_type = '2' AND  regis_course.ID_course = '$id' AND regis_course.status = 'wait' ";
                                        $result_wait      = $conn->query( $sql_wait );
                                        $i=1;
                                            while( $row_wait = $result_wait->fetch_array(MYSQLI_BOTH) ){
                                ?>
                <tr>
                  <td> <?=$i++?></td>
                  <td><?=$row_wait['Firstname']." ".$row_wait['Lastname']?></td>
                  <td><?=$row_wait['time']?></td>
                  <td><?=$row_wait['data']?></td>
                  <td><span class="label label-danger"><?=$row_wait['status']?></span></td>
                  <td>  <a href="#"
                        data-toggle        ="modal" 
                        data-target="#Modaladd" 
                        data-id_member    =  "<?=$row_wait["ID_member"]?>"
                        data-id_course    =  "<?=$row_wait["ID_course"]?>"
                        data-id_teacher    =  "<?=$row_wait["ID_teacher"]?>"
                        data-status    =  "<?=$row_wait["status"]?>"
                                                                         
                        type="button" class="btn btn-success pull-right open-AddBookDialog5 ">
                        <i class="fa fa-fw fa-plus"></i>
                        อนุมัติ
                         </a></td>
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
      </div>
            
                            </div>
                            <!-- /.post -->
                        </div>
                    </div>
       <!-- คำสั่งเรียกเพิ่มข้อมูล -->
       <form method="post" action="function/sub_course.php">
         <div class="modal modal-default fade" id="Modaladd" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
           <h3>ยืนยันการอนุมัติเข้าชั้นเรียน  </h3> 
            <div class="modal-body">
            <input  type="hidden" class="form-control" id="id" name="id" >
            <input  type="hidden" class="form-control" id="ID_course" name="ID_course" >
            <input  type="hidden" class="form-control" id="ID_member" name="ID_member" >
            <input  type="hidden" value="approve" class="form-control" id="status" name="status" >
            </div>
            <div class="modal-footer">
            <button  type="submit" class="btn btn-success"  >ยืนยัน</button>
            <button  type="button" class="btn btn-primary"  data-dismiss="modal">ปิด</button>
                                                                                        
            </div>
            </div>  
            </div>  
             </div>  
            </div>  
             </form>

                        <!-- บทเรียน -->
                    <div class="tab-pane" id="timeline">
                        <div class="active tab-pane" id="activity">
                            <div class="box-footer">
                                    <a href="#" 
                                        data-toggle         ="modal" 
                                        data-target         ="#Modaladdlesson" 
                                        type                = "button" class="btn btn-success pull-right" >
                                        <i class="fa fa-fw fa-plus"> </i>เพิ่มบทเรียน
                                    </a>
                            </div>
                            <h3 class="box-title">บทเรียน</h3> <hr> 
                        <!-- Post -->
                            <div class="post">
                                <?php
                                        $sql_lesson = "SELECT * FROM lesson 
                                        WHERE 	ID_course   = $id ORDER BY Lessonname";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){
                                ?>
                                
                                              
                                    <div class="box box-solid  <?php if($i%2==0){echo "box-primary";}else{echo "box-primary";}?>">
                                    <div class="box-header with-border">
                                        
                                        <a class="small-box-footer">
                                            <h4 class="box-title">ชื่อบทเรียน : <?=$row_lesson['Lessonname']?></h4></a>
                                            
                                            <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <a href="JavaScript:if(confirm('ต้องการลบข้อมูล?') == true)
                                                {window.location='function/t_lesson_del.php?ID_lesson=<?php echo $row_lesson["ID_lesson"];?>&id_course=<?php echo $id_course;?>';}" type="button" >
                                                <i class="fa fa-remove"></i></a>

                                        </div>   
                                            </div> 

                                            <div class="box-body" >
                                                             <div class="nav-tabs-custom">  
                                            <br><a href="#"
                                                            data-toggle          ="modal" 
                                                            data-target         ="#Modaleditlesson" 
                                                            data-id_lesson      =  "<?=$row_lesson["ID_lesson"]?>"
                                                            data-lessonname     =  "<?=$row_lesson["Lessonname"]?>"
                                                            data-keyword        =  "<?=$row_lesson["keyword"]?>"
                                                            data-id_teacher      =  "<?=$row_lesson["ID_Teacher"]?>"
                                                            data-detail         =  "<?=$row_lesson["Detail"]?>"
                                                            data-lessonfile1    =  "<?=$row_lesson["Lessonfile1"]?>"
                                                            data-banner         =  "<?=$row_lesson["banner"]?>"
                                                     type="button" class="btn bg-info pull-right open-AddBookDialog10 "><font color=#000000 >แก้ไขข้อมูลบทเรียน</font></a>

                                            <p><?=$row_lesson['Detail']?></p> 

                                            <?php
                                                if($row_lesson['ID_lesson']!=''){
                                            ?>
                                                <a href="professor_showfile.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&id_course=<?=$id_course?>">คลิกดูไฟล์บทเรียน</a> 
                                           
                                            <?php
                                            }
                                            ?>  
                                                </div>    
                                            </div>                                           
                                    </div>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                            </div>
                            <!-- /.post -->
                        </div>    
                    </div>


                     <!-- /.แบบทดสอบปรนัย -->
                     <div class="tab-pane" id="settings">
                        <div class="active tab-pane" id="activity">
                        
                        <div class="box-footer">
                        <div class="col-xs-12">
                            
                            <a href="#" data-toggle         ="modal" 
                                        data-target         ="#Modaladdtest"
                                         type="button" class="btn btn-success pull-right open-AddBookDialogtest">
                                         <i class="fa  fa-plus"></i>&nbsp;แบบทดสอบปรนัย
                            </a>
                            </div>
                            
                            <h3 class="box-title">แบบทดสอบ</h3> <hr>
                            <!-- Post --> 
                            <div class="post">
                            <?php
                                        $sql_lesson = "SELECT * FROM lesson   
                                         LEFT JOIN  test_detail ON  lesson.ID_lesson = test_detail.ID_lesson
                                        WHERE 	lesson.ID_course   = $id GROUP BY Lessonname";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){
                                ?>
                                    <!-- /.col -->
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="box collapsed-box box-solid <?php if($i%2==0){echo "box-primary";}else{echo "box-primary";}?>">
                                            <div class="box-header with-border">
                                            <h4 class="box-title">ชื่อบทเรียน : <?=$row_lesson['Lessonname']?>
                                            </h4>
                                            
                                                <div class="box-tools pull-right">
                                               
                                                <?php
                                                if($row_lesson['ID_lesson']!=''){
                                            ?>
                                                <a href="professor_course_test.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&id_course=<?=$id_course?>"
                                                     type="button" class="btn bg-info"><font color=#000000 >ดูข้อมูล</font></a>
                                                     <?php
                                            }
                                            ?> 
                                             
                                       
                                                </div>
                                            
                                                
                                                <!-- /.box-tools -->
                                            </div>
                                            
                                            <!-- /.box-header -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    </div>
                                    <?php
                                            $i++;
                                            }
                                        ?>
                                        

                            </div>
                            <!-- /.post -->
                            
                        </div>    
                    </div>
                    </div>
                    
                    <!-- /.แบบทดสอบอัตนัย -->
                    <div class="tab-pane" id="testcode">
                        <div class="active tab-pane" id="activity">
                        
                        <div class="box-footer">
                        <div class="col-xs-12">
                            
                            <a href="#" 
                                        data-toggle         ="modal" 
                                        data-target         ="#Modaladdtestcode" 
                                        type="button" class="btn btn-success pull-right open-AddBookDialogtestco" style="margin-right: 5px;">
                                <i class="fa  fa-plus"></i>&nbsp; แบบทดสอบอัตนัย
                            </a>
                            </div>
                            
                            <h3 class="box-title">แบบทดสอบ</h3> <hr>
                            <!-- Post --> 
                            <div class="post">
                            <?php
                                        $sql_lesson = "SELECT * FROM lesson   
                                         LEFT JOIN  test_command ON  lesson.ID_lesson = test_command.ID_lesson
                                        WHERE 	lesson.ID_course   = $id GROUP BY Lessonname";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){
                                ?>
                                    <!-- /.col -->
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="box collapsed-box box-solid <?php if($i%2==0){echo "box-info";}else{echo "box-info";}?>">
                                            <div class="box-header with-border">
                                            <h4 class="box-title">ชื่อบทเรียน : <?=$row_lesson['Lessonname']?>
                                            </h4>
                                            
                                                <div class="box-tools pull-right">
                                               
                                                <?php
                                                if($row_lesson['ID_lesson']!=''){
                                            ?>
                                                <a href="professor_course_test_code.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&id_course=<?=$id_course?>"
                                                     type="button" class="btn bg-info"><font color=#000000 >ดูข้อมูล</font></a>
                                                     <?php
                                            }
                                            ?> 
                                             
                                       
                                                </div>
                                            
                                                
                                                <!-- /.box-tools -->
                                            </div>
                                            
                                            <!-- /.box-header -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    </div>
                                    <?php
                                            $i++;
                                            }
                                        ?>
                                        

                            </div>
                            <!-- /.post -->
                            
                        </div>    
                    </div>
                    <!-- /.end -->
                    
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
<!-- รายละเอียดคอร์ส -->

<!-- คำสั่งเรียกแก้ไขข้อมูลรายละเอียดคอร์สในแว่นขยาย -->
<form method="post" action="function/t_course_edit.php">
    <div class="modal modal-default fade" id="Modaledit_course" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>รายละเอียดข้อมูลชั้นเรียน</h3>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-md-12 ">
                                <label for="ID_course" >รหัสชั้นเรียน</label>
                                <input  type="text" class="form-control" id="ID_course" name="ID_course" readonly>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Coursename">ชื่อชั้นเรียน</label>
                                <textarea cols="20" rows="5" class="form-control" id="Coursename" name="Coursename" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Detail">ข้อมูลเกี่ยวกับชั้นเรียน</label>
                                <textarea cols="20" rows="5" class="form-control"  id="Detail" name="Detail" ></textarea>
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


<!-- จัดการข้อมูลบทเรียน เพิ่ม ลบ แก้ไข แสดง -->
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
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" required>
                            </div>
                            <div class="form-group col-md-12 has-feedback">
                                <label for="keyword">คำสำคัญ</label>
                                <select id="keyword" name="keyword" class="form-control select2"  >
                                <option value="0">กรุณาเลือกคำสำคัญ</option>
                                <option value="พื้นฐาน">พื้นฐาน</option>
                                <option value="การแสดงผล">การแสดงผล</option>
                                <option value="ชนิดข้อมูล">ชนิดข้อมูล</option>
                                <option value="การกำหนดเงื่อนไข">การกำหนดเงื่อนไข</option>
                                <option value="การวนทำซ้ำ">การวนทำซ้ำ</option>
                                <option value="ตัวแปรเเถวลำดับ">ตัวแปรเเถวลำดับ</option>
                                <option value="ตัวแปรโครงสร้าง">ตัวแปรโครงสร้าง</option>
                                <option value="ตัวแปรงชี้ตำแหน่ง">ตัวแปรงชี้ตำแหน่ง</option>
                                <option value="ฟังก์ชัน">ฟังก์ชัน</option>
                                <option value="ไฟล์">ไฟล์</option>
                                </select>
                             </div>
                            <div class="form-group col-md-12 ">
                                <label for="Detail">รายละเอียด</label>
                                <textarea cols="30" rows="10" class="form-control" id="Detail" name="Detail"></textarea>
                                
                            </div>
                        <div class="form-group col-md-6 ">
                                <label for="banner">ไฟล์บทเรียน (ขนาดไฟล์ไม่เกิน 2 MB)</label>
                                <input type="file"  id="banner" name="banner" required>
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

<form method="post" enctype="multipart/form-data" action="function/t_lesson_edit.php">
    <div class="modal modal-default fade" id="Modaleditlesson" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>แก้ไขบทเรียน</h3>
                </div>
                    <div class="modal-body">
                        <div class="box-body">
                        <input type="hidden" class="form-control" id="ID_course" name="ID_course" value="<?=$id?>" >
                        <div class="form-group col-md-12 ">
                                <label for="ID_lesson" >รหัสบทเรียน</label>
                                <input  type="text" class="form-control" id="ID_lesson" name="ID_lesson" readonly>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Lessonname">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="Lessonname" name="Lessonname" >
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="keyword">คำสำคัญ</label>
                                <select id="keyword" name="keyword"  class="form-control select2"  >
                                <option selected="selected" value="พื้นฐาน">พื้นฐาน</option>
                                <option value="การแสดงผล">การแสดงผล</option>
                                <option value="ชนิดข้อมูล">ชนิดข้อมูล</option>
                                <option value="การกำหนดเงื่อนไข">การกำหนดเงื่อนไข</option>
                                <option value="การวนทำซ้ำ">การวนทำซ้ำ</option>
                                <option value="ตัวแปรเเถวลำดับ">ตัวแปรเเถวลำดับ</option>
                                <option value="ตัวแปรโครงสร้าง">ตัวแปรโครงสร้าง</option>
                                <option value="ตัวแปรงชี้ตำแหน่ง">ตัวแปรงชี้ตำแหน่ง</option>
                                <option value="ฟังก์ชัน">ฟังก์ชัน</option>
                                <option value="ไฟล์">ไฟล์</option>
                                </select>
                             </div>
                            <div class="form-group col-md-12 ">
                                <label for="ID_Teacher">รหัสผู้สอน</label>
                                <input type="text" class="form-control"  id="ID_Teacher" name="ID_Teacher" readonly>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="Detail">รายละเอียด</label>
                                <textarea cols="30" rows="10" class="form-control" id="Detail" name="Detail" > </textarea>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="banner">ไฟล์บทเรียน (ขนาดไฟล์ไม่เกิน 2 MB)</label>
                                <input type="file"  id="banner" name="banner" required>
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


<!-- คำสั่งเรียกเพิ่มข้อมูลในแว่นขยาย -->
<form method="post" action="function/t_test_add.php">
    <div class="modal modal-default fade" id="Modaladdtest" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>เพิ่มข้อมูลแบบทดสอบปรนัย</h3>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                    
                        <div class="form-group col-md-12 ">
                                <label for="No">ลำดับข้อ</label>
                                <input  type="text" class="form-control"   name="No" >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Question" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice1">ตัวเลือกที่ 1</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Choice1" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Choice2">ตัวเลือกที่ 2</label>
                                <textarea cols="20" rows="5" class="form-control"   name="Choice2" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice3">ตัวเลือกที่ 3</label>
                                <textarea cols="20" rows="5" class="form-control" name="Choice3" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Choice4">ตัวเลือกที่ 4</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Choice4" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Answer">เฉลย</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Answer" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_lesson">รหัสบทเรียน</label>
                                <textarea type="text" class="form-control"  name="ID_lesson" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_course">รหัสชั้นเรียน</label>
                                <textarea type="text" class="form-control"  name="ID_course" readonly><?=$id_course?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_teacher">รหัสอาจารย์</label>
                                <textarea type="text" class="form-control"  name="ID_teacher" readonly><?=$session_id?></textarea>
                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="keyword">คำสำคัญ</label>
                                <select id="keyword" name="keyword" class="form-control select2"  >
                                <option value="0">กรุณาเลือกคำสำคัญ</option>
                                <option value="พื้นฐาน">พื้นฐาน</option>
                                <option value="การแสดงผล">การแสดงผล</option>
                                <option value="ชนิดข้อมูล">ชนิดข้อมูล</option>
                                <option value="การกำหนดเงื่อนไข">การกำหนดเงื่อนไข</option>
                                <option value="การวนทำซ้ำ">การวนทำซ้ำ</option>
                                <option value="ตัวแปรเเถวลำดับ">ตัวแปรเเถวลำดับ</option>
                                <option value="ตัวแปรโครงสร้าง">ตัวแปรโครงสร้าง</option>
                                <option value="ตัวแปรงชี้ตำแหน่ง">ตัวแปรงชี้ตำแหน่ง</option>
                                <option value="ฟังก์ชัน">ฟังก์ชัน</option>
                                <option value="ไฟล์">ไฟล์</option>
                                </select>
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
<form method="post" action="function/t_test_add_code.php">
    <div class="modal modal-default fade" id="Modaladdtestcode" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3>เพิ่มข้อมูลแบบทดสอบอัตนัย</h3>
                    </div>
                    <div class="modal-body">
                    <div class="box-body">
                    <div class="form-group col-md-6 ">
                                <label for="No">ลำดับข้อ</label>
                                <input type="text" class="form-control"   name="No" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_lesson">รหัสบทเรียน</label>
                                <textarea type="text" class="form-control"  name="ID_lesson" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Question">คำถาม</label>
                                <textarea cols="20" rows="5" class="form-control" name="Question" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Ex_code">โค้ดเฉลย</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Ex_code" ></textarea>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="Answer">ผลลัพธ์</label>
                                <textarea cols="20" rows="5" class="form-control"   name="Answer" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint1">ตัวช่วยที่ 1</label>
                                <textarea cols="20" rows="5" class="form-control"  name="Hint1" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hin2">ตัวช่วยที่ 2</label>
                                <textarea cols="20" rows="5" class="form-control" name="Hint2" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Hint3">ตัวช่วยที่ 3</label>
                                <textarea cols="20" rows="5" class="form-control" name="Hint3" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_course">รหัสชั้นเรียน</label>
                                <textarea type="text" class="form-control"  name="ID_course" readonly><?=$id_course?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ID_teacher">รหัสอาจารย์</label>
                                <textarea type="text" class="form-control"  name="ID_teacher" readonly><?=$session_id?></textarea>
                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label for="keyword">คำสำคัญ</label>
                                <select id="keyword" name="keyword" class="form-control select2"  >
                                <option value="0">กรุณาเลือกคำสำคัญ</option>
                                <option value="พื้นฐาน">พื้นฐาน</option>
                                <option value="การแสดงผล">การแสดงผล</option>
                                <option value="ชนิดข้อมูล">ชนิดข้อมูล</option>
                                <option value="การกำหนดเงื่อนไข">การกำหนดเงื่อนไข</option>
                                <option value="การวนทำซ้ำ">การวนทำซ้ำ</option>
                                <option value="ตัวแปรเเถวลำดับ">ตัวแปรเเถวลำดับ</option>
                                <option value="ตัวแปรโครงสร้าง">ตัวแปรโครงสร้าง</option>
                                <option value="ตัวแปรงชี้ตำแหน่ง">ตัวแปรงชี้ตำแหน่ง</option>
                                <option value="ฟังก์ชัน">ฟังก์ชัน</option>
                                <option value="ไฟล์">ไฟล์</option>
                                </select>
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
$(document).on("click", ".open-AddBookDialog10", function () {

    var ID_lesson           = $(this).data('id_lesson');
          $(".modal-body #ID_lesson").val( ID_lesson );

          var Lessonname            = $(this).data('lessonname');
          $(".modal-body #Lessonname").val(Lessonname );

          var keyword            = $(this).data('keyword');
          $(".modal-body #keyword").val(keyword );

          var ID_Teacher           = $(this).data('id_teacher');
          $(".modal-body #ID_Teacher").val( ID_Teacher  );

          var Detail         = $(this).data('detail');
          $(".modal-body #Detail").val( Detail  );

          var Lessonfile1   = $(this).data('lessonfile1');
          $(".modal-body #Lessonfile1").val( Lessonfile1 );
			
          var Lessonfile2    = $(this).data('lessonfile2');
          $(".modal-body #Lessonfile2 ").val(Lessonfile2);


$('#Modaleditlesson').modal('show');
});

    /* คำสั่งเรียกดูข้อมูลในแว่นขยาย */
    $(document).on("click", ".open-AddBookDialog9", function () {

var ID_course           = $(this).data('id_course');
$(".modal-body #ID_course").val( ID_course );

var Coursename           = $(this).data('coursename');
$(".modal-body #Coursename").val( Coursename );

var Detail           = $(this).data('detail');
$(".modal-body #Detail").val( Detail );


$('#Modaledit_course').modal('show');
});

  /* คำสั่งเรียกเพิ่มข้อมูลข้อสอบแบบตัวเลือกในแว่นขยาย */
  $(document).on("click", ".open-AddBookDialogtest", function () {

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

        var Answer     = $(this).data('answer');
        $(".modal-body #Answer").val( Answer );
        
        var ID_lesson     = $(this).data('id_lesson');
        $(".modal-body #ID_lesson").val( ID_lesson );

        var ID_course     = $(this).data('id_course');
        $(".modal-body #ID_course").val( ID_course );

        var ID_teacher     = $(this).data('id_teacher');
        $(".modal-body #ID_teacher").val( ID_teacher );

        var keyword            = $(this).data('keyword');
          $(".modal-body #keyword").val(keyword );


        $('#Modaltest').modal('show');
});

</script>
<script>
        $(document).on("click", ".open-AddBookDialog5", function () {

            var id_course           = $(this).data('id_course');
           $(".modal-body #ID_course").val(id_course);
           var id_member           = $(this).data('id_member');
           $(".modal-body #ID_member").val(id_member);
           
            $('#Modaladd').modal('show');
        });
        </script>
</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>