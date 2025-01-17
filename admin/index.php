<?php
$menu_aktif = "dashboard";
$judul_halaman = "Dashboard";
require_once('header.php'); ?>
<link rel="stylesheet" href="assets/assets/vendor/libs/apex-charts/apex-charts.css" />
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Dashboard</h4>
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Pengunjung Bulan Ini</h5>
        </div>
        <div class="card-body">
          <div class="card-body px-0">
            <div class="tab-content p-0">
              <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                <div id="incomeChart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('footer.php');
$bulan = date('m'); // Bulan saat ini
$tahun = date('Y'); // Tahun saat ini

// Jumlah hari dalam bulan menggunakan date('t')
$jumlahHari = date('t', strtotime("$tahun-$bulan-01"));

$list_tanggal = [];
$list_data_pengunjung = [];
for ($i = 1; $i <= $jumlahHari; $i++) {
  $list_tanggal[] = str_pad($i, 2, '0', STR_PAD_LEFT);
  $tanggal = "$tahun-$bulan-" . str_pad($i, 2, '0', STR_PAD_LEFT);
  $total_pengunjung = $conn->query("SELECT total_pengunjung FROM pengunjung_per_hari WHERE DATE(tanggal) = '$tanggal'")->fetch_assoc();
  $list_data_pengunjung[] = $total_pengunjung == null ? 0 : (int)$total_pengunjung['total_pengunjung'];
}
?>
<script src="assets/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script>
  'use strict';

  (function() {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    const incomeChartEl = document.querySelector('#incomeChart'),
      incomeChartConfig = {
        series: [{
          data: <?= json_encode($list_data_pengunjung) ?>
        }],
        chart: {
          height: 415,
          parentHeightOffset: 0,
          parentWidthOffset: 0,
          toolbar: {
            show: false
          },
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: 2,
          curve: 'smooth'
        },
        legend: {
          show: false
        },
        markers: {
          size: 6,
          colors: 'transparent',
          strokeColors: 'transparent',
          strokeWidth: 4,
          discrete: [{
            fillColor: config.colors.white,
            seriesIndex: 0,
            dataPointIndex: 7,
            strokeColor: config.colors.primary,
            strokeWidth: 2,
            size: 6,
            radius: 8
          }],
          hover: {
            size: 7
          }
        },
        colors: [config.colors.primary],
        fill: {
          type: 'gradient',
          gradient: {
            shade: shadeColor,
            shadeIntensity: 0.6,
            opacityFrom: 0.5,
            opacityTo: 0.25,
            stops: [0, 95, 100]
          }
        },
        grid: {
          borderColor: borderColor,
          strokeDashArray: 3,
        },
        xaxis: {
          categories: <?= json_encode($list_tanggal) ?>,
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          labels: {
            show: true,
            style: {
              fontSize: '13px',
              colors: axisColor
            }
          }
        },
        yaxis: {
          tickAmount: 4
        }
      };
    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
      const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
      incomeChart.render();
    }
  })();
</script>