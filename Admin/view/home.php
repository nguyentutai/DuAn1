<div class="row p-4 mgtop">
    <div class="col-md-5 rounded-2 bg-light p-3">
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
                const chart = new google.visualization.ColumnChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
    </div>

    <div class="col-md-5 rounded-2 bg-light p-3">
        <div id="piechart_3dd" style="width: 900px; height: 500px;"></div>
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
                    // print_r($list_bl);
                    foreach ($list_bl as $thongk) {
                        extract($thongk);
                        echo "['$name_product', $soBinhLuan],";
                    }
                    ?>
                ]);
                // Set Options
                const options = {
                    title: 'BIỂU ĐỒ THỐNG KÊ BÌNH LUẬN THEO SẢN PHẨM',
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
</div>
</div>