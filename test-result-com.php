<?php
include 'function/connect.php';

$A = 'Hello GALAX C.
This is my Program C.
I am a Tutor Web Programmer.';

$sql = "SELECT * FROM test_command join lesson on test_command.ID_lesson = lesson.ID_lesson
      WHERE test_command.No = 2 AND test_command.ID_lesson =  2 ORDER BY lessonname";
       $result = $conn->query($sql);
    
       $row = $result->fetch_array(MYSQLI_BOTH) ;
               $id=$row['ID'];
               $no=$row['No'];
               $question=$row['Question'];
               $hint1=$row['Hint1'];
               $hint2=$row['Hint2'];
               $hint3=$row['Hint3'];
               $answer=$row['Answer'];
               $ex_code=$row['Ex_code'];
echo $A;
echo "<br>";
echo $answer;


?>