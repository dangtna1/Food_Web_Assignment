<table>
    <thead>
        <td>SỐ LƯỢNG</td>
        <td>TÊN MÓN ĂN</td>
        <td>ĐƠN GIÁ</td>
        <td>THÀNH TIỀN</td>
        <td>THAO TÁC</td>
    </thead>
    <tbody>
        <?php
            session_start();
            $orderId = $_SESSION['orderId'];
            include '..\Function_Method\config.php';
            $sql = "SELECT * FROM content WHERE orderId='$orderId'";
            $result = $con->query($sql);
            $count = 0;
            foreach($result as $row):?>
                <tr>
                    <td><?php echo $row['quantity']?>  <i class="fas fa-plus Plus" id="<?php echo $row['id'];?>" style="color: blue; cursor: pointer;"></i></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['cost']?></td>
                    <td><?php echo $row['quantity']*$row['cost']?></td>
                    <td><button class="btn btn-danger del" value="<?php echo $row['id'];?>">Delete</button></td>
                </tr>
                <?php $count += $row['quantity']*$row['cost']?>
                <?php $_SESSION['total'] = $count; ?>
            <?php endforeach;
            $con->close();
        ?>
    </tbody>   
</table>
<?php
    echo '<p style="font-size: 30px; font-weight: 600; margin-top: 20px;"> Tổng chi phí: '.$count.'VNĐ</p>';
    echo '<a href="payment_confirm.php" class="btn btn-primary" style="margin: 20px 0px;">Thanh toán</a>'
?>