@extends('base')
@section('content')

<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Penyelenggaraan</h5>
        </div>
    </div>
</div>

<div class="card">
        <!-- Styles -->
        <style>
            #chartdiv {
            width: 100%;
            height: 500px;
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
            root.setThemes([am5themes_Animated.new(root)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(
            am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
                layout: root.verticalLayout
            })
            );

            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set(
            "scrollbarX",
            am5.Scrollbar.new(root, {
                orientation: "horizontal"
            })
            );

            var data = [
            {
                year: "2016",
                income: 23.5,
                expenses: 21.1
            },
            {
                year: "2017",
                income: 26.2,
                expenses: 30.5
            },
            {
                year: "2018",
                income: 30.1,
                expenses: 34.9
            },
            {
                year: "2019",
                income: 29.5,
                expenses: 31.1
            },
            {
                year: "2020",
                income: 30.6,
                expenses: 28.2,
                strokeSettings: {
                stroke: chart.get("colors").getIndex(1),
                strokeWidth: 3,
                strokeDasharray: [5, 5]
                }
            },
            {
                year: "2021",
                income: 34.1,
                expenses: 32.9,
                columnSettings: {
                strokeWidth: 1,
                strokeDasharray: [5],
                fillOpacity: 0.2
                },
                info: "(projection)"
            }
            ];

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
            am5xy.CategoryAxis.new(root, {
                categoryField: "year",
                renderer: am5xy.AxisRendererX.new(root, {}),
                tooltip: am5.Tooltip.new(root, {})
            })
            );

            xAxis.data.setAll(data);

            var yAxis = chart.yAxes.push(
            am5xy.ValueAxis.new(root, {
                min: 0,
                extraMax: 0.1,
                renderer: am5xy.AxisRendererY.new(root, {})
            })
            );


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/

            var series1 = chart.series.push(
            am5xy.ColumnSeries.new(root, {
                name: "Jumlah Bayaran",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "income",
                categoryXField: "year",
                tooltip:am5.Tooltip.new(root, {
                pointerOrientation:"horizontal",
                labelText:"{name} in {categoryX}: {valueY} {info}"
                })
            })
            );

            series1.columns.template.setAll({
            tooltipY: am5.percent(10),
            templateField: "columnSettings"
            });

            series1.data.setAll(data);

            var series2 = chart.series.push(
            am5xy.LineSeries.new(root, {
                name: "Baki Bayaran",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "Baki Bayaran",
                categoryXField: "year",
                tooltip:am5.Tooltip.new(root, {
                pointerOrientation:"horizontal",
                labelText:"{name} in {categoryX}: {valueY} {info}"
                })
            })
            );

            series2.strokes.template.setAll({
            strokeWidth: 3,
            templateField: "strokeSettings"
            });


            series2.data.setAll(data);

            series2.bullets.push(function () {
            return am5.Bullet.new(root, {
                sprite: am5.Circle.new(root, {
                strokeWidth: 3,
                stroke: series2.get("stroke"),
                radius: 5,
                fill: root.interfaceColors.get("background")
                })
            });
            });

            chart.set("cursor", am5xy.XYCursor.new(root, {}));

            // Add legend
            // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
            var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            })
            );
            legend.data.setAll(chart.series.values);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            chart.appear(1000, 100);
            series1.appear();

            }); // end am5.ready()
            </script>

            <!-- HTML -->
            <div id="chartdiv"></div>
    </div>
</div>


    <div class="card-body fs--1">
    </div>

<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Penyelenggaraan</h5>
          </div>

          @if (auth()-> user()->role =="Admin" || auth()-> user()->role =="Penyelia" )


          <div class="col-auto ms-auto">
            <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/penyelenggaraan/create"><span class="fas fa-pencil-alt fs--2 me-1"></span>Create New</a></div>
          </div>

          @endif

        </div>
      </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Jumlah Bayaran</th>
          <th scope="col">Baki Bayaran</th>

          @if (auth()-> user()->role =="Admin" || auth()-> user()->role =="Penyelia" )
          <th scope="col">Actions</th>
          @endif


        </tr>
      </thead>



      <tbody>
          @foreach ($penyelenggaraan as $penyelenggaraan)
        <tr>
          <td>RM {{ $penyelenggaraan->jumlahBayaran }}</td>
          <td>RM {{ $penyelenggaraan->bakiBayaran }}</td>


          <td class="text-end">

            @if (auth()-> user()->role =="Admin" || auth()-> user()->role =="Penyelia" )

            <div>
                <form action="{{ route('penyelenggaraan.destroy',$penyelenggaraan->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('penyelenggaraan.show',$penyelenggaraan->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('penyelenggaraan.edit',$penyelenggaraan->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>

            @endif

          </td>
        </tr>

        @endforeach


      </tbody>
    </table>
</div>

@endsection
