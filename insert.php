<?php include 'connect.php'; ?>

<?php
    $sql = "SELECT * FROM `branch`";
    $all_branch = mysqli_query($connect,$sql);

    if(isset($_POST['submit']))
    {
        $emp_id = $_POST['emp_id'];
        $emp_name = $_POST['emp_name'];
        $emp_sex = $_POST['emp_sex'];
        $emp_add = $_POST['emp_add'];
        $emp_position = $_POST['emp_position'];
        $emp_salary = $_POST['emp_salary'];
        $emp_tel = $_POST['emp_tel'];
        $emp_in = $_POST['emp_in'];
        $bra_id = mysqli_real_escape_string($connect,$_POST['bra_id']);

        $sql_insert = "INSERT INTO employee(emp_id, emp_name, emp_sex, emp_add, emp_position, emp_salary, emp_tel, emp_in, bra_id)
            VALUES ('$emp_id','$emp_name','$emp_sex','$emp_add','$emp_position','$emp_salary','$emp_tel','$emp_in','$bra_id')";
            
            if(mysqli_query($connect,$sql_insert))
            {
                echo '<script>alert("บันทึกข้อมูลพนักงาน เรียบร้อย"); 
                window.location="index.php";</script>';
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลพนักงาน</title>
    <style>
        label {
            display: inline-block;
            width: 90px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>เพิ่มข้อมูลพนักงาน</h1>
    <form method="post">
        <label>รหัสพนักงาน</label>
        <input type="text" name="emp_id">
        <br>

        <label>ชื่อพนักงาน</label>
        <input type="text" name="emp_name">
        <br>

        <label>เพศ</label> 
        <input type="radio" name="emp_sex" value="ชาย">ชาย
        <input type="radio" name="emp_sex" value="หญิง">หญิง
        <input type="radio" name="emp_sex" value="อื่นๆ">อื่น ๆ
        
        <br>

        <label>ที่อยู่</label>
        <input type="text" name="emp_add">
        <br>

        <label>ตำแหน่ง</label>
        <input type="text" name="emp_position">
        <br>

        <label>เงินเดือน</label>
        <input type="text" name="emp_salary">
        <br>

        <label>เบอร์โทร.</label>
        <input type="text" name="emp_tel">
        <br>

        <label>วันที่เริ่มงาน</label>
        <input type="date" name="emp_in">
        <br>

        <label>สาขา</label>
        <select name="bra_id">
            <?php
                while ($branch = mysqli_fetch_array($all_branch,MYSQLI_ASSOC)):;
            ?>
            
            <option value="<?php echo $branch["bra_id"]; ?>">
                <?php echo $branch["bra_name"]; ?>
            </option>

        <?php
            endwhile;
        ?>
        </select>
        <br>

        <input type="submit" name="submit" value="บันทึกข้อมูล" >
        <input type="button" value="ยกเลิก" onclick="document.location='index.php'">
    </form>


</body>
</html>