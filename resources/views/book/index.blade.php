@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">Liste des livres</div>

            @if(!empty($books))
                @foreach ($books as $book)
                    <pre>
                        @php(var_dump($book))
                    </pre>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
