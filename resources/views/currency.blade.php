@extends('layouts.app')

@section('title', $currency['title'])

@section('content')

    <div class="container text-center">
        <h3>{{ $currency['title'] }}</h3>
        <img src="{{ $currency['logo_url'] }}">
        <h4>{{ $currency['title'] }}</h4>
        <h4>{{ $currency['short_name'] }}</h4>
        <h4>{{ $currency['price'] }}</h4>
        @can('edit')
        <div class="row">
            <div class="col-md-6 text-right">
                <a class="btn btn-warning edit-button" href="{{ route('edit', ['id' => $currency['id']]) }}" role="button">Edit</a>
            </div>
            <div class="col-md-6 text-left">
                <form action="{{ route('destroy', ['id' => $currency['id']]) }}" method="POST">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger delete-button" type="submit">Delete</button>
                </form>
            </div>
        </div>
        @endcan
    </div>

@endsection
