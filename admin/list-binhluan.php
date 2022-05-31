
               <?php
require_once '../lib/connection.php';
$q = mysqli_query($conn, "SELECT * FROM binhluan");
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Danh sách bình luận</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Nội dung bình luận</th>
                                            <th class="border-top-0">Mã SP</th>
                                            <th class="border-top-0">Tên người dùng</th>
                                            <th class="border-top-0">Ngày bình luận</th>
                                            <th class="border-top-0"><a href="them-event.php" style="color: black">Thêm sản phẩm</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($q)){
                                            $stt = $row['stt'];?>
                                        <tr>
                                            <td><?php echo $row['stt'] ?></a></h3></td>
                                            <td><?php echo $row['binhluan'] ?></td>
                                            <td><?php echo $row['masp'] ?></td>
                                            <td><?php echo $row['tennguoidung'] ?></td>
                                            <td><?php echo $row['ngaybl'] ?></td>
                                            <td>
                                                <a href="xoa-acc.php?binhluan=<?php echo $stt;?>" style="color : red; margin-left: 10px;">Xoá</a>
                                            </td>
                                        </tr>
                                    <?php } ; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>