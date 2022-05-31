
               <?php
require_once '../lib/connection.php';
    $q = mysqli_query($conn, "SELECT * FROM event");
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Danh sách event</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Tên event</th>
                                            <th class="border-top-0">Số lượng</th>
                                            <th class="border-top-0">Link</th>
                                            <th class="border-top-0">Ngày thêm</th>
                                            <th class="border-top-0"><a href="them-event.php" style="color: black">Thêm sản phẩm</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($q)) {
                                            $stt = $row['stt'];?>
                                        <tr>
                                            <td><?php echo $row['stt'] ?></a></h3></td>
                                            <td><?php echo $row['ten'] ?></td>
                                            <td><?php echo $row['soluong'] ?></td>
                                            <td><?php echo $row['link'] ?></td>
                                            <td><?php echo $row['createdate'] ?></td>
                                            <td><a href="sua-event.php?stt=<?php echo $stt;?>" style="color: blue">Sửa</a>
                                                <a href="xoa-event.php?stt_delete=<?php echo $stt;?>" style="color : red; margin-left: 10px;">Xoá</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                