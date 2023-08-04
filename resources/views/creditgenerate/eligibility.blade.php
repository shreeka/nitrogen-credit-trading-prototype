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
                <h5 class="card-header bg-success text-white">Crop</h5>
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
                            <input required type="number" class="form-control" id="yield" name="input[yield]" min="0" value="10000" />
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <h5 class="card-header bg-info text-white">Plot</h5>
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
                            <a href="#" data-bs-toggle="modal" data-bs-target=".modal">
                                <i class="fa fa-info"></i>
                            </a>
                            <select required class="form-select" id="climatic_zone" name="input[climatic_zone]">
                                <option value="alpine">Alpine</option>
                                <option selected value="atlantic">Atlantic</option>
                                <option value="continental">Continental</option>
                                <option value="northern">Northern </option>
                                <option value="southern">Southern</option>
                            </select>
                            <div class="modal fade" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <img src="/img/climates.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card">
                <h5 class="card-header bg-danger text-white">Fertilizers</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="prices" class="form-label mt-2 pull-right">List of current prices:</label>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control" id="prices" type="file" accept=".csv" />
                        </div>
                        <div class="col-sm-4">
                            <a href="/csv/F3/Fertilizers.csv">Download default prices</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <label for="fertilizers" class="form-label mt-2 pull-right">Select to include in list of best fertilizer:</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-select" id="fertilizers" name="fertilizers" multiple></select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <label class="form-label mt-1 pull-right" title="Fertilizer that needs to be included in calculation (because the farmer has either applied it already or wants to apply it)">Fertilizer that needs to be included in calculation:</label>
                        </div>
                        <div class="col-sm-9">
                            <ul class="list-unstyled">
                                <li class="default">
                                    <span>None</span>
                                    <button class="btn fa fa-trash text-white"></button>
                                </li>
                            </ul>
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
                                <option value="custom">CUSTOM</option>
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
                                <option value="topdressing">Top-dressing</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" name="frequency">
                                <option value="annual">Annual</option>
                                <option value="biennial">Biennial</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="offset-sm-1 col-sm-3">
                            <input type="number" class="form-control" placeholder="Amount" id="amount" name="amount" min="0" />
                            <label for="amount" class="form-label">kg/ha</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" placeholder="Price"  id="price" name="price" min="0" step="0.0001" />
                            <label for="price" class="form-label">&euro;/t</label>
                        </div>
                        <div class="col-sm-1">
                            <input disabled type="number" class="form-control" id="N" name="N" value="0" min="0" max="100" step="0.001" />
                            <label for="N" class="form-label">% N</label>
                        </div>
                        <div class="col-sm-1">
                            <input disabled type="number" class="form-control" id="N_ur" name="N_ur" value="0" min="0" max="100" step="0.001" />
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
            <div class="d-flex align-items-center justify-content-center">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-lg btn-warning">
                        <i class="fa fa-play"></i>
                        <span>Get result</span>
                    </button>
                </div>
            </div>
            <br/>
            <div class="d-none" id="results">
                <h3 class="text-center">Nutrients balance</h3>
                <div class="row">
                    <div class="col-sm-6" id="balance_input">
                        <table class="table table-warning text-end" id="F4-tabla-2">
                            <thead>
                            <tr>
                                <th></th>
                                <th>N (FU/ha)</th>
                                <th>P (FU/ha)</th>
                                <th>K (FU/ha)</th>
                                <th>P2O5 (FU/ha)</th>
                                <th>K2O (FU/ha)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr name="Nmineralization">
                                <td>Mineralization</td>
                            </tr>
                            <tr name="Nfixation">
                                <td>Fixation</td>
                            </tr>
                            <tr name="Nwater">
                                <td>Irrigation</td>
                            </tr>
                            <tr name="NminInitial">
                                <td>Initial of soil</td>
                            </tr>
                            <tr name="appliedFertilizer">
                                <td>Fertilizer applied</td>
                            </tr>
                            <tr name="recommendedFertilizer">
                                <td>Fertilizer recommended</td>
                            </tr>
                            <tr name="total" class="fs-5">
                                <td>TOTAL INPUT</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6" id="balance_output">
                        <table class="table table-warning text-end" id="F4-tabla-3">
                            <thead>
                            <tr>
                                <th></th>
                                <th>N (FU/ha)</th>
                                <th>P (FU/ha)</th>
                                <th>K (FU/ha)</th>
                                <th>P2O5 (FU/ha)</th>
                                <th>K2O (FU/ha)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr name="Nleaching">
                                <td>Leaching</td>
                            </tr>
                            <tr name="Uptake">
                                <td>Uptake</td>
                            </tr>
                            <tr name="NminPostharvest">
                                <td>End of soil</td>
                            </tr>
                            <tr name="Ndenitrification">
                                <td>Denitrification</td>
                            </tr>
                            <tr name="Nvolatilization">
                                <td>Volatilization</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr name="total" class="fs-5">
                                <td>TOTAL OUTPUT</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>



    </div>
@endsection
