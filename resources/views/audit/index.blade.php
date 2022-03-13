@extends('base')
@section('content')

{{-- <div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Audit Trail</h5>
          </div>
          <div class="col-auto ms-auto">

            <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/audit/create"><span class="fas fa-pencil-alt fs--2 me-1"></span>Create New</a></div>

          </div>
        </div>
      </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Activity</th>
          <th scope="col">Date</th>
          <th scope="col">User</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($audit_trail as $audit_trail)
        <tr>
          <td>{{ $audit_trail->activity }}</td>
          <td>{{ $audit_trail->date }}</td>
          <td>{{ $audit_trail->user }}</td>
          <td class="text-end">
            <div>
                <form action="{{ route('audit.destroy',$audit_trail->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('audit.show',$audit_trail->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('audit.edit',$audit_trail->id) }}">Edit</a>

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
  </div> --}}


    <div class="card mb-3 mb-lg-0">
        <div class="card-header bg-light d-flex justify-content-between">
          <h5 class="mb-0">Audit Records</h5>
        </div>
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

        var data = [{
        name: "Monica",
        steps: 45688,
        pictureSettings: {
            src: "https://www.amcharts.com/wp-content/uploads/2019/04/monica.jpg"
        }
        }, {
        name: "Joey",
        steps: 35781,
        pictureSettings: {
            src: "https://www.amcharts.com/wp-content/uploads/2019/04/joey.jpg"
        }
        }, {
        name: "Ross",
        steps: 25464,
        pictureSettings: {
            src: "https://www.amcharts.com/wp-content/uploads/2019/04/ross.jpg"
        }
        }, {
        name: "Phoebe",
        steps: 18788,
        pictureSettings: {
            src: "https://www.amcharts.com/wp-content/uploads/2019/04/phoebe.jpg"
        }
        }, {
        name: "Rachel",
        steps: 15465,
        pictureSettings: {
            src: "https://www.amcharts.com/wp-content/uploads/2019/04/rachel.jpg"
        }
        }, {
        name: "Chandler",
        steps: 11561,
        pictureSettings: {
            src: "https://www.amcharts.com/wp-content/uploads/2019/04/chandler.jpg"
        }
        }];

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "none",
            wheelY: "none",
            paddingBottom: 50,
            paddingTop: 40
        })
        );

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/

        var xRenderer = am5xy.AxisRendererX.new(root, {});
        xRenderer.grid.template.set("visible", false);

        var xAxis = chart.xAxes.push(
        am5xy.CategoryAxis.new(root, {
            paddingTop:40,
            categoryField: "name",
            renderer: xRenderer
        })
        );


        var yRenderer = am5xy.AxisRendererY.new(root, {});
        yRenderer.grid.template.set("strokeDasharray", [3]);

        var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            min: 0,
            renderer: yRenderer
        })
        );

        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
            name: "Income",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "steps",
            categoryXField: "name",
            sequencedInterpolation: true,
            calculateAggregates: true,
            maskBullets: false,
            tooltip: am5.Tooltip.new(root, {
            dy: -30,
            pointerOrientation: "vertical",
            labelText: "{valueY}"
            })
        })
        );

        series.columns.template.setAll({
        strokeOpacity: 0,
        cornerRadiusBR: 10,
        cornerRadiusTR: 10,
        cornerRadiusBL: 10,
        cornerRadiusTL: 10,
        maxWidth: 50,
        fillOpacity: 0.8
        });

        var currentlyHovered;

        series.columns.template.events.on("pointerover", function (e) {
        handleHover(e.target.dataItem);
        });

        series.columns.template.events.on("pointerout", function (e) {
        handleOut();
        });

        function handleHover(dataItem) {
        if (dataItem && currentlyHovered != dataItem) {
            handleOut();
            currentlyHovered = dataItem;
            var bullet = dataItem.bullets[0];
            bullet.animate({
            key: "locationY",
            to: 1,
            duration: 600,
            easing: am5.ease.out(am5.ease.cubic)
            });
        }
        }

        function handleOut() {
        if (currentlyHovered) {
            var bullet = currentlyHovered.bullets[0];
            bullet.animate({
            key: "locationY",
            to: 0,
            duration: 600,
            easing: am5.ease.out(am5.ease.cubic)
            });
        }
        }

        var circleTemplate = am5.Template.new({});

        series.bullets.push(function (root, series, dataItem) {
        var bulletContainer = am5.Container.new(root, {});
        var circle = bulletContainer.children.push(
            am5.Circle.new(
            root,
            {
                radius: 34
            },
            circleTemplate
            )
        );

        var maskCircle = bulletContainer.children.push(
            am5.Circle.new(root, { radius: 27 })
        );

        // only containers can be masked, so we add image to another container
        var imageContainer = bulletContainer.children.push(
            am5.Container.new(root, {
            mask: maskCircle
            })
        );

        var image = imageContainer.children.push(
            am5.Picture.new(root, {
            templateField: "pictureSettings",
            centerX: am5.p50,
            centerY: am5.p50,
            width: 60,
            height: 60
            })
        );

        return am5.Bullet.new(root, {
            locationY: 0,
            sprite: bulletContainer
        });
        });

        // heatrule
        series.set("heatRules", [
        {
            dataField: "valueY",
            min: am5.color(0xe5dc36),
            max: am5.color(0x5faa46),
            target: series.columns.template,
            key: "fill"
        },
        {
            dataField: "valueY",
            min: am5.color(0xe5dc36),
            max: am5.color(0x5faa46),
            target: circleTemplate,
            key: "fill"
        }
        ]);

        series.data.setAll(data);
        xAxis.data.setAll(data);

        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineX.set("visible", false);
        cursor.lineY.set("visible", false);

        cursor.events.on("cursormoved", function () {
        var dataItem = series.get("tooltip").dataItem;
        if (dataItem) {
            handleHover(dataItem);
        } else {
            handleOut();
        }
        });

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();
        chart.appear(1000, 100);

        }); // end am5.ready()
        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>
        MBPJ

    </div>


    <div class="card-body fs--1">
    </div>

    <div class="card h-md-100 ecommerce-card-min-width">
        <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Audit Trail</h5>
          </div>
          <div class="col-auto ms-auto">
            <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/audit/create"><span class="fas fa-pencil-alt fs--2 me-1"></span>Create New</a></div>

          </div>
        </div>
      </div>
      <div id="tableExample2" data-list='{"valueNames":["activity","tarikh","user","actions"],"page":5,"pagination":true}'>
        <div class="table-responsive scrollbar">
          <table class="table table-bordered table-striped fs--1 mb-0">
            <thead class="bg-200 text-900">
              <tr>
                <th class="sort" data-sort="activity">Activiy</th>
                <th class="sort" data-sort="tarikh">Tarikh</th>
                <th class="sort" data-sort="user">User</th>
                <th class="sort" data-sort="actions">Actions</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($audit_trail as $audit_trail)
              <tr>
                <td>{{ $audit_trail->activity }}</td>
                <td>{{ $audit_trail->date }}</td>
                <td>{{ $audit_trail->user }}</td>
                <td class="text-end">
                  <div>
                      <form action="{{ route('audit.destroy',$audit_trail->id) }}" method="POST">

                          <a class="btn btn-info" href="{{ route('audit.show',$audit_trail->id) }}">Show</a>

                          <a class="btn btn-primary" href="{{ route('audit.edit',$audit_trail->id) }}">Edit</a>

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
        
      </div>


@endsection
