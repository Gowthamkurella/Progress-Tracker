<?php 

header("Content-Type:text/event-stream");
header("Cache-Control:no-control");
session_start();
include "connect.php";
if(empty($_SESSION['STUDENT_ID']))
{
    echo '<script>document.location="student-login.php"</script>';
}
else{

    $student_id = $_SESSION['STUDENT_ID'];
	$class_id = $_SESSION['CLASS_ID'];
	$school_id = $_SESSION['SCHOOL_ID'];
 
    $sql="select * from student where student_id='$student_id'";
    $run = mysqli_query($con,$sql)or die(''.__LINE__.'<br>'.mysqli_error($con));
    $run = mysqli_fetch_assoc($run);
    if(!empty($run))
    {
        $school_id = $run['school_id'];
        $student_id = $run['student_id'];
        $student_name = $run['student_name'];
        $student_email = $run['email'];
        $student_password = $run['gender'];
        $student_address = $run['address'];
        $student_dob = $run['date_of_birth'];
        $student_classid= $run['class_id'];


      $qu1 = mysqli_query($con , "SELECT student_id,sum(marks) as marks from sports_marks where school_id='$school_id' GROUP BY student_id order by marks desc");
      $var3=0;
      foreach($qu1 as $data)
      {
          $var3=$var3+1;
          if($data['student_id']==$student_id)
          {
              $rank3 = $var3;
              break;
          }
      }
    }
}
echo "data:".$rank3."\n\n";

?>