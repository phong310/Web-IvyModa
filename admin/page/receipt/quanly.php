<?php  require "../.././core/ketnoi.php";
$sql = "SELECT * FROM `hoadon`";
$result = showDataAll($sql);

?>
<?php require "../.././layout/header.php";?>
<title>ADMIN</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="del_hd.php" method="post">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="5">
                                <button id="check-all" type="button" class="btn btn-primary">Chọn tất cả</button>
                                <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                                <button id="btn-delete" type="submit" name="btn_delete"
                                    onclick="return confirm('Ban có muốn xóa hay không ?')" class="btn btn-primary">Xóa
                                    các mục chọn</button>
                                <!-- <a href="add_sp.php" class="btn btn-primary">Thêm mới sản phẩm</a> -->
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $hoadon): ?>
                        <tr>
                            <th><input type="checkbox" name="id[]" value="<?= $hoadon["id"] ?>"></th>
                            <td><?= $hoadon["id"] ?></td>
                            <td><?= $hoadon["name"] ?> </td>
                            <td><?= $hoadon["address"] ?> </td>
                            <td><?= $hoadon["sdt"] ?> </td>
                            <td><?= $hoadon["product_name"] ?> </td>
                            <td>
                                <img src="../.././images/products/<?= $hoadon["images"] ?>" alt="" style="width:80px">
                            </td>
                            
                            <td><?= $hoadon["quantity"] ?> </td>
                            <td><?php  echo  number_format($hoadon["price"], 0, '', ',');?> VNĐ</td>
                            <td>
                                <a href="edit_hd.php?id=<?= $hoadon["id"] ?>"  style="width: 56px; height: 58px; margin-bottom: 14px" class="btn btn-primary">Cập nhật</a>
                                <a href="del_hd.php?id=<?= $hoadon["id"] ?>" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach ?>
                </table>
        </div>
        </form>
    </div>
</div>
<?php require "../.././layout/footer.php";?>