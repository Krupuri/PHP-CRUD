<?php
include 'connect.php';

if (isset($_GET['emp_id'])) {
    $emp_id = $_GET['emp_id'];
    $sql = "SELECT * FROM employee WHERE emp_id=$emp_id";
    $result = $connect->query($sql);
    $row = mysqli_fetch_array($result);
    $num = $result->num_rows;
    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="container">
        <div class="row">
            <h1>แก้ไขข้อมูลพนักงาน</h1>
            <?php
            $sql = "SELECT * FROM `branch`";
            $all_branch = mysqli_query($connect, $sql);
            ?>

            <form method="POST" action="action_edit.php">
                <label>รหัสพนักงาน</label>
                <input type="text" id="emp_id" name="emp_id" value="<?php echo $row['emp_id'] ?>" readonly>
                <br>

                <label>ชื่อพนักงาน</label>
                <input type="text" id="emp_name" name="emp_name" value="<?php echo $row['emp_name'] ?>" required>
                <br>

                <label>เพศ</label>
                <input type="radio" id="male" name="emp_sex" value="ชาย" required>ชาย
                <input type="radio" id="female" name="emp_sex" value="หญิง" required>หญิง
                <input type="radio" id="lgbtq" name="emp_sex" value="LGBTQ+" required>LGBTQ+
                <br>

                <label>ที่อยู่</label>
                <input type="text" id="emp_add" name="emp_add" value="<?php echo $row['emp_add'] ?>">
                <br>

                <label>ตำแหน่ง</label>
                <input type="text" id="emp_position" name="emp_position" value="<?php echo $row['emp_position'] ?>">
                <br>

                <label>เงินเดือน</label>
                <input type="text" id="emp_salary" name="emp_salary" value="<?php echo $row['emp_salary'] ?>">
                <br>

                <label>เบอร์โทร.</label>
                <input type="text" id="emp_tel" name="emp_tel" value="<?php echo $row['emp_tel'] ?>">
                <br>

                <label>วันที่เริ่มงาน</label>
                <input type="date" id="emp_id" name="emp_in" value="<?php echo $row['emp_in'] ?>">
                <br>

                <label>สาขา</label>
                <select id="bra_id" name="bra_id" value="<?php echo $row['bra_id'] ?>">
                    <?php
                    while ($branch = mysqli_fetch_array($all_branch, MYSQLI_ASSOC)):
                        ;
                        ?>

                        <option value="<?php echo $branch["bra_id"] ?>">
                            <?php echo $branch["bra_name"] ?>
                        </option>

                        <?php
                    endwhile;
                    ?>
                </select>
                <br>

                <button type="submit" name="submit">อัพเดตข้อมูล</button>

                <input type="button" value="ยกเลิก" onclick="document.location='index.php'">
            </form>
        </div>
    </div>

<?php } else {
    echo 'Error!';
} ?>