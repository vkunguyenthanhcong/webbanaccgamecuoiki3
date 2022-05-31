              <?php session_start() ?>
              <?php
require_once '../lib/connection.php';
    $id = $_SESSION['user_id'];
    $q = mysqli_query($conn, "SELECT * FROM giohang WHERE id = '$id'");
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Giỏ hàng của bản thân</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Mã Sản Phẩm</th>
                                            <th class="border-top-0">Tên Sản Phẩm</th>
                                            <th class="border-top-0">Số lượng</th>
                                            <th class="border-top-0">Tổng giá</th>
                                            <th class="border-top-0">Đã đặt hàng</th>
                                            <th class="border-top-0">Tình trạng đơn hàng</th>
                                            <th class="border-top-0"><a href="them-event.php" style="color: black">Lựa chọn</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($q)){ 
                                            $stt = $row['stt'];?>
                                        <tr>
                                            <td><?php echo $row['stt'] ?></a></h3></td>
                                            <td><?php echo $row['masp'] ?></td>
                                            <td><?php echo $row['tensp'] ?></td>
                                            <td><?php echo $row['soluong'] ?></td>
                                            <td><?php echo $row['giatong'] ?></td>
                                            <td><?php if($row['diachi'] == 0){
                                                echo "Chưa đặt hàng";
                                            }else{echo "Đã đặt hàng";} ?></td>
                                            <td><?php echo $row['tinhtrang'] ?></td>
                                            <td>
                                                <a href="xoagiohang.php?stt=<?php echo $stt;?>" style="color : red; margin-left: 10px;">Xoá</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                