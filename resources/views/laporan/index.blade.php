@extends('base')
@section('content')



<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Laporan</h5>

        </div>
    </div>
</div>
    <div class="card">
        <!-- Styles -->
    <style>
        #chartdiv {
          width: 100%;
          height: 400px;
        }
        </style>

        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

        <!-- Chart code -->
        <script>
        am5.ready(function() {

        // Set up data
        var data = [{
          category: "Critical",
          value: 89,
          sliceSettings: {
            fill: am5.color(0xdc4534),
          },
          breakdown: [{
            category: "Laporan Penyelia",
            value: 29
          }, {
            category: "Laporan Operator",
            value: 40
          }, {
            category: "Laporan Kad Kredit",
            value: 11
          }, {
            category: "Laporan Pembatalan",
            value: 9
          }]
        }, {
          category: "Acceptable",
          value: 71,
          sliceSettings: {
            fill: am5.color(0xd7a700),
          },
          breakdown: [{
            category: "Laporan Penyelia",
            value: 22
          }, {
            category: "SLaporan Operator",
            value: 30
          }, {
            category: "Laporan Kad Kredit",
            value: 11
          }, {
            category: "Laporan Pembatalan",
            value: 10
          }]
        }, {
          category: "Good",
          value: 120,
          sliceSettings: {
            fill: am5.color(0x68ad5c),
          },
          breakdown: [{
            category: "Laporan Penyelia",
            value: 60
          }, {
            category: "Laporan Operator",
            value: 35
          }, {
            category: "Laporan Kad Kredit",
            value: 15
          }, {
            category: "Laporan Pembatalan",
            value: 10
          }]
        }]

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
          am5themes_Animated.new(root)
        ]);

        // Create wrapper container
        var container = root.container.children.push(am5.Container.new(root, {
          width: am5.p100,
          height: am5.p100,
          layout: root.horizontalLayout
        }));


        // ==============================================
        // Column chart
        // ==============================================

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var columnChart = container.children.push(am5xy.XYChart.new(root, {
          width: am5.p50,
          panX: false,
          panY: false,
          wheelX: "none",
          wheelY: "none",
          layout: root.verticalLayout
        }));

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var yAxis = columnChart.yAxes.push(am5xy.CategoryAxis.new(root, {
          categoryField: "category",
          renderer: am5xy.AxisRendererY.new(root, {})
        }));

        //xAxis.data.setAll(data);

        var xAxis = columnChart.xAxes.push(am5xy.ValueAxis.new(root, {
          renderer: am5xy.AxisRendererX.new(root, {})
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var columnSeries = columnChart.series.push(am5xy.ColumnSeries.new(root, {
          name: name,
          xAxis: xAxis,
          yAxis: yAxis,
          valueXField: "value",
          categoryYField: "category"
        }));

        columnSeries.columns.template.setAll({
          tooltipText: "{categoryY}: {valueX}"
        });

        //series.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        columnChart.appear(1000, 100);


        // ==============================================
        // Column chart
        // ==============================================

        var pieChart = container.children.push(
          am5percent.PieChart.new(root, {
            width: am5.p50,
            innerRadius: am5.percent(50)
          })
        );

        // Create series
        var pieSeries = pieChart.series.push(
          am5percent.PieSeries.new(root, {
            valueField: "value",
            categoryField: "category"
          })
        );

        pieSeries.slices.template.setAll({
          templateField: "sliceSettings",
          strokeOpacity: 0
        });

        var currentSlice;
        pieSeries.slices.template.on("active", function(active, slice) {
          if (currentSlice && currentSlice != slice && active) {
            currentSlice.set("active", false)
          }

          var color = slice.get("fill");

          label1.setAll({
            fill: color,
            text: root.numberFormatter.format(slice.dataItem.get("valuePercentTotal"), "#.'%'")
          });

          label2.set("text", slice.dataItem.get("category"));

          columnSeries.columns.template.setAll({
            fill: slice.get("fill"),
            stroke: slice.get("fill")
          });

          columnSeries.data.setAll(slice.dataItem.dataContext.breakdown);
          yAxis.data.setAll(slice.dataItem.dataContext.breakdown);

          currentSlice = slice;
        });

        pieSeries.labels.template.set("forceHidden", true);
        pieSeries.ticks.template.set("forceHidden", true);

        pieSeries.data.setAll(data);

        // Add label
        var label1 = pieChart.seriesContainer.children.push(am5.Label.new(root, {
          text: "",
          fontSize: 35,
          fontweight: "bold",
          centerX: am5.p50,
          centerY: am5.p50
        }));

        var label2 = pieChart.seriesContainer.children.push(am5.Label.new(root, {
          text: "",
          fontSize: 12,
          centerX: am5.p50,
          centerY: am5.p50,
          dy: 30
        }));

        // Pre-select first slice
        pieSeries.events.on("datavalidated", function() {
          pieSeries.slices.getIndex(0).set("active", true);
        });

        }); // end am5.ready()
        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>
        amCharts

    </div>
</div>


<div class="card-body fs--1">
</div>

<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Laporan</h5>
          </div>
          <div class="col-auto ms-auto">
            <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/laporan/create"><span class="fas fa-pencil-alt fs--2 me-1"></span>Create New</a></div>

          </div>
        </div>
      </div>
    <div id="tableExample2" data-list='{"valueNames":["user","role","actions"],"page":5,"pagination":true}'>
        <div class="table-responsive scrollbar">
          <table class="table table-bordered table-striped fs--1 mb-0">
            <thead class="bg-200 text-900">
        <tr>
          <th scope="col">Tajuk</th>
          <th scope="col">Detail Laporan</th>
          <th scope="col">Jenis Laporan</th>
          <th scope="col">Tarikh</th>
          <th scope="col">Actions</th>
        </tr>
            </thead>
      <tbody>
          @foreach ($laporan as $laporan)
        <tr>
          <td>{{ $laporan->tajukLaporan }}</td>
          <td>{{ $laporan->detailLaporan }}</td>
          <td>{{ $laporan->jenisLaporan }}</td>
          <td>{{ $laporan->tarikh }}</td>

          <td class="text-end">
            <div>
                <form action="{{ route('laporan.destroy',$laporan->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('laporan.show',$laporan->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('laporan.edit',$laporan->id) }}">Edit</a>

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
</div>

<div class="d-flex justify-content-center mt-3">
    <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
    <ul class="pagination mb-0"></ul>
    <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
</div>
@endsection
