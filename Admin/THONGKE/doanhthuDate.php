<div class="row p-4 mgtop">
    <div class="row text-center d-flex justify-content-between">
        <h5 class="fs-4 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ DOANH THU</h5>
    </div>
    <div class="row rounded-2 bg-light p-3">
        <p class="fw-bold fs-4">Thống kê doanh thu</p>
        <table class="text-center">
            <thead class="text-center">
                <tr>
                    <th class="fs-6">STT</th>
                    <th class="fs-6">Ngày</th>
                    <th class="fs-6">Doanh thu</th>
                </tr>
            </thead>
            <tbody>

               

                <?php $i=0; foreach($list_thongkes as $listtk){

                    extract($listtk);
                ?>
                <tr class="mt-4">
                    <td class="fs-6"><?= $i+=1; ?></td>
                    <td class="fs-6"><?= $date_order ?></td>
                    <td class="fs-6"><?= number_format($sum, 0, ',', '.') . ' đ' ?></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
<div class="row">
<div class="col-md-6 rounded-2 bg-light p-3">

        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>

        <div id="piechart_3ds" style="width: 900px; height: 500px;"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                const data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Doanh thu'],
                    <?php

                 

                    foreach ($list_thongkes as $thongke) {

                        extract($thongke);
                        echo "['$date_order', $sum],";
                    }
                    ?>
                ]);
                // Set Options
                const options = {
                    title: 'BIỂU ĐỒ DOANH THU THEO NGÀY',
                    is3D: true
                };
                // Draw

                

                const chart = new google.visualization.LineChart(document.getElementById('piechart_3ds'));

                chart.draw(data, options);
            }
        </script>
    </div>
</div>