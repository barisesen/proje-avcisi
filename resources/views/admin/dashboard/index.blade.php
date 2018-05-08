@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.header')
    <div class="d-flex align-items-stretch">
        @include('admin.layouts.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Ana Sayfa</h2>
                </div>
            </div>
            <hr>
            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-user-1"></i></div><strong>Toplam Kullanıcı Sayısı</strong>
                                    </div>
                                    <div class="number dashtext-1">{{ $users ?? 0 }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-contract"></i></div><strong>Toplam Proje Sayısı</strong>
                                    </div>
                                    <div class="number dashtext-2">{{ $projects ?? 0 }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Toplam Kategori Sayısı</strong>
                                    </div>
                                    <div class="number dashtext-3">{{ $categories ?? 0 }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Toplam Araç Sayısı</strong>
                                    </div>
                                    <div class="number dashtext-4">{{ $tools ?? 0 }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="no-padding-bottom">
                <div class="container-fluid">
                    <div class="line-cahrt block">
                        <canvas id="pieChartHome3"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Chart(document.getElementById("pieChartHome3"), {
            type: 'pie',
            data: {
                labels: [
                    "Projeler",
                    "Kullanıcılar",
                    "Kategoriler",
                    "Araçlar",
                ],
                datasets: [{
                    label: "Site Toplam İçerik Sayıları Grafiği",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: [{{ $projects ?? 0 }}, {{ $users ?? 0 }}, {{ $categories ?? 0 }}, {{ $tools ?? 0 }}],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Site Toplam İçerik Sayıları Grafiği'
                }
            }
        });

    </script>
@endsection