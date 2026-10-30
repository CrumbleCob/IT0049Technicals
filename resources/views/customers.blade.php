@extends('layouts.app')

@section('title', 'Customers | Module 6 Technical')

@section('content')
    <div class="page-heading">
        <div><span class="eyebrow">Eloquent collection</span><h1>Customer Accounts</h1></div>
        <span class="count-badge">{{ $customers->count() }} database records</span>
    </div>

    <div class="table-wrap">
        <table>
            <thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone</th></tr></thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td><strong>{{ $customer->full_name }}</strong></td>
                        <td>{{ $customer->email }}</td>
                        <td><span class="pill">{{ $customer->phone }}</span></td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="empty-state">No customers found. Run the database seeder.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

