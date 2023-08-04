@extends('layouts.landing')

@section('title', 'Home')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="column">
               <a href="/generatecredit"> <h2>Generate credits</h2></a>
                <p>
                    <ul>
                        <li>Check if you're eligible to generate credits</li>
                        <li>Verify your credits</li>
                        <li>Put your credits for sale in marketplace</li>
                    </ul>
                </p>
            </div>
            <div class="column">
                <div class="column">
                    <a href=""> <h2>Purchase credits</h2></a>
                    <p>
                    <ul>
                        <li>Check credit listing offers in marketplace</li>
                        <li>Purchase credits needed</li>
                    </ul>
                    </p>                </div>
            </div>
        </div>
    </div>
@endsection
