@extends('layouts.generator')

@section('title','Credit Generation Eligibility Tool')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Credit Generation Eligibility Tool</h1>
        {{--<form>
            <div class="form-group p-2">
                <label for="generatorName">Full Name</label>
                <input type="text" class="form-control" id="generatorName">
            </div>
            <div class="form-group row p-2">
                <div class="col">
                    <label for="farmName">Farm Name</label>
                    <input type="text" class="form-control" id="farmName">
                </div>
                <div class="col">
                    <label for="farmSize">Farm Size (in hectare)</label>
                    <input type="number" class="form-control" id="farmSize">
                </div>
                <div class="col">
                    <label for="farmLocation">Farm Location</label>
                    <input type="text" class="form-control" id="farmLocation">
                </div>
            </div>
            <div class="form-group p-2">
                <label>Which of the following BMPs are currently in place?</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="controlledReleaseFertiliser">
                    <label class="form-check-label" for="controlledReleaseFertiliser">
                        Controlled release fertiliser
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="separation" checked>
                    <label class="form-check-label" for="separation">
                        Separation of solid and liquid manure
                    </label>
                </div>
            </div>
            <div class="form-group p-2">
                <label for="nutrientBalance">Nitrogen Surplus (kg N per hectare per year)</label>
                <input type="text" class="form-control w-25" id="nutrientBalance">
            </div>
            <button type="submit" class="btn btn-primary">View Result</button>
        </form>--}}
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Credit Estimation</h5>
                        <p class="card-text">Estimate the potential credits that can be generated.</p>
                        <a href="/estimatecredit" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Credit Generation</h5>
                        <p class="card-text">Calculate the actual credits you have earned.</p>
                        <a href="/creditgeneration" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>


    </div>
@endsection
