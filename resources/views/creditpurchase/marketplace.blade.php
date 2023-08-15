@extends('layouts.purchaser')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Trading marketplace</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Credit ID</th>
                <th scope="col">Farm</th>
                <th scope="col">Credits for sale</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">CRED-201</th>
                <td>Farm 101</td>
                <td>20</td>
                <td><button class="btn btn-primary">Purchase</button></td>
            </tr>
            <tr>
                <th scope="row">CRED-205</th>
                <td>Farm 105</td>
                <td>50</td>
                <td><button class="btn btn-primary">Purchase</button></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
