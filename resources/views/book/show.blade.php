@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">Single livre</div>

            @if(!empty($book))
                <pre>
                    @php(var_dump($book))
                </pre>
            @endif
        </div>
    </div>
</div>
@endsection
