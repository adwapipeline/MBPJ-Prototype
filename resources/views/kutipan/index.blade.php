@extends('base')
@section('content')

<div class="card-header bg-light d-flex justify-content-between">
    <h5 class="mb-0">Kutipan dari tahun 2015-2021</h5>
</div>

<div class="card">
    <!-- Styles -->
<style>
    #chartdiv {
      width: 100%;
      height: 350px;
    }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <script>
    am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelX: "none",
      wheelY: "none",
      layout: root.verticalLayout
    }));


    // Data
    var data = [{
      year: "2015",
      value: 600000
    }, {
      year: "2016",
      value: 900000
    }, {
      year: "2017",
      value: 180000
    }, {
      year: "2018",
      value: 600000
    }, {
      year: "2019",
      value: 350000
    }, {
      year: "2020",
      value: 600000
    }, {
      year: "2021",
      value: 670000
    }];

    // Populate data
    for (var i = 0; i < (data.length - 1); i++) {
      data[i].valueNext = data[i + 1].value;
    }


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "year",
      renderer: am5xy.AxisRendererX.new(root, {
        cellStartLocation: 0.1,
        cellEndLocation: 0.9,
        minGridDistance: 30
      }),
      tooltip: am5.Tooltip.new(root, {})
    }));

    xAxis.data.setAll(data);

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      min: 0,
      renderer: am5xy.AxisRendererY.new(root, {})
    }));


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/

    // Column series
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "value",
      categoryXField: "year"
    }));

    series.columns.template.setAll({
      tooltipText: "{categoryX}: {valueY}",
      width: am5.percent(90),
      tooltipY: 0
    });

    series.data.setAll(data);

    // Variance indicator series
    var series2 = chart.series.push(am5xy.ColumnSeries.new(root, {
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "valueNext",
      openValueYField: "value",
      categoryXField: "year",
      fill: am5.color(0x555555),
      stroke: am5.color(0x555555)
    }));

    series2.columns.template.setAll({
      width: 1
    });

    series2.data.setAll(data);

    series2.bullets.push(function () {
      var label = am5.Label.new(root, {
        text: "{valueY}",
        fontWeight: "500",
        fill: am5.color(0x00cc00),
        centerY: am5.p100,
        centerX: am5.p50,
        populateText: true
      });

      // Modify text of the bullet with percent
      label.adapters.add("text", function(text, target) {
        var percent = getVariancePercent(target.dataItem);
        return percent ? percent + "%" : text;
      });

      // Set dynamic color of the bullet
      label.adapters.add("centerY", function(center, target) {
        return getVariancePercent(target.dataItem) < 0 ? 0 : center;
      });

      // Set dynamic color of the bullet
      label.adapters.add("fill", function(fill, target) {
        return getVariancePercent(target.dataItem) < 0 ? am5.color(0xcc0000) : fill;
      });

      return am5.Bullet.new(root, {
        locationY: 1,
        sprite: label
      });
    });

    series2.bullets.push(function() {
      var arrow = am5.Graphics.new(root, {
        rotation: -90,
        centerX: am5.p50,
        centerY: am5.p50,
        dy: 3,
        fill: am5.color(0x555555),
        stroke: am5.color(0x555555),
        draw: function (display) {
          display.moveTo(0, -3);
          display.lineTo(8, 0);
          display.lineTo(0, 3);
          display.lineTo(0, -3);
        }
      });

      arrow.adapters.add("rotation", function(rotation, target) {
        return getVariancePercent(target.dataItem) < 0 ? 90 : rotation;
      });

      arrow.adapters.add("dy", function(dy, target) {
        return getVariancePercent(target.dataItem) < 0 ? -3 : dy;
      });

      return am5.Bullet.new(root, {
        locationY: 1,
        sprite: arrow
      })
    })


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();
    chart.appear(1000, 100);


    function getVariancePercent(dataItem) {
      if (dataItem) {
        var value = dataItem.get("valueY");
        var openValue = dataItem.get("openValueY");
        var change = value - openValue;
        return Math.round(change / openValue * 100);
      }
      return 0;
    }

    }); // end am5.ready()
    </script>

    <!-- HTML -->
    <div id="chartdiv"></div>
</div>


<div class="card-body fs--1">
</div>

<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Kutipan</h5>
          </div>
          <div class="col-auto ms-auto">
            <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/kutipan/create"><span class="fas fa-pencil-alt fs--2 me-1"></span>Create New</a></div>

          </div>
        </div>
      </div>
      <div id="tableExample2" data-list='{"valueNames":["user","role","actions"],"page":5,"pagination":true}'>
        <div class="table-responsive scrollbar">
          <table class="table table-bordered table-striped fs--1 mb-0">
            <thead class="bg-200 text-900">
        <tr>
          <th scope="col">ID Pembayaran</th>
          <th scope="col">Nama Pembayar</th>
          <th scope="col">Kaedah Bayaran</th>
          <th scope="col">Akaun No</th>
          <th scope="col">Actions</th>


        </tr>
      </thead>
      <tbody>
          @foreach ($kutipan as $kutipan)
        <tr>
          <td>{{ $kutipan->pembayaran_id }}</td>
          <td>{{ $kutipan->namaPembayar }}</td>
          <td>{{ $kutipan->kaedahBayaran }}</td>
          <td>{{ $kutipan->accountNo }}</td>

          <td class="text-end">
            <div>
                <form action="{{ route('kutipan.destroy',$kutipan->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('kutipan.show',$kutipan->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('kutipan.edit',$kutipan->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
          </td>
        </tr>

        @endforeach


      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-center mt-3">
    <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
    <ul class="pagination mb-0"></ul>
    <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
</div>


@endsection
