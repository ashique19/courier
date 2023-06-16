@extends('public.layouts.layout')
@section('title')Epeon - Deliverying Parcels @stop
@section('main')

<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-size-4 has-text-centered margin-top-50">Dashboard</h1>
    
    {!! errors( $errors ) !!}
    
</div>


<div class="column is-12-desktop is-12-mobile">

    <section class="tile is-ancestor">
    
        <div class="tile">
            <table class="table is-narrow width-300">
                <tbody>
                    <tr>
                        <td colspan="2"><h2 class="subtitle is-4">Last 30 days</h2></td>
                    </tr>
                    <tr>
                        <td>Delivered</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Failed</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Others</td>
                        <td>0</td>
                    </tr>
                    <tr class="lightGray-bg">
                        <td class="font-weight-700">Total</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tile">
            <table class="table is-narrow width-300">
                <tbody>
                    <tr>
                        <td colspan="2"><h2 class="subtitle is-4">Current Status</h2></td>
                    </tr>
                    <tr>
                        <td>In Progress</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>New Today</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tile">
            <table class="table is-narrow width-300">
                <tbody>
                    <tr>
                        <td colspan="2"><h2 class="subtitle is-4">Payments</h2></td>
                    </tr>
                    <tr>
                        <td>Unpaid</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Processing</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Paid</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>
    


    <canvas 
        id="bar-chart" 
        height="200"
        class="height-200" 
    ></canvas>
        
</div>

  

@stop
        

@section('js')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>

$(document).ready(function(){

    let barChartCtx = $('#bar-chart');

    var barChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Delivered',
            backgroundColor: 'green',
            data: [
                10,
                20,
                30,
                20,
                5,
                20,
                10
            ]
        }, {
            label: 'Failed',
            backgroundColor: 'red',
            data: [
                30,
                20,
                5,
                20,
                10,
                20,
                30
            ]
        }, {
            label: 'Others',
            backgroundColor: 'yellow',
            data: [
                10,
                20,
                30,
                20,
                5,
                20,
                10
            ]
        }]

    };

    var myChart = new Chart(barChartCtx, {
        type: 'bar',
        data: barChartData,
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: false,
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

})

</script>
@stop 