
               <?php
require_once '../lib/connection.php';
$q = mysqli_query($conn, "SELECT * FROM acc WHERE game = 'freefire'");
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Danh sách Acc Free Fire</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Mã ACC</th>
                                            <th class="border-top-0">Tài khoản</th>
                                            <th class="border-top-0">Mật khẩu</th>
                                            <th class="border-top-0">Giới thiệu</th>
                                            <th class="border-top-0">Giá</th>
                                            <th class="border-top-0">Thẻ vô cực</th>
                                            <th class="border-top-0">Bán / Chưa</th>
                                            <th class="border-top-0">Rank</th>
                                            <th class="border-top-0">Tình trạng</th>
                                            <th class="border-top-0">Ngày đăng</th>
                                            <th class="border-top-0"><a href="them-acc.php" style="color: black">Thêm tài khoản</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($q)){
                                            $maacc = $row['maacc'];?>
                                        <tr>
                                            <td><?php echo $row['maacc'] ?></a></h3></td>
                                            <td><?php echo $row['taikhoan'] ?></td>
                                            <td><?php echo $row['matkhau'] ?></td>
                                            <td><?php echo $row['gioithieu'] ?></td>
                                            <td><?php $a = number_format($row['gia'],0,'.','.'); echo $a ?></td>
                                            <td><?php echo $row['thevocuc'] ?></td>
                                            <td><?php if($row['damua']=='true'){echo "Đã bán";}else{echo "Chưa bán";} ?></td>
                                            <td><?php echo $row['rank'] ?></td>
                                            <td><?php echo $row['trangthai'] ?></td>
                                            <td><?php echo $row['createdate'] ?></td>
                                            <td><a href="sua-acc.php?maacc=<?php echo $maacc;?>" style="color: blue">Sửa</a>
                                                <a href="xoa-acc.php?maacc_delete=<?php echo $maacc;?>" style="color : red; margin-left: 10px;">Xoá</a>
                                            </td>
                                        </tr>
                                    <?php } ; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            