<?php
require_once './Student.php';
use App\classes\Student;
  $student=new Student();
  $queryResult= $student->getAllStudentInfo();
  if(isset($_GET['status'])){
      $student->deleteStudentInfo($_GET['id']);
  }

  if(isset($_POST['btn'])){
      $queryResult = $student->searchStudentInfoBySearchText();
  }


?>
<a href="index.php">Add Student</a>||
<a href="view-student.php">View Student</a>
<hr/>
<form action="" method="post">
    <table>
        <tr>
            <th>Enter Your Search Item</th>
            <td><input type="text" name="search_text"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Search"/> </td>
        </tr>
    </table>

</form>
<hr/>


<table border="1px" width="800">
    <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Email Address</th>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>
 <?php while($student=mysqli_fetch_assoc($queryResult)){?>
    <tr>
        <td><?php echo $student['id'];?></td>
        <td><?php echo $student['name'];?></td>
        <td><?php echo $student['email'];?></td>
        <td><?php echo $student['phone'];?></td>
        <td>
            <a href="edit-student.php?id=<?php echo $student['id'];?>">Edit</a>
            <a href="?status=delete&id=<?php echo $student ['id'];?>">Delete</a>
        </td>

    </tr>
    <?php } ?>
</table>
