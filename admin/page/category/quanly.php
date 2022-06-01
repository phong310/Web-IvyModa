<?php  require "../.././core/ketnoi.php";
$sql = "SELECT * FROM `danhmuc`";
$result = showDataAll($sql);

?>
<?php require "../.././layout/header.php";?>
<title>ADMIN</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="del_category.php" method="post">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="5">
                                <button id="check-all" type="button" class="btn btn-primary">Chọn tất cả</button>
                                <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                                <button id="btn-delete" type="submit" name="btn_delete"
                                    onclick="return confirm('Ban có muốn xóa hay không ?')" class="btn btn-primary">Xóa
                                    các mục chọn</button>
                                <a href="add_category.php" class="btn btn-primary">Thêm mới danh mục</a>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th>MÃ DANH MỤC</th>
                            <th>TÊN DANH MỤC</th>
                            <th>CHỨC NĂNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $cate): ?>
                        <tr>
                            <th><input type="checkbox" name="id[]" value="<?= $cate["id"] ?>"></th>
                            <td><?= $cate["id"] ?></td>
                            <td><?= $cate["ma_danhmuc"] ?> </td>
                            <td><?= $cate["ten_danhmuc"] ?> </td>
                            <td>
                                <a href="edit_category.php?id=<?= $cate["id"] ?>" style="margin: 5px" class="btn btn-primary">Cập nhật</a>
                                <a href="del_category.php?id=<?= $cate["id"] ?>" class="btn btn-danger">Xóa</a>
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