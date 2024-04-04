<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $sql = "UPDATE employee SET
        emp_name = '".$_POST['emp_name']."',
        emp_sex = '".$_POST['emp_sex']."',
        emp_add = '".$_POST['emp_add']."',
        emp_position = '".$_POST['emp_position']."',
        emp_salary = '".$_POST['emp_salary']."',
        emp_tel = '".$_POST['emp_tel']."',
        emp_in = '".$_POST['emp_in']."',
        bra_id = '".$_POST['bra_id']."'
        WHERE emp_id = '".mysqli_real_escape_string($connect, $_POST['bra_id'])."' ";

        if (mysqli_query($connect, $sql)){
            echo '<script> alert("อัพเดตข้อมูลเสร็จเรียบร้อย")</script>';
            header('Refresh:0; url= index.php');
        }else{
            echo '<script> alert("อัพเดตข้อมูลไม่สำเร็จ")</script>';
            header('Refresh:0; url= edit.php');
        }
}
mysqli_close($connect);
?>