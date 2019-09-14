@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                <b>Todo List</b>
                <span class="pull-right float-right">
                    <a href="#addModal" class="btn btn-success btn-xs" data-toggle="modal">Add</a>
                </span>
                </div>
                    <div class="card-body"  id="app">
                        <tasks></tasks>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
