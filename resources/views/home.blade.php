@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Vue Training
                </div>
                <div class="card-body">
                    <friend-list></friend-list>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <button class="btn btn-primary" @click="isActive = true">Appear</button>
            <example-component v-if="isActive" @close="isActive = false"></example-component>
        </div>
    </div>
</div>
@endsection
