@extends('layouts.master')
@section('main')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Selamat Datang {{ Auth::user()->name }} Di</h3>
                    <h6 class="font-weight-normal mb-0">Website Bimbingan Konseling Politeknik Negeri Banyuwangi
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin transparent">
            <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Mahasiswa</p>
                            <p class="fs-30 mb-2">1350</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Mahasiswa Bermasalahan</p>
                            <p class="fs-30 mb-2">130</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Mahasiswa sedang konsultasi</p>
                            <p class="fs-30 mb-2">130</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Sudah Konsultasi</p>
                            <p class="fs-30 mb-2">80</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <h3 class="font-weight-bold">Topik yang sering diangkat dalam satu tahun</h3>
            <hr><br>
            <div class="row">
                <div class="col-md-6" style="margin: 0 auto; float: none;margin-bottom: 10px;">
                    <div class="card">
                        <div class="card-body">
                            <div id="rekapan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('javascript')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!--Target OA Win Java-->
    <script>
        var barColors = (function() {
            var colors = [],
                base = Highcharts.getOptions().colors[0],
                i;
            for (i = 0; i < 10; i += 1) {
                // Start out with a darkened base color (negative brighten), and end
                // up with a much brighter color
                colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
            }
            return colors;
        }());
        Highcharts.setOptions({
            colors: ['#4747A1']
        });
        Highcharts.chart('rekapan', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Konsultasi'
            },
            xAxis: {
                categories: ['Keluarga', 'Keuangan', 'Teman', 'Organisasi', 'Kendali Emosi', 'Lainnya'],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '#BimbinganKonseling'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">Total : </td>' +
                    '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Pembahasan Konsultasi',
                data: [40, 20, 30, 40, 50, 100]
            }]
        });
    </script>
@endsection
@endsection
