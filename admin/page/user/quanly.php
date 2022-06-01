<?php  require "../.././core/ketnoi.php";
$sql = "SELECT * FROM `user`";
$result = showDataAll($sql);

?>
<?php require "../.././layout/header.php";?>
<title>ADMIN</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="del_user.php" method="post">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="5">
                                <button id="check-all" type="button" class="btn btn-primary">Chọn tất cả</button>
                                <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                                <button id="btn-delete" type="submit" name="btn_delete"
                                    onclick="return confirm('Ban có muốn xóa hay không ?')" class="btn btn-primary">Xóa
                                    các mục chọn</button>
                                <a href="add_user.php" class="btn btn-primary">Thêm mới người dùng</a>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $user): ?>
                        <tr>
                            <th><input type="checkbox" name="id[]" value="<?= $user["id"] ?>"></th>
                            <td><?= $user["id"] ?></td>
                            <td><?= $user["username"] ?> </td>
                            <td><?= $user["email"] ?> </td>
                            <td><?= $user["password"] ?> </td>
                            <td>
                                <a href="edit_user.php?id=<?= $user["id"] ?>" class="btn btn-primary">Cập nhật</a>
                                <a href="del_user.php?id=<?= $user["id"] ?>" class="btn btn-danger">Xóa</a>
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