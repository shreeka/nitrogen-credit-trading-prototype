@extends('layouts.generator')

@section('title','Credit Generation Eligibility Tool')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Credit Generation Eligibility Tool</h1>
        <form class="needs-validation" novalidate action="{{ route('getBalance') }}" method="GET">
            <input required type="hidden" name="input[area]" />
            <input required type="hidden" name="input[comnbustible]" />
            <input required type="hidden" name="input[drain_rate]" />
            <input required type="hidden" name="input[consumption]" />
            <input required type="hidden" name="input[residues]" />
            <input required type="hidden" name="input[spread]" />
            <input required type="hidden" name="input[removed]" />
            <input required type="hidden" name="input[seeds]" />
            <input required type="hidden" name="input[herb]" />
            <input required type="hidden" name="input[fung]" />
            <input required type="hidden" name="input[insect]" />
            <input required type="hidden" name="input[otreat]" />
            <input required type="hidden" name="input[temp_reg]" />
            <input required type="hidden" name="input[moist_reg]" />
            <input required type="hidden" name="input[soil]" />
            <input required type="hidden" name="input[price]" />
            <input required type="hidden" name="input[price_water]" />
            <input required type="hidden" name="input[dose_irrigation]" />
            <input required type="hidden" name="input[price_seeds]" />
            <input required type="hidden" name="input[price_herb]" />
            <input required type="hidden" name="input[price_fung]" />
            <input required type="hidden" name="input[price_insect]" />
            <input required type="hidden" name="input[price_otreat]" />
            <div class="card">
                <h5 class="card-header">Crop</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="crop_type" class="form-label">Plant common name</label>
                            <input required type="hidden" name="input[crop_name]" />
                            <select required class="form-select" id="crop_type" name="input[crop_type]">
                                <optgroup label="CEREALS_PSEUDOCEREALS">
                                    <option value="BARLEY_2_ROW">Barley 2 row</option>
                                    <option value="BARLEY_6_ROW">Barley 6 row</option>
                                    <option value="BUCKWHEAT">Buckwheat</option>
                                    <option value="CORN_GRAIN">Corn</option>
                                    <option value="MAIZE_SILAGE">Maize</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="yield" class="form-label">Yield (kg/ha)</label>
                            <input required type="number" class="form-control" id="yield" name="yield" min="0" value="1000" />
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <h5 class="card-header">Plot</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="water_supply" class="form-label">Water supply</label>
                            <select required class="form-select" id="water_supply" name="input[water_supply]">
                                <option value="0">Rainfed</option>
                                <option selected value="1">Irrigated</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="climatic_zone" class="form-label">Climatic zone&nbsp;&nbsp;</label>
                            <select required class="form-select" id="climatic_zone" name="input[climatic_zone]">
                                <option selected value="alpine">Alpine</option>
                                <option value="atlantic">Atlantic</option>
                                <option value="continental">Continental</option>
                                <option value="northern">Northern </option>
                                <option value="southern">Southern</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <h5 class="card-header">Fertilizers</h5>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <label class="form-label mt-1 pull-right" title="Fertilizer that needs to be included in calculation (because the farmer has either applied it already or wants to apply it)">Fertilizer that needs to be included in calculation:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-sm-5">
                            <select class="form-select" id="fertilizerID" name="fertilizerID">
                                <option></option>
                                <option value="U" selected>Urea</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select disabled class="form-select" name="type">
                                <option value="Organic">Organic</option>
                                <option value="Inorganic">Inorganic</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" name="method">
                                <option value="incorporated">Incorporated</option>
                                <option value="topdressing" selected>Top-dressing</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" name="frequency">
                                <option value="annual" selected>Annual</option>
                                <option value="biennial">Biennial</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="offset-sm-1 col-sm-3">
                            <input type="number" class="form-control" placeholder="Amount" id="amount" name="amount" min="0" value = 500 />
                            <label for="amount" class="form-label">kg/ha</label>
                        </div>
                        <div class="col-sm-1">
                            <input disabled type="number" class="form-control" id="N" name="N" value="46" min="0" max="100" step="0.001" />
                            <label for="N" class="form-label">% N</label>
                        </div>
                        <div class="col-sm-1">
                            <input disabled type="number" class="form-control" id="N_ur" name="N_ur" value="46" min="0" max="100" step="0.001" />
                            <label for="N_ur" class="form-label">% Ur</label>
                        </div>
                        <div class="col-sm-1">
                            <input disabled type="number" class="form-control" id="P" name="P" value="0" min="0" max="100" step="0.001" />
                            <label for="P" class="form-label">% P</label>
                        </div>
                        <div class="col-sm-1">
                            <input disabled type="number" class="form-control" id="K" name="K" value="0" min="0" max="100" step="0.001" />
                            <label for="K" class="form-label">% K</label>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <h5 class="card-header">Current data</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="allowedSurplus">Surplus allowance for the farm (kg/ha)</label>
                            <input type="number" id="allowedSurplus" name="allowedSurplus" class="w-25" value="70">
                        </div>
                        <div class="col-sm-6">
                            <label for="currentNBal">Baseline Nitrogen Balance (kg/ha) (Current nitrogen surplus for the farm)</label>
                            <input type="number" id="currentNBal" name="currentNBal" class="w-25" value="60">
                        </div>



                </div>
            </div>
            <br/>
            <div class="d-flex align-items-center justify-content-center">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-lg btn-warning">
                        <span>Get result</span>
                    </button>
                </div>
            </div>
            <br/>
            </div>
        </form>



    </div>
@endsection
