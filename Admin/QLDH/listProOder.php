<div class="row p-4 mgtop">
    <div class="row text-center d-flex justify-content-between">
        <h5 class="fs-4 fw-bold bg-success p-2 col-md-3 rounded-3">QUẢN LÝ ĐƠN HÀNG</h5>
    </div>

    <div class="row">
        <div class="col-md-8 rounded-3 bg-body-secondary p-3">
            <table class="text-center w-100">
                <thead class="text-center bg-dark text-light">
                    <tr>
                        <th class="fs-6 py-2 ps-4">STT</th>
                        <th class="fs-6">Tên sản phẩm</th>
                        <th class="fs-6">Hình ảnh</th>
                        <th class="fs-6">Giá</th>
                        <th class="fs-6">Số lượng</th>
                        <th class="fs-6">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    $sum = 0;
                    foreach ($load_pro_order as $loadroOrder) {
                        extract($loadroOrder);
                        $sum += ($quanlity_detail * $discount_product);
                    ?>
                        <tr>
                            <td><?= $i += 1; ?></td>
                            <td><?= $name_product ?></td>
                            <td><img class="rounded mx-auto d-block img-fluid w-75 imagedm mt-3" src="../upload/<?= $image_product ?>" alt="">
                            </td>
                            <td class="text-danger fw-bold"><?= number_format($discount_product, 0, ',', '.') . ' đ' ?></td>
                            <td class="fw-bold"><?= $quanlity_detail ?></td>
                            <td class="text-danger fw-bold"><?= number_format($quanlity_detail * $discount_product, 0, ',', '.') . ' đ' ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        foreach ($load_account_order as $loadac) {
            extract($loadac) ?>
            <div class="col-md-3 rounded-3 bg-body-secondary ms-5 p-3">
                <div class="bg-dark text-center text-light fs-6 fw-bold p-2">
                    THÔNG TIN NGƯỜI NHẬN
                </div>
                <div class="bg-light m-3 border border-secondary rounded-4">
                    <div class="d-flex px-2 pt-3 ms-2 fst-italic">
                        <span class="text-danger fw-bold">Họ tên:</span>
                        <p class="ms-2"><?= $name_recipient ?></p>
                    </div>
                    <div class="d-flex px-2 ms-2 fst-italic">
                        <span class="text-danger fw-bold">Địa chỉ: </span>
                        <p class="ms-2"><?= $address_recipient ?></p>
                    </div>
                    <div class="d-flex px-2 ms-2 fst-italic">
                        <span class="text-danger fw-bold">Số điện thoại: </span>
                        <p class="ms-2"><?= $phone_recipient ?></p>
                    </div>
                    <div class="d-flex px-2 ms-2 fst-italic">
                        <span class="text-danger fw-bold">Email: </span>
                        <p class="ms-2"><?= $email ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="">
                <div class="d-flex px-2 ms-2">
                    <span class="text-danger fw-bold d-flex align-items-center"><i class="fa-solid fa-film me-2 fs-4"></i>Tổng tiền đơn hàng: </span>
                    <p class="ms-2 fw-bold pt-3"><?= number_format($sum, 0, ',', '.') . ' đ' ?></p>
                </div>
                <div class="d-flex px-2 ms-2">
                    <span class="text-danger fw-bold d-flex align-items-center"><i class="fa-solid fa-money-check-dollar me-2 fs-4"></i>Phương thức thanh toán: </span>
                </div>
                <form class="mt-3" action="">
                    <select disabled class="form-control">
                        <option value="">Thanh toán bằng tiền mặt</option>
                        <option value="">Thanh toán online</option>
                    </select>
                </form>
            </div>
            </div>
            <div class="col-md-8 rounded-3 bg-body-secondary mt-3 p-3">
                <div class="d-flex">
                    <p class="text-danger fw-bold d-flex align-items-center fs-5">Trạng Thái Đơn Hàng: </p>
                    
                    <?php
                        switch ($load_account_order[0]['id_status']) {
                            case '1':
                                echo '<span class="bg-warning h-50 ms-3 fw-bold text-light px-2 py-1 rounded-3">Chờ xác nhận</span>';
                                break;
                            case '2':

                                echo '<span class="bg-secondary h-50 ms-3 fw-bold text-light px-2 py-1 rounded-3">Chờ giao hàng</span>';
                                break;
                            case '3':
                                echo '<span class="bg-danger h-50 ms-3 fw-bold text-light px-2 py-1 rounded-3">Chờ lấy hàng</span>';

                                echo '<span class="bg-secondary h-50 ms-3 fw-bold text-light px-2 py-1 rounded-3">Chờ lấy hàng</span>';
                                break;
                            case '3':
                                echo '<span class="bg-danger h-50 ms-3 fw-bold text-light px-2 py-1 rounded-3">Trả hàng</span>';

                                break;
                            case '4':
                                echo '<span class="bg-black h-50 ms-3 fw-bold text-light px-2 py-1 rounded-3">Đã hủy</span>';
                                break;
                            case '5':
                                echo '<span class="bg-warning-subtle h-50 ms-3 fw-bold text-light px-2 py-1 rounded-3">Đã giao</span>';
                                break;
                        }
                    ?>
                </div>
                <div class="mt-3">
                    <?php
                    // Giả sử bạn có giá trị đã chọn từ một nguồn dữ liệu nào đó
                    $selectedValue = $load_account_order[0]['id_status']; // Đặt giá trị đã chọn ở đây
                    // Danh sách giá trị cho trường select
                    $options = array(
                        "1" => "Chờ xác nhận",
                        "2" => "Chờ lấy hàng",

                        "3" => "Đã giao",
                        "4" => "Đã hủy",
                        "5" => "Trả hàng"

                        "5" => "Đã giao",
                        "4" => "Đã hủy",
                        "3" => "Trả hàng"

                    );
                    ?>
                    <form action="index.php?act=upStaOrder&id=<?= $_GET['id'] ?>" class="d-flex" method="POST">
                        <select class="form-select h-75" id="floatingSelect" name="status_order">
                            <!-- <option value="0">---Cập nhật trạng thái---</option> -->
                            <?php
                            // Duyệt qua mảng giá trị và tạo các tùy chọn
                            foreach ($options as $value => $label) {
                                // Nếu giá trị hiện tại trùng với giá trị đã chọn, thêm thuộc tính "selected"
                                $isSelected = ($value == $selectedValue) ? 'selected="selected"' : '';
                                echo "<option value=\"$value\" $isSelected>$label</option>";
                            }
                            ?>
                        </select>
                        <button class="btn btn-danger w-25 fw-bold ms-4" type="submit" name="btn-sunmit">CẬP NHẬT</button>
                    </form>
                </div>
            </div>
    </div>
</div>
</div>
</div>