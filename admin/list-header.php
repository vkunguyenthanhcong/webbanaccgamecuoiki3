
                <?php
require_once '../lib/connection.php';
    $q = mysqli_query($conn, "SELECT * FROM header")
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Danh sác header</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Tên</th>
                                            <th class="border-top-0">Link</th>
                                            <th class="border-top-0"><a href="them-header.php" style="color: black">Thêm header</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($q)){
                                            $stt = $row['stt'];?>
                                        <tr>
                                            <td><?php echo $row['stt'] ?></a></h3></td>
                                            <td><?php echo $row['ten'] ?></td>
                                            <td><?php echo $row['link'] ?></td>
                                            <td><a href="sua-header.php?stt=<?php echo $stt;?>" style="color: blue">Sửa</a>
                                                <a href="xoa-header.php?stt_delete=<?php echo $stt;?>" style="color : red; margin-left: 10px;">Xoá</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
