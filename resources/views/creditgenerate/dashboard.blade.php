@extends('layouts.generator')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <table class="table">
            <h3 class="p-2">Credit Balance</h3>
            <thead>
            <tr>
                <th scope="col">Credit ID</th>
                <th scope="col">Farm</th>
                <th scope="col">Available credits</th>
                <th scope="col">Pending credits</th>
                <th scope="col">Total credits</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">CRED-001</th>
                <td>Farm 1</td>
                <td>100</td>
                <td>50</td>
                <td>150</td>
            </tr>
            <tr>
                <th scope="row">CRED-002</th>
                <td>Farm 2</td>
                <td>500</td>
                <td>20</td>
                <td>520</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
