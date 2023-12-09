<div class="row p-4 mgtop ms-5">
    <div class="row mb-5">
        <a class="col-md-3 text-center text-decoration-none">
            <div class="text-center p-4 bg-danger w-75 rounded-4">
                <p class="text-light fs-6 fw-bold">Đơn Hàng Chờ Xác Nhận</p>
                <p class="bg-dark text-light w-50 m-auto rounded-4 p-2 fw-bold fs-5"><?php if(empty($xacnhan)){
                    echo '0';
                }else{
                    echo $xacnhan[0]['soluong'];
                }
                ?></p>
            </div>
        </a>
        <a class="col-md-3 text-center text-decoration-none">
            <div class="text-center p-4 bg-primary w-75 rounded-4">
                <p class="text-light fs-6 fw-bold">Đơn Giao Thành Công</p>
                <p class="bg-dark text-light w-50 m-auto rounded-4 p-2 fw-bold fs-5">
                <?php if(empty($thongke_oder_tc)){
                    echo '0';
                }else{
                    echo $thongke_oder_tc[0]['soluong'];
                }
                ?></p>
            </div>
        </a>
        <a class="col-md-3 text-center text-decoration-none">
            <div class="text-center p-4 bg-warning w-75 rounded-4">
                <p class="text-light fs-6 fw-bold">Tổng Doanh Thu</p>
                <p class="bg-dark text-danger w-70 m-auto rounded-4 p-2 fw-bold fs-5"><?= number_format($doanhthu[0]['doanhthu'], 0, ',', '.') . ' đ' ?></p>
            </div>
        </a>
        <a class="col-md-3 text-decoration-none">
            <div class="text-center p-4 bg-success w-75 rounded-4">
                <p class="text-light fs-6 fw-bold">Tổng Doanh Thu</p>
                <p class="bg-dark text-light w-50 m-auto rounded-4 p-2 fw-bold fs-5">4</p>
            </div>
        </a>
    </div>

    <div class="col-md-6 rounded-2 bg-light p-3">
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                const data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Số lượng'],
                    <?php
                    foreach ($list_thongke as $thongke) {
                        extract($thongke);
                        echo "['$name_category', $soluongsp],";
                    }
                    ?>
                ]);
                // Set Options
                const options = {
                    title: 'BIỂU ĐỒ SỐ LƯỢNG SẢN PHẨM TRONG DANH MỤC',
                    is3D: true
                };
                // Draw
                const chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
    </div>

    <div class="col-md-3 rounded-2 bg-light p-3">
        <div id="piechart_3dd" style="width: 700px; height: 500px;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                const data = google.visualization.arrayToDataTable([
                    ['Tên Danh Mục', 'Lượt Xem Danh Mục'],
                    <?php
                    // print_r($list_bl);
                    foreach ($list_view_category as $thongk) {
                        extract($thongk);
                        echo "['$name_category', $luotxem],";
                    }
                    ?>
                ]);
                // Set Options
                const options = {
                    title: 'BIỂU ĐỒ THỐNG KÊ LƯỢT XEM THEO DANH MỤC',
                    is3D: true,
                    colors: ['#ff0000', '#00ff00', '#0000ff']
                };
                // Draw
                const chart = new google.visualization.ColumnChart(document.getElementById('piechart_3dd'));
                chart.draw(data, options);
            }
        </script>
    </div>
</div>
<div class="row p-4">
    <div class="col-md-6 rounded-2 bg-light p-3">
        <div id="piechart_3ddd" style="width: 900px; height: 500px;"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                const data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Số lượng'],
                    <?php
                    // print_r($list_order);
                    foreach ($list_order as $order) {
                        extract($order);
                        echo "['$user', $soLuong],";
                    }
                    ?>
                ]);
                // Set Options
                const options = {
                    title: 'BIỂU ĐỒ SỐ LƯỢNG ĐƠN HÀNG THEO USER',
                    is3D: true
                };
                // Draw
                const chart = new google.visualization.BarChart(document.getElementById('piechart_3ddd'));
                chart.draw(data, options);
            }
        </script>
    </div>

</div>