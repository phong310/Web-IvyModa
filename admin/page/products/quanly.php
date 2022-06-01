<?php  require "../.././core/ketnoi.php";
$sql = "SELECT * FROM `sanpham`";
$result = showDataAll($sql);

?>
<?php require "../.././layout/header.php";?>
<title>ADMIN</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="del_sp.php" method="post">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="5">
                                <button id="check-all" type="button" class="btn btn-primary">Chọn tất cả</button>
                                <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                                <button id="btn-delete" type="submit" name="btn_delete"
                                    onclick="return confirm('Ban có muốn xóa hay không ?')" class="btn btn-primary">Xóa
                                    các mục chọn</button>
                                <a href="add_sp.php" class="btn btn-primary">Thêm mới sản phẩm</a>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th>Ảnh sản phẩm </th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $product): ?>
                        <tr>
                            <th><input type="checkbox" name="id[]" value="<?= $product["id"] ?>"></th>
                            <td><?= $product["id"] ?></td>
                            <td><img src="../.././images/products/<?= $product["Anh_sp"] ?>" alt="" style="width:80px">
                            </td>

                            <td><?= $product["Tensp"] ?> </td>
                            <td><?php  echo  number_format($product["Gia_sp"], 0, '', ',');?> VNĐ</td>
                            <td>
                                <a href="edit_sp.php?id=<?= $product["id"] ?>" class="btn btn-primary">Cập nhật</a>
                                <a href="del_sp.php?id=<?= $product["id"] ?>" class="btn btn-danger">Xóa</a>
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