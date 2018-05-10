@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.header')
    <div class="d-flex align-items-stretch">
        @include('admin.layouts.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Grafikler</h2>
                    <hr>
                    <section class="no-padding-bottom">
                        <div class="container-fluid">
                            <div class="line-cahrt block">
                                <canvas id="pieChartHome3"></canvas>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Chart(document.getElementById("pieChartHome3"), {
            type: 'pie',
            data: {
                labels: [
                    "Userlar",
                    "Adminler",
                ],
                datasets: [{
                    label: "Site Toplam Kullanıcı-Admin Sayıları Grafiği",
                    backgroundColor: ["#3e95cd", "#8e5ea2"],
                    data: [{{ $userCount ?? 0 ?? 0 }}, {{ $adminCount ?? 0 }}],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Site Toplam Kulanıcı-Admin Sayıları Grafiği'
                }
            }
        });

    </script>
@endsection