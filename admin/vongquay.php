
<?php
require_once '../lib/connection.php';
$q = mysqli_query($conn, "SELECT * FROM quavongquay");
?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Danh sách Acc Liên Quân</h3>

            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                    <tr>
                        <th class="border-top-0">ID</th>
                        <th class="border-top-0">Quà tặng</th>
                        <th class="border-top-0">Hình ảnh</th>
                        <th class="border-top-0">Tỉ lệ phần trăm</th>
                        <th class="border-top-0"><a href="them-qua.php" style="color: black">Thêm quà</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_array($q)){?>
                        <tr>
                            <td><?php echo $row[0]?></td>
                            <td><?php echo $row[1]?></td>
                            <td><img src="../photo/<?php echo $row[2]?>" style="width: 100px"></td>
                            <td><?php echo $row[4]?></td>
                            <td><a href="suaqua.php?suaqua=<?php echo $row[0] ?>" style="color: blue">Sửa</a>
                                <a href="suaqua.php?suaqua_delete=<?php echo $row[0] ?>" style="color : red; margin-left: 10px;">Xoá</a>
                            </td>
                        </tr>
                    <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            