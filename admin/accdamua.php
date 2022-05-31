
    <?php session_start();?>
               <?php
require_once '../lib/connection.php';
$id = $_SESSION['user_id'];
    $sql = mysqli_query($conn, "SELECT * FROM accdamua WHERE id = '$id'");
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Tài khoản đã mua của bản thân</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Tài khoản</th>
                                            <th class="border-top-0">Mật khẩu</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($sql)) { 
                                            $stt = $row['stt'];?>
                                        <tr>
                                            <td><?php echo $row['stt'] ?></a></h3></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['password'] ?></td>
                                            
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
           