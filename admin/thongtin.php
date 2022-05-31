<?php session_start(); ?>
               <?php
require_once '../lib/connection.php';
?>
<?php
	$sql = 'SELECT * FROM users where id = '.$_SESSION['user_id'];
	$query = mysqli_query($conn,$sql);
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Thông tin tài khoản</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Họ và tên</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Số điện thoại</th>
                                            <th class="border-top-0">Số dư</th>
                                            <th class="border-top-0">Chỉnh sửa thông tin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ( $data = mysqli_fetch_array($query) ) { ?>
                                        <tr>
                                            <th><?php echo $data['id']; ?></th>
                                            <th><?php echo $data['fullname']; ?></th>
                                            <th><?php echo $data['email']; ?></th>
                                            <th><?php echo $data['phone']; ?></th>
                                            <th><?php echo $data['money']; ?></th>
                                            <th><a href="thaydoithongtin.php?id=<?php echo $data['id']; ?>">Thay đổi thông tin</a></th>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            