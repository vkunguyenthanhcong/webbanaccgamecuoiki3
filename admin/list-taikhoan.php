                <?php
                require_once '../lib/connection.php';
                $q = mysqli_query($conn, "SELECT * FROM users");
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Danh sác tài khoản</h3>
                            <div class="row">
                            <div class="col-sm-6">
                            <form method="POST" action="export.php">
                                <button type="submit" name="export">Export file</button>
                            </form>
                            </div>
                            <div class="col-sm-6">
                                    <input type="text" id="idtimkiem" name="idtimkiem" placeholder="Tìm kiếm theo ID, SDT, EMAIL...    ">
                                    <button class="btn btn-success" id="nuttimkiem" name="nuttimkiem">Tìm kiếm</button>
                                
                            </div>
                            </div>
                            
                            <div class="table-responsive" id="table">
                                <table class="table text-nowrap" >
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
                                        <?php while ($row = mysqli_fetch_array($q)){ 
                                            $id = $row['id'];?>
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
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#nuttimkiem").click(function(event){
                        event.preventDefault();
                        var	idtimkiem = $('#idtimkiem').val();
                        $.ajax({
                            url: "timkiem-nguoidung.php?timkiem=" + idtimkiem,
                            success: function(query){
                                    $('#table').html(query)
                                }
                                });
                        });    
                    });
                </script>