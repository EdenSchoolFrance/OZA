@extends('app')

@section('content')

<div class="container-fluid main">
    @include('utils/header')
    <div class="row body">
        <div class="col-2">
            @include('utils.sidebar')
        </div>
        <div class="col-10">
            <div class="row">
                <!--
                    Some code here
                -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection
