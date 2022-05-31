<?php
    include '../lib/connection.php';
    header('Content-Type: application/vnd-ms-excel');
    $filename = "user_data.xls";
    header("Content-Disposition: attachment; filename=\"$filename\"");
     ?>
     <?php
require_once '../lib/connection.php';
    $q = mysqli_query($conn, "SELECT * FROM phukien")
?>
    <style type="text/css">
        td {
            border: 1px solid black;
        }
        th {
            border: 1px solid black;
        }
    </style>
     <table class="table text-nowrap">
                                    <thead>
                                        <tr >
                                            <th class="border-top-0" >MASP</th>
                                            <th class="border-top-0">Ten SP/th>
                                            <th class="border-top-0">So luong</th>
                                            <th class="border-top-0">Gia San Pham</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php while ($row = mysqli_fetch_array($q)){
                                            ?>
                                        <tr >
                                            <td><?php echo $row['masp'] ?></a></h3></td>
                                            <td><?php echo $row['tensp'] ?></td>
                                            <td><?php echo $row['soluong'] ?></td>
                                            <td><?php echo $row['gia'] ?></td>
                                            
                                        </tr>
                                    <?php }  ?>
                                    </tbody>
                                </table>