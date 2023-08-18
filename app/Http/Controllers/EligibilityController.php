<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class EligibilityController extends Controller
{
    public function getBalance(Request $request)
    {
        //Input from form
        $yield = $request->input('yield');
        $fertiliserAmount = $request->input('amount');
        $fertiliserMethod = $request->input('method');
        $fertiliserFreq = $request->input('frequency');
        $currentNitrogenBal = $request->input('currentNBal');
        $allowedSurplus = $request->input('allowedSurplus');

        //example data from https://app.swaggerhub.com/apis-docs/tsig-idr/navigator-tool/0.0.1#/Nutrients/addF4
        $exampleDataF4 = [
            "input" => [
                "area" => 99,
                "comnbustible" => "Fuel oil",
                "drain_rate" => "",
                "consumption" => "1",
                "residues" => "incorporated",
                "spread" => "yes",
                "removed" => "no",
                "seeds" => "1000",
                "herb" => "2",
                "fung" => "3",
                "insect" => "0",
                "otreat" => "0",
                "temp_reg" => "temperate boreal",
                "moist_reg" => null,
                "soil" => null,
                "price" => null,
                "price_water" => null,
                "dose_irrigation" => "2500",
                "price_seeds" => null,
                "price_herb" => null,
                "price_fung" => null,
                "price_insect" => null,
                "price_otreat" => null,
                "crop_name" => "Barley 6 row",
                "crop_type" => "BARLEY_6_ROW",
                "PK_strategy" => "minimum-fertilizer",
                "yield" => $yield,
                "export_r" => "100",
                "HI_est" => "40",
                "CV" => "20",
                "Nc_h" => "1.6",
                "Pc_h" => "0.42",
                "Kc_h" => "0.54",
                "soil_texture" => "sand",
                "tilled" => "yes",
                "pH" => "7",
                "CEC" => "75",
                "SOM" => "1.5",
                "depth_s" => "0.3",
                "Nc_s_initial" => "30",
                "Nc_end" => "20",
                "Pc_method" => "olsen",
                "Pc_s" => "100",
                "Kc_s" => "10",
                "climatic_zone" => "alpine",
                "water_supply" => "1",
                "type_irrigated" => "sprinkler",
                "Nc_NO3_water" => "24",
                "rain_a" => "1000",
                "rain_w" => "600",
                "applied" => [
                    [
                        "fertilizerID" => "U",
                        "fertilizer_name" => "Urea",
                        "type" => "Inorganic",
                        "nbf" => 31.660404999755,
                        "amount" => $fertiliserAmount,
                        "cost" => 9.15,
                        "method" => $fertiliserMethod,
                        "frequency" => $fertiliserFreq,
                        "N" => 46,
                        "P" => 0,
                        "P2O5" => 0,
                        "K" => 0,
                        "K2O" => 0,
                        "S" => 0,
                        "N_ur" => 46
                    ]
                ],
                "prices" => [
                    [
                        "ID",
                        "Fertilizer",
                        "Price (euro/t)"
                    ],
                    [
                        "NaN",
                        "Sodium nitrate",
                        "100000"
                    ],
                    [
                        "CaN",
                        "Calcium nitrate",
                        "100000"
                    ],
                    [
                        "MgN",
                        "Magnesium nitrate",
                        "280"
                    ],
                    [
                        "AumS",
                        "Ammonium sulphate",
                        "215"
                    ],
                    [
                        "U",
                        "Urea",
                        "305"
                    ],
                    [
                        "AumN",
                        "Ammonium nitrate",
                        "275"
                    ],
                    [
                        "CaAumN",
                        "Calcium ammonium nitrate",
                        "301"
                    ],
                    [
                        "NSAum",
                        "Ammonium nitrosulphate",
                        "247"
                    ],
                    [
                        "N32",
                        "Nitrogen solutions (32%)",
                        "325"
                    ],
                    [
                        "Uf",
                        "Urea formaldehyde (UF)",
                        "100000"
                    ],
                    [
                        "Ibdu",
                        "Isobutylidene diurea (IBDU)",
                        "100000"
                    ],
                    [
                        "Cdu",
                        "Crotonylidene diurea (CDU)",
                        "100000"
                    ],
                    [
                        "sPsi",
                        "Superphosphate simple",
                        "273"
                    ],
                    [
                        "sPco",
                        "Superphosphate concentrate",
                        "202"
                    ],
                    [
                        "TSP",
                        "Triple superphosphate (TSP)",
                        "320"
                    ],
                    [
                        "Pac",
                        "Phosphoric acid",
                        "641"
                    ],
                    [
                        "sPac",
                        "Superphosphoric acid",
                        "100000"
                    ],
                    [
                        "DCaP",
                        "Dycalcium phosphate",
                        "100000"
                    ],
                    [
                        "CameP",
                        "Calcium metaphosphate",
                        "100000"
                    ],
                    [
                        "caP",
                        "Calcined phosphate",
                        "100000"
                    ],
                    [
                        "bs",
                        "Basic slags",
                        "100000"
                    ],
                    [
                        "gPr",
                        "Ground phosphate rock",
                        "100000"
                    ],
                    [
                        "KCl",
                        "Potassium chloride",
                        "365"
                    ],
                    [
                        "PS",
                        "Potassium sulphate",
                        "516"
                    ],
                    [
                        "MAP",
                        "Mono-ammonium phosphate (MAP)",
                        "548"
                    ],
                    [
                        "DAP",
                        "Di-ammonium phosphate (DAP)",
                        "411"
                    ],
                    [
                        "APP",
                        "Ammonium polyphosphates (APP)",
                        "100000"
                    ],
                    [
                        "NP",
                        "Nitrophosphates",
                        "100000"
                    ],
                    [
                        "KP",
                        "Potassium phosphates",
                        "100000"
                    ],
                    [
                        "KN",
                        "Potassium nitrate",
                        "550"
                    ],
                    [
                        "x8-15-15",
                        "Complex 8-15-15",
                        "281"
                    ],
                    [
                        "x12-12-24",
                        "Complex 12-12-24",
                        "371"
                    ],
                    [
                        "x15-15-15",
                        "Complex 15-15-15",
                        "349"
                    ],
                    [
                        "x9-18-27",
                        "Complex 9-18-27",
                        "357"
                    ],
                    [
                        "x8-24-8",
                        "Complex 8-24-8",
                        "325"
                    ],
                    [
                        "x8-24-16",
                        "Complex 8-24-16",
                        "341"
                    ],
                    [
                        "x12-24-8",
                        "Complex 12-24-8",
                        "315"
                    ],
                    [
                        "x12-24-12",
                        "Complex 12-24-12",
                        "320"
                    ],
                    [
                        "x9-12-24",
                        "Complex 9-12-24",
                        "100000"
                    ],
                    [
                        "x10-20-10",
                        "Complex 10-20-10",
                        "230"
                    ],
                    [
                        "x8-16-8",
                        "Complex 8-16-8",
                        "305"
                    ],
                    [
                        "x18-46-0",
                        "Complex 18-46-0",
                        "385"
                    ],
                    [
                        "x10-10-17",
                        "Complex 10-10-17",
                        "292"
                    ],
                    [
                        "x12-36-12",
                        "Complex 12-36-12",
                        "390"
                    ],
                    [
                        "s4-16-10",
                        "Suspension 4-16-10",
                        "270"
                    ],
                    [
                        "s5-10-10",
                        "Suspension 5-10-10",
                        "100000"
                    ],
                    [
                        "s5-20-5",
                        "Suspension 5-20-5",
                        "100000"
                    ],
                    [
                        "s6-12-16",
                        "Suspension 6-12-16",
                        "100000"
                    ],
                    [
                        "s6-16-10",
                        "Suspension 6-16-10",
                        "100000"
                    ],
                    [
                        "s10-20-0",
                        "Suspension 10-20-0",
                        "100000"
                    ],
                    [
                        "P7-15-6",
                        "Fosfoplus 7-15-6 + 5%S + 9% PHC",
                        "100000"
                    ],
                    [
                        "P8-8-10",
                        "Fosfoplus 8-8-10 + 5%S + 9% PHC",
                        "100000"
                    ],
                    [
                        "sP18",
                        "Superphosphate 18%",
                        "242"
                    ],
                    [
                        "sP45",
                        "Superphosphate 45%",
                        "320"
                    ],
                    [
                        "acP",
                        "Acid phosphoric",
                        "641"
                    ],
                    [
                        "U46",
                        "Urea 46%",
                        "345"
                    ],
                    [
                        "U46i",
                        "Urea 46%+ Inhibitor",
                        "100000"
                    ],
                    [
                        "U40S",
                        "Urea 40%+ Sulfur (YARA Sulfamid)",
                        "280"
                    ],
                    [
                        "AumNS26",
                        "Ammonium nitrophosphate 26%",
                        "290"
                    ],
                    [
                        "AumNS21",
                        "Ammonium nitrophosphate 21%",
                        "100000"
                    ],
                    [
                        "soN32",
                        "Solution N-32",
                        "240"
                    ],
                    [
                        "soN20",
                        "Solution N-20",
                        "175"
                    ],
                    [
                        "soN26",
                        "Solution N-26",
                        "100000"
                    ],
                    [
                        "CaNso",
                        "Calcium nitrate solution",
                        "920"
                    ],
                    [
                        "MgNso",
                        "Magnesium nitrate solution",
                        "100000"
                    ],
                    [
                        "N33",
                        "Nitro33",
                        "100000"
                    ],
                    [
                        "Nplus",
                        "Nitroplus",
                        "307"
                    ],
                    [
                        "Nac",
                        "Nitric acid",
                        "443"
                    ],
                    [
                        "AumN33",
                        "Ammonium nitrate 33%",
                        "450"
                    ],
                    [
                        "AumN27",
                        "Ammonium nitrate 27% (NAC)",
                        "255"
                    ],
                    [
                        "AumN20",
                        "Ammonium nitrate 20%",
                        "100000"
                    ],
                    [
                        "MgS",
                        "Magnesium sulfate",
                        "320"
                    ],
                    [
                        "AumS21",
                        "Ammonium sulfate 21%",
                        "238"
                    ],
                    [
                        "cm",
                        "Cow manure",
                        "100000"
                    ],
                    [
                        "dc",
                        "Dairy Cow",
                        "100000"
                    ],
                    [
                        "dh",
                        "Dairy Heifer",
                        "100000"
                    ],
                    [
                        "bc",
                        "Beef Cow",
                        "100000"
                    ],
                    [
                        "bf",
                        "Beef Feeder",
                        "100000"
                    ],
                    [
                        "bes",
                        "Beef Stocker",
                        "100000"
                    ],
                    [
                        "sm",
                        "Swine Manure",
                        "100000"
                    ],
                    [
                        "sf",
                        "Swine Finishing",
                        "100000"
                    ],
                    [
                        "sg",
                        "Swine Growing",
                        "100000"
                    ],
                    [
                        "sn",
                        "Swine Nursery",
                        "100000"
                    ],
                    [
                        "sgs",
                        "Swine Gestating sow",
                        "100000"
                    ],
                    [
                        "ss",
                        "Swine Sow and litter",
                        "100000"
                    ],
                    [
                        "pm",
                        "Poultry Manure",
                        "100000"
                    ],
                    [
                        "pl",
                        "Poultry Layer",
                        "100000"
                    ],
                    [
                        "pb",
                        "Poultry Broiler",
                        "100000"
                    ],
                    [
                        "pt",
                        "Poultry Turkey",
                        "100000"
                    ],
                    [
                        "pd",
                        "Poultry Duck",
                        "100000"
                    ],
                    [
                        "pg",
                        "Poultry Goose",
                        "100000"
                    ],
                    [
                        "oh",
                        "Other Horse",
                        "100000"
                    ],
                    [
                        "os",
                        "Other Sheep",
                        "100000"
                    ],
                    [
                        "og",
                        "Other Goat",
                        "100000"
                    ],
                    [
                        "or",
                        "Other Rabbit",
                        "100000"
                    ],
                    [
                        "d",
                        "Digestato",
                        "100000"
                    ],
                    [
                        "se",
                        "Sludge EDAR",
                        "100000"
                    ],
                    [
                        "ps",
                        "Poultry slurry",
                        "100000"
                    ],
                    [
                        "rs",
                        "Rabbit slurry",
                        "100000"
                    ],
                    [
                        "pigs",
                        "Pig slurry",
                        "100000"
                    ],
                    [
                        "cs",
                        "Cattle slurry",
                        "100000"
                    ],
                    [
                        ""
                    ]
                ]
            ]
        ];

        $url =   'http://navigator-dev.teledeteccionysig.es/F4/requirements';
        $response = Http::post($url, $exampleDataF4);
        $resultData = $response->json();

        $nutrientBalanceData = $resultData['results'][0]['nutrient_requirements'];

        $fertiliserApplied = (int)$fertiliserAmount * (46/100); // 46 is the N percent amount for Urea fertilizer

        $nutrientBalanceData['Noutputs_terms'] = array_map(function ($value) {
            return round($value, 2); // Round to 2 decimal places
        }, $nutrientBalanceData['Noutputs_terms']);

        $totalInput = array_sum($nutrientBalanceData['Ninputs_terms']) + $fertiliserApplied;
        $totalOutput = array_sum($nutrientBalanceData['Noutputs_terms']);
        $nitrogenBal = $totalInput - $totalOutput;
        $credits = $currentNitrogenBal - $nitrogenBal;


        return view('creditgenerate.balanceresult',
            ['balance' => $nutrientBalanceData,
                'totalInput' => $totalInput,
                'totalOutput' => $totalOutput,
                'fertiliserApplied' => $fertiliserApplied,
                'nitrogenBal' => $nitrogenBal,
                'baselineNSurplus' => $currentNitrogenBal,
                'allowedSurplus' => $allowedSurplus,
                'credits' => $credits

            ]);

    }

}





