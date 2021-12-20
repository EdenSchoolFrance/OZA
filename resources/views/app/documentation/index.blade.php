@extends('app')

@section('content')
    <div class="content">
        <div class="card card--doc">
            @csrf
            @if (Auth::user()->hasPermission('oza', 'ADMIN'))
                <div class="card-header">
                    <a href="{{ route('documentation.edit', [$doc->name]) }}" class="btn btn-yellow">Modifier</a>
                </div>
            @endif
            <div class="card-body">
                {!! $doc->content !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
