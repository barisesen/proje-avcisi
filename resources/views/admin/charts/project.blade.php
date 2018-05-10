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
                            <div class="line-cahart block">
                                <canvas id="bar-chart"></canvas>
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
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: ["User1", "User2", "User2", "User2", "User2"],
                datasets: [
                    {
                        label: "Population (millions)",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: [2478,5267,734,784,433]
                    }
                ]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                }
            }
        });
    </script>
@endsection