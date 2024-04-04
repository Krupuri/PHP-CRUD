<?php include 'connect.php';
$result = mysqli_query($connect, "SELECT * FROM employee");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP โดย MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    a {
      color: crimson;
    }

    button {
      font-size: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>ข้อมูลพนักงาน</h1>

    <button onclick="document.location='insert.php'" class="btn btn-success">เพิ่มข้อมูล</button>

    <table class="table table-striped table-bordered table-hover table-responsive">
      <thead class="table-dark">
        <tr align="center">
          <th>รหัสพนักงาน</th>
          <th>ชื่อพนักงาน</th>
          <th>เพศ</th>
          <th>ที่อยู่</th>
          <th>ตำแหน่ง</th>
          <th>เงินเดือน</th>
          <th>เบอร์โทร.</th>
          <th>วันที่เริ่มงาน</th>
          <th>สาขา</th>
          <th>แก้ไขข้อมูล</th>
          <th>ลบข้อมูล</th>
        </tr>
      </thead>
      <?php while ($row = mysqli_fetch_array($result)): ?>
        <tr>
          <td>
            <?php echo $row['emp_id'] ?>
          </td>
          <td>
            <?php echo $row['emp_name'] ?>
          </td>
          <td>
            <?php echo $row['emp_sex'] ?>
          </td>
          <td>
            <?php echo $row['emp_add'] ?>
          </td>
          <td>
            <?php echo $row['emp_position'] ?>
          </td>
          <td>
            <?php echo $row['emp_salary'] ?>
          </td>
          <td>
            <?php echo $row['emp_tel'] ?>
          </td>
          <td>
            <?php echo $row['emp_in'] ?>
          </td>
          <td>
            <?php echo $row['bra_id'] ?>
          </td>

          <td align="center">
            <a href="edit.php?emp_id=<?php echo $row['emp_id'] ?>">แก้ไข</a>
          </td>

          <td align="center">
            <a href="JavaScript:if(confirm('คุณต้องการลบ หรือไม่')==true){window.location='delete.php?emp_id=<?php echo $row["emp_id"]; ?>';}">ลบ</a>
          </td>

        </tr>
      <?php endwhile; ?>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>