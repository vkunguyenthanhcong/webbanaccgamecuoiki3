
                <?php
require_once '../lib/connection.php';
$q = mysqli_query($conn, "SELECT * FROM phukien");
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Danh sác phụ kiện</h3>
                            <form method="POST" action="exportphukien.php">
                                <button type="submit" name="export">Export file</button>
                            </form>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Mã Sản Phẩm</th>
                                            <th class="border-top-0">Tên Sản Phẩm</th>
                                            <th class="border-top-0">Loại Sản Phẩm</th>
                                            <th class="border-top-0">Số Lượng</th>
                                            <th class="border-top-0">Giá Sản Phẩm</th>
                                            <th class="border-top-0"><a href="them-phukien.php" style="color: black">Thêm phụ kiện</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($q)){
                                            $id = $row['masp'];?>
                                        <tr>
                                            <td><?php echo $row['masp'] ?></a></h3></td>
                                            <td><?php echo $row['tensp'] ?></td>
                                            <td><?php echo $row['loai'] ?></td>
                                            <td><?php echo $row['soluong'] ?></td>
                                            <td><?php $a = number_format($row['gia'],0,'.','.'); echo $a ?></td>
                                            <td><a href="sua-phukien.php?id=<?php echo $id;?>" style="color: blue">Sửa</a>
                                                <a href="xoa-phukien.php?id_delete=<?php echo $id;?>" style="color : red; margin-left: 10px;">Xoá</a>
                                            </td>
                                        </tr>
                                    <?php } ; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>