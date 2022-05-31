 <?php
require_once '../lib/connection.php';
    $key = $_GET['timkiem'];
    
    $sql = "SELECT * FROM users WHERE (id = '$key' or phone ='$key' or email ='$key')";
    $ketqua = mysqli_query($conn, $sql);
?>
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Họ và tên</th>
                                            <th class="border-top-0">Tài khoản</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Số điện thoại</th>
                                            <th class="border-top-0">Quyền</th>
                                            <th class="border-top-0">Số dư</th>
                                            <th class="border-top-0"><a href="them-thanhvien.php" style="color: black">Hành động</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = mysqli_fetch_array($ketqua);?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></a></h3></td>
                                            <td><?php echo $row['fullname'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php if($row['thanhvien']== 1){ echo "Người dùng";}else{ echo "Quản trị viên";} ?></td>
                                            <td><?php echo $tien = number_format($row['money'],0,'.','.'); ?> VNĐ</td>
                                            <td><a href="sua-thongtin.php?id=<?php echo $id;?>" style="color: blue">Sửa</a>
                                                <a href="xoa-taikhoan.php?id_delete=<?php echo $id;?>" style="color : red; margin-left: 10px;">Xoá</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>