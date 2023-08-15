@extends('layouts.generator')

@section('title','Credit Generation Eligibility Tool')

@section('content')
    <div class="" id="results">
        <h3 class="text-center">Nutrients balance</h3>
        <div class="row">
            <div class="col-sm-6" id="balance_input">
                <table class="table table-warning text-end" id="F4-tabla-2">
                    <thead>
                    <tr>
                        <th></th>
                        <th>N (kg/ha)</th>
                        <th>P (kg/ha)</th>
                        <th>K (kg/ha)</th>
                        <th>P2O5 (kg/ha)</th>
                        <th>K2O (kg/ha)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr name="Nmineralization">
                        <td>Mineralization</td>
                        <td>{{ $balance['Ninputs_terms']['Nmineralization'] }}</td>
                    </tr>
                    <tr name="Nfixation">
                        <td>Fixation</td>
                        <td>{{ $balance['Ninputs_terms']['Nfixation'] }}</td>
                    </tr>
                    <tr name="Nwater">
                        <td>Irrigation</td>
                        <td>{{ $balance['Ninputs_terms']['Nwater'] }}</td>
                    </tr>
                    <tr name="NminInitial">
                        <td>Initial of soil</td>
                        <td>{{ $balance['Ninputs_terms']['NminInitial'] }}</td>
                    </tr>
                    <tr name="appliedFertilizer">
                        <td>Fertilizer applied</td>
                        <td> {{ $fertiliserApplied }} </td>
                    </tr>
                    <tr name="total" class="fs-5">
                        <td>TOTAL INPUT</td>
                        <td> {{ $totalInput }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6" id="balance_output">
                <table class="table table-warning text-end" id="F4-tabla-3">
                    <thead>
                    <tr>
                        <th></th>
                        <th>N (kg/ha)</th>
                        <th>P (kg/ha)</th>
                        <th>K (kg/ha)</th>
                        <th>P2O5 (kg/ha)</th>
                        <th>K2O (kg/ha)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr name="Nleaching">
                        <td>Leaching</td>
                        <td>{{ $balance['Noutputs_terms']['Nleaching'] }}</td>
                    </tr>
                    <tr name="Uptake">
                        <td>Uptake</td>
                        <td>{{ $balance['Noutputs_terms']['Nuptake'] }}</td>
                        <td>{{ $balance['Pcf'] }}</td>
                        <td>{{ $balance['Kcf'] }}</td>
                        <td>{{ $balance['P2O5cf'] }}</td>
                        <td>{{ $balance['K2Ocf']}}</td>
                    </tr>
                    <tr name="NminPostharvest">
                        <td>End of soil</td>
                        <td>{{ $balance['Noutputs_terms']['NminPostharvest'] }}</td>
                    </tr>
                    <tr name="Ndenitrification">
                        <td>Denitrification</td>
                        <td>{{ $balance['Noutputs_terms']['Ndenitrification'] }}</td>
                    </tr>
                    <tr name="Nvolatilization">
                        <td>Volatilization</td>
                        <td>{{ $balance['Noutputs_terms']['Nvolatilization'] }}</td>
                    </tr>
                    <tr name="total" class="fs-5">
                        <td>TOTAL OUTPUT</td>
                        <td> {{ $totalOutput }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Eligibility check</h5>
        <div class="card-body">
          <h6>Nitrogen Balance (kg/ha): {{ $nitrogenBal }}</h6>
          <h6>Surplus allowance for the farm (kg/ha) : {{ $allowedSurplus }} </h6>
          <h6>Baseline Nitrogen Balance (kg/ha) (Current nitrogen surplus for the farm) : {{ $baselineNSurplus }} </h6>

            @if ($nitrogenBal < $allowedSurplus)
                @if($nitrogenBal < $baselineNSurplus)
                    <p class="text-success h5">Credits generated: {{ $credits }}</p>
                @else
                    <p class="text-danger h5">Not eligible to generate credits. Nitrogen Balance is more than baseline nitrogen balance.</p>
                @endif
            @else
                <p class="text-danger h5">Not eligible to generate credits. Nitrogen Balance is more than surplus allowance.</p>
            @endif
        </div>
    </div>
    <br>
    <div class="d-flex align-items-center justify-content-center">
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-lg btn-warning">
                <span>Submit for review</span>
            </button>
        </div>
    </div>

@endsection
