    <?php
    include '../lib/connection.php';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $filename = "user_data.xls";
    header("Content-Disposition: attachment; filename=\"$filename\"");
     ?>
     <?php
    require_once '../lib/connection.php';
    $q = mysqli_query($conn, "SELECT * FROM users");
    ?>
    <style type="text/css">
        td {
            border: 1px solid black;
        }
        th {
            border: 1px solid black;
        }
    </style>
     <table class="table text-nowrap">
                                    <thead>
                                        <tr >
                                            <th class="border-top-0" >ID</th>
                                            <th class="border-top-0">Ho va ten</th>
                                            <th class="border-top-0">Tai khoan</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">So dien thoai</th>
                                            <th class="border-top-0">Quyen</th>
                                            <th class="border-top-0">So du tai khoan</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php while ($row = mysqli_fetch_array($q)){
                                            $id = $row['id'];?>
                                        <tr >
                                            <td><?php echo $row['id'] ?></a></h3></td>
                                            <td><?php echo $row['fullname'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php if($row['thanhvien']== 1){ echo "Người dùng";}else{ echo "Quản trị viên";} ?></td>
                                            <td><?php echo $row['money'] ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>