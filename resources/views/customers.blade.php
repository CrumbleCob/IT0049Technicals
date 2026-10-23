@extends('layouts.app')

@section('title', 'Customer Accounts | Laravel POS')

@section('content')
    <div class="page-heading">
        <div><span class="eyebrow">Static PHP array</span><h1>Customer Accounts</h1></div>
        <span class="count-badge">{{ count($customers) }} records</span>
    </div>

    <div class="table-wrap">
        <table>
            <thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Type</th></tr></thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer['id'] }}</td>
                        <td><strong>{{ $customer['name'] }}</strong></td>
                        <td>{{ $customer['email'] }}</td>
                        <td>{{ $customer['phone'] }}</td>
                        <td><span class="pill">{{ $customer['type'] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
