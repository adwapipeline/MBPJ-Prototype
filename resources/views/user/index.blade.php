@extends('base')
@section('content')

<div class="card mb-3 mb-lg-0">
    <div class="card-header bg-light d-flex justify-content-between">
      <h5 class="mb-0">Aktivity Pengguna</h5>
      <form>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
          <option selected="selected">Pilih Kategori</option>
          <option>Pelanggan</option>
           <option>Penyelia</option>
          <option>Admin</option>
        </select>
      </form>
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
            root.setThemes([
            am5themes_Animated.new(root)
            ]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "none",
            wheelY: "none"
            }));

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0,
            categoryField: "name",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
            }));

            xRenderer.grid.template.set("visible", false);

            var yRenderer = am5xy.AxisRendererY.new(root, {});
            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: 0,
            extraMax: 0.1,
            renderer: yRenderer
            }));

            yRenderer.grid.template.setAll({
            strokeDasharray: [2, 2]
            });

            // Create series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            sequencedInterpolation: true,
            categoryXField: "name",
            tooltip: am5.Tooltip.new(root, { dy: -25, labelText: "{valueY}" })
            }));


            series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5
            });

            series.columns.template.adapters.add("fill", (fill, target) => {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", (stroke, target) => {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            // Set data
            var data = [

            {
                name: "Pelanggan",
                value: 65456,
                bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/C02.png" }
            },
            {
                name: "Penyelia",
                value: 45724,
                bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/D02.png" }
            },
            {
                name: "Admin",
                value: 13654,
                bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/E01.png" }
            }
            ];

            series.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 1,
                sprite: am5.Picture.new(root, {
                templateField: "bulletSettings",
                width: 50,
                height: 50,
                centerX: am5.p50,
                centerY: am5.p50,
                shadowColor: am5.color(0x000000),
                shadowBlur: 4,
                shadowOffsetX: 4,
                shadowOffsetY: 4,
                shadowOpacity: 0.6
                })
            });
            });

            xAxis.data.setAll(data);
            series.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);

            }); // end am5.ready()
            </script>

            <!-- HTML -->
            <div id="chartdiv"></div>
            </div>

    </div>
</div>

<div class="card-body fs--1">
</div>

<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Urus Pengguna</h5>
          </div>
          <div class="col-auto ms-auto">

          </div>
        </div>
      </div>
      <div id="tableExample2" data-list='{"valueNames":["user","role","actions"],"page":5,"pagination":true}'>
        <div class="table-responsive scrollbar">
          <table class="table table-bordered table-striped fs--1 mb-0">
            <thead class="bg-200 text-900">
                <tr>
                <th scope="col">User</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($user as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="text-end">
                        <div>
                            <form action="{{ route('user.destroy',$user->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>

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


</div>



@endsection
