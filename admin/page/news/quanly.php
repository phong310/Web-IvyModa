<?php  require "../.././core/ketnoi.php";
$sql = "SELECT * FROM `tintuc`";
$result = showDataAll($sql);

?>
<?php require "../.././layout/header.php";?>
<title>ADMIN</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="del_news.php" method="post">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="5">
                                <button id="check-all" type="button" class="btn btn-primary">Chọn tất cả</button>
                                <button id="clear-all" type="button" class="btn btn-primary">Bỏ chọn tất cả</button>
                                <button id="btn-delete" type="submit" name="btn_delete"
                                    onclick="return confirm('Ban có muốn xóa hay không ?')" class="btn btn-primary">Xóa
                                    các mục chọn</button>
                                <a href="add_news.php" class="btn btn-primary">Thêm mới tin tức</a>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th>TIÊU ĐỀ</th>
                            <th>NỘI DUNG</th>
                            <th>ẢNH</th>
                            <th>CHỨC NĂNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $news): ?>
                        <tr>
                            <th><input type="checkbox" name="id[]" value="<?= $news["id"] ?>"></th>
                            <td><?= $news["id"] ?></td>
                            <td><?= $news["title"] ?> </td>
                            <td><?= $news["content"] ?> </td>
                            <td><img src="../.././images/news/<?= $news["image"] ?>" alt="" style="width:100px">
                            </td>
                            <td>
                                <a href="edit_news.php?id=<?= $news["id"] ?>" style="width: 56px; height: 58px; margin-bottom: 14px" class="btn btn-primary">Cập nhật</a>
                                <a href="del_news.php?id=<?= $news["id"] ?>" class="btn btn-danger">Xóa</a>
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