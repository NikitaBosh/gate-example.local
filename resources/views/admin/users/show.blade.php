@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">
                    Детали
                </h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>ID:</strong> {{ $item->id }}
                    </li>
                    <li class="list-group-item">
                        <strong>Name:</strong> {{ $item->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>E-mail:</strong> {{ $item->email }}
                    </li>
                    <li class="list-group-item">
                        <strong>Role:</strong> {{ $item->role }}
                    </li>
                    <li class="list-group-item">
                        <strong>Email verified at:</strong> {{ $item->email_verified_at }}
                    </li>
                    <li class="list-group-item">
                        <strong>Created at:</strong> {{ $item->created_at }}
                    </li>
                    <li class="list-group-item">
                        <strong>Updated at:</strong> {{ $item->updated_at }}
                    </li>
                </ul>
                <div class="card-body">
                    <form action="{{ route('admin.users.destroy', $item->id) }}"
                        method="post" class="float-left">

                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" id="delete" type="submit">Delete</button>
                    </form>&nbsp;
                    <a class="btn btn-secondary" id="edit" href="{{ route('admin.users.edit', $item->id) }}">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
