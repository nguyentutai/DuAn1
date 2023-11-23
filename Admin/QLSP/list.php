
    <div class="row p-4 mgtop">
        <div class="row text-center d-flex justify-content-between">
            <h5 class="fs-4 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ SẢN PHẨM</h5>
            <form action="index.php?act=listkh" method="post" class="col-md-3 d-flex h-75 position-relative">
                <input type="text" placeholder="Nhập tên sản phẩm cần tìm ..." name="search" class="form-control rounded-end">
                <button type="submit" name="btn-search" class="btn btn-primary fw-bold position-absolute end-0 h-100"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="row rounded-2 bg-light p-3">
            <p class="fw-bold fs-4">Danh sách sản phẩm</p>
            <table class="text-center">
                <thead class="text-center">
                    <tr>
                        <th class="fs-6">STT</th>
                        <th class="fs-6">Tên sản phẩm</th>
                        <th class="fs-6">Hình ảnh</th>
                        <th class="fs-6">Mô tả</th>
                        <th class="fs-6">View</th>
                        <th colspan="2" class="fs-6">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Đồng hồ Citizen CT-EU6080-58D</td>
                        <td><img class="rounded mx-auto d-block img-fluid image" src="../img/1721098998_dong_ho_nu_ct_eu6080_58djpg_1626777518.jpg" alt="">
                        </td>
                        <td>Đường kính mặt: 31.8 mm
                            Chống nước: 5 ATM
                            Chất liệu mặt kính: Kính khoáng (Mineral)
                            Bộ máy: Quartz/Pin</td>
                        <td>10</td>
                        <td><a href="" class="btn btn-danger fw-bold ">Xóa</a></td>
                        <td><a href="" class="btn btn-success fw-bold">Sửa</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <a href="?act=addsp" class="btn btn-primary fw-bold">Thêm sản phẩm</a>
    <a href="" class="btn btn-dark fw-bold">Thùng rác</a>
</div>
</div>