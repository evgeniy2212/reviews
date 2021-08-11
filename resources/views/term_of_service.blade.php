@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place">
            <p>
                {!! \App\Services\ServiceInfoService::getInfoValueByName('term_of_service') !!}
            </p>
        </div>
    </div>
@endsection
