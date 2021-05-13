@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">
                    Add
                </h3>

                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="post">
                        @csrf

                        @include('admin.users.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
