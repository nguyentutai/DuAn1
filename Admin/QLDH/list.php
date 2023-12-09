<div class="row p-4 mgtop">
    <div class="row text-center">
        <h5 class="fs-3 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ ĐƠN HÀNG</h5>
    </div>
    <div class="row rounded-2 bg-light p-3">
        <p class="fw-bold fs-4">Danh sách đơn hàng</p>
        <table class="text-center table table-hover">
            <thead class="text-center">
                <tr>
                    <th class="fs-6">Mã đơn hàng</th>
                    <th class="fs-6">Người đặt</th>
                    <th class="fs-6">Người nhận</th>
                    <th class="fs-6">Trạng thái</th>
                    <th class="fs-6">Email</th>
                    <th class="fs-6">Địa chỉ</th>
                    <th class="fs-6">Tổng tiền</th>
                    <th colspan="2" class="fs-6">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listdh as $list) {
                    extract($list);
                ?>
                    <tr>
                        <td><?= $code_orders ?></td>
                        <td><?= $user ?></td>
                        <td><?= $name_recipient ?></td>
                        <?php
                        switch ($id_status) {
                            case '1':
                                echo '<td  style="font-weight:bold;">Chờ xác nhận</td>';
                                break;
                            case '2':
                                echo '<td style="font-weight:bold;">Chờ lấy hàng</td>';
                                break;
                            case '3':
                                echo '<td style="font-weight:bold;">Trả hàng</td>';
                                break;
                            case '4':
                                echo '<td style="font-weight:bold;">Đã hủy</td>';
                                break;
                            case '5':
                                echo '<td style="font-weight:bold;">Đã giao</td>';
                                break;
                        }
                        ?>
                        <td><?= $email ?></td>
                        <td><?= $address_recipient ?></td>
                        <td class="fw-bold"><?= number_format($total_unit_price, 0, ',', '.') . ' đ' ?></td>
                        <td><a class="btn btn-danger fw-bold" href="?act=listspcart&id=<?= $id_order ?>">Xem chi tiết</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>