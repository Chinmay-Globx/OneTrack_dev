@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h3 class="mb-0">Hello, {{ Auth::user()->profile->first_name }} {{ Auth::user()->profile->last_name }} 👋</h3>
        <p class="text-muted">Welcome to your ERP CRM Dashboard</p>
    </div>
</div>
@endsection
