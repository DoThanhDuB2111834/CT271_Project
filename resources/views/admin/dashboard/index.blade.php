@extends('admin.layouts.app')
@php
  function formatedPrice($price)
  {
    return number_format($price, 0, ',', '.') . '₫';
  }

  $totalPriceSales_recentMonth = 0.0;

  foreach ($dailyIncome as $income) {
    $totalPriceSales_recentMonth += $income->total;
  }

  function getLast30DaysRange()
  {
    $now = new DateTime();
    $start = clone $now;
    $start->modify('-30 days');

    $startFormatted = $start->format('F d');
    $endFormatted = $now->format('F d');

    return "$startFormatted - $endFormatted";
  }
@endphp
@section('content')
<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-primary bubble-shadow-small">
                  <i class="fas fa-box"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total receipt price</p>
                  <h4 class="card-title">{{formatedPrice($total_receipt_price)}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-info bubble-shadow-small">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Users</p>
                  <h4 class="card-title">{{$user_number}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-success bubble-shadow-small">
                  <i class="fas fa-luggage-cart"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Sales this week</p>
                  <h4 class="card-title">{{formatedPrice($total_order_sales_this_week)}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                  <i class="far fa-check-circle"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Order</p>
                  <h4 class="card-title">{{$orderNumber}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Sales Statistics</div>

            </div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="barChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-primary card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Daily Sales</div>
              <div class="card-tools">

              </div>
            </div>
            <div class="card-category">{{ getLast30DaysRange()}}</div>
          </div>
          <div class="card-body pb-0">
            <div class="mb-4 mt-2">
              <h1>{{formatedPrice($totalPriceSales_recentMonth)}}</h1>
            </div>
            <div class="pull-in p-5">
              <div id="lineChart"></div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>
@php
  $chartData = [
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
  ];

  foreach ($monthlyIncome as $income) {
    array_splice($chartData, $income->month - 1, 0, $income->total);
  }



@endphp
@endsection
@section('scripts')
<script>
  var barChart = document.getElementById("barChart").getContext("2d");

  var myBarChart = new Chart(barChart, {
    type: "bar",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [
        {
          label: "Sales",
          backgroundColor: "rgb(23, 125, 255)",
          borderColor: "rgb(23, 125, 255)",
          data: [<?php foreach ($chartData as $data) {
  echo $data . ',';
} ?>],
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });

  $("#lineChart").sparkline(
    [
      <?php foreach ($dailyIncome as $income) {
  echo $income->total . ',';
} ?>
    ],
    {
      type: "line",
      height: "100",
      width: "250",
      lineWidth: "2",
      lineColor: "#fff",
      fillColor: "#c1c1c1",
    }
  );
</script>
@endsection