@extends('layouts.admin-layout')

@section('content')
    <!-- /#wrapper -->
    <div class="col-md-6">

    </div>
    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    {{--<script src="../bootstrap/js/bootstrap.min.js"></script>--}}

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        var hospitals=[];
        var hospitalData=[];
        $.ajax({
                url: '/admin/data',
                success:function (data) {
                    $.each(data, function (index, element) {
                       hospitals.push("'"+index+"'");
                       hospitalData.push(element);
                });
//                    alert(hospitals);
                    hospitalData = '['+hospitalData+']';
                    hospitals = '['+hospitals+']';
//                    alert(hospitals);

                }
        });
        var ctx = document.getElementById('myChart').getContext('2d');

        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: ['#fff', '#000', '#fff','#000','#fff', '#000', '#fff','#000'],
                    borderColor: ['#fff', '#000', '#fff','#000','#fff', '#000', '#fff','#000'],
                    data: hospitalData,
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: hospitals
            }
        });
    </script>
@endsection
{{--</body>--}}
{{--</html>--}}