<?php 
include("../lib/connection.php");
if(isset($_GET['stt'])){
    $stt = $_GET['stt'];

    $sl="update giohang set tinhtrang='Đã gửi hàng đi' where stt='$stt'";
    if(mysqli_query($conn, $sl)){

?>

<?php
require_once '../lib/connection.php';
$q = mysqli_query($conn, "SELECT * FROM giohang");
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Các đơn đặt hàng</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Đã đặt</th>
                                            <th class="border-top-0">Tên sản phẩm</th>
                                            <th class="border-top-0">Số lượng</th>
                                            <th class="border-top-0">Tổng giá</th>
                                            <th class="border-top-0">Địa chỉ</th>
                                            <th class="border-top-0">Tên người mua</th>
                                            
                                            <th class="border-top-0">Số điện thoại</th>
                                            
                                            <th class="border-top-0">Ngày đặt</th>
                                            <th class="border-top-0">Tình trạng đơn hàng</th>
                                            <th class="border-top-0"><a  style="color: black">Xác nhận đã giao hàng</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($q)){
                                            ?>
                                        <tr>
                                            <td><?php echo $row['stt'] ?></a></h3></td>
                                            <td><?php if($row['diachi'] == '0'){echo "Chưa đặt";}else{echo "Đã đặt";} ?></td>
                                            <td><?php echo $row['tensp'] ?></td>
                                            <td><?php echo $row['soluong'] ?></td>
                                            <td><?php $a = number_format($row['giatong'],0,'.','.'); echo $a ?></td>
                                            <td><?php echo $row['diachi'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['ngaydat'] ?></td>
                                            <td><?php echo $row['tinhtrang'] ?></td>
                                            <td><a onclick="dagui(<?php echo $row['stt'];  ?>)" id="dagui" class="btn" style="color: blue">Đã gửi hàng đi |</a>
                                            <a onclick="dagiao(<?php echo $row['stt'];  ?>)" class="btn"  style="color: blue">Đã giao thành công</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
<?php
} }
?>
<?php 
include("../lib/connection.php");
if(isset($_GET['hoanthanh'])){
    $hoanthanh = $_GET['hoanthanh'];

    $sll="update giohang set tinhtrang='Giao hàng thành công' where stt='$hoanthanh'";
    mysqli_query($conn, $sll)
?>

<?php
require_once '../lib/connection.php';
$q = mysqli_query($conn, "SELECT * FROM giohang");
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Các đơn đặt hàng</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Đã đặt</th>
                                            <th class="border-top-0">Tên sản phẩm</th>
                                            <th class="border-top-0">Số lượng</th>
                                            <th class="border-top-0">Tổng giá</th>
                                            <th class="border-top-0">Địa chỉ</th>
                                            <th class="border-top-0">Tên người mua</th>
                                            
                                            <th class="border-top-0">Số điện thoại</th>
                                            
                                            <th class="border-top-0">Ngày đặt</th>
                                            <th class="border-top-0">Tình trạng đơn hàng</th>
                                            <th class="border-top-0"><a  style="color: black">Xác nhận đã giao hàng</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($q)){
                                            ?>
                                        <tr>
                                            <td><?php echo $row['stt'] ?></a></h3></td>
                                            <td><?php if($row['diachi'] == '0'){echo "Chưa đặt";}else{echo "Đã đặt";} ?></td>
                                            <td><?php echo $row['tensp'] ?></td>
                                            <td><?php echo $row['soluong'] ?></td>
                                            <td><?php $a = number_format($row['giatong'],0,'.','.'); echo $a ?></td>
                                            <td><?php echo $row['diachi'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['ngaydat'] ?></td>
                                            <td><?php echo $row['tinhtrang'] ?></td>
                                            <td><a onclick="dagui(<?php echo $row['stt'];  ?>)" id="dagui" class="btn" style="color: blue">Đã gửi hàng đi |</a>
                                            <a onclick="dagiao(<?php echo $row['stt'];  ?>)" class="btn" style="color: blue">Đã giao thành công</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
<?php } ?>