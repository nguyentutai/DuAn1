<div class="col-md-10">
    <div class="row bg-dark p-2 text-end">
        <a href="" class="text-light text-none"><i class="fa-solid fa-right-from-bracket fs-5 me-5"></i></a>
    </div>
    <div class="row p-4">
        <div class="row text-center">
            <h5 class="fs-3 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ DANH MỤC</h5>
        </div>
        <div class="row rounded-2 bg-light p-3">
            <p class="fw-bold fs-4">Danh sách danh mục</p>
            <table class="text-center">
                <thead class="text-center">
                    <tr>
                        <th class="fs-6">STT</th>
                        <th class="fs-6">Tên danh mục</th>
                        <th class="fs-6">Hình ảnh</th>
                        <th class="fs-6">Đường dẫn tĩnh</th>
                        <th colspan="2" class="fs-6">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($load_all_category_children as $loaddm) {
                        extract($loaddm) ?>
                        <tr>
                            <td><?= $i+=1; ?></td>
                            <td><?= $name_category ?></td>
                            <td><img class="rounded mx-auto d-block img-fluid w-50 imagedm mt-3" src="../upload/<?= $image_category ?>" alt="">
                            </td>
                            <td><?= $link_category ?></td>
                            <?php 
                                if($parent_id == 0){
                            ?>
                                <td><a href="?act=listdm&id=<?= $id_category ?>" class="btn btn-dark fw-bold ">Danh mục con</a></td>
                            <?php } ?>
                            <td><a href="?act=deletedm&id=<?= $id_category ?>" class="btn btn-danger fw-bold ">Xóa</a></td>
                            <td><a href="?act=suadm&id=<?= $id_category ?>" class="btn btn-success fw-bold">Sửa</a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <a href="?act=adddm" class="btn btn-primary fw-bold">Thêm danh mục</a>
    <a href="" class="btn btn-dark fw-bold">Thùng rác</a>
</div>
</div>