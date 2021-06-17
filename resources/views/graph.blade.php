@extends('layouts.master')
@section('title','Monthly Attendance')
@section('page-name', 'Monthly Attendance')

@section('main-content')
    <div id="chartContainer" style="height: 500px; width: 100%;"></div>

@endsection

@section('page-level-scripts-down')
    <!-- Page level plugins -->
    <script type="text/javascript">
        window.onload = function() {
            var options = {
                exportEnabled: true,
                animationEnabled: true,
                title:{
                    text: "{{date('M-Y')}}"
                },
                legend:{
                    horizontalAlign: "right",
                    verticalAlign: "center"
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "<b>{name}</b>: {y} (#percent%)",
                    indexLabel: "{name}",
                    // legendText: "{name} (#percent%)",
                    indexLabelPlacement: "inside",
                    dataPoints: [
                        { y: {{$p}}, name: "Present" },
                        { y: {{$a}}, name: "Absent"},
                        { y: {{$r}}, name: "Remaining Days" }
                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);

        }
    </script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
@endsection
