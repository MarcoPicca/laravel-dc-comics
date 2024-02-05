@extends('layouts.app')

@section('main-content')
    <section class="products">
        <div class="container">
            <div class="row">
                <div class="row ">
                    @foreach ($comics as $comic)
                        <div class="col">
                            <a href="{{ route('guest.comics.show', $comic['id']) }}">
                                <div class="card">
                                    <img src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }} picture">
                                    <div class="card-body">
                                        <p class="text-uppercase">
                                            {{ $comic['title'] }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection