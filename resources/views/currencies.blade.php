@extends('layouts.app')

@section('title', 'Currencies')

@section('content')

    <div class="container">

        @if (count($currencies) === 0)
            <h4>No currencies</h4>
        @else
            <h3 class="text-center">Currency market</h3>
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">Logo</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Short name</th>
                        <th class="text-center">Price</th>
                        @can('edit')
                            <th class="text-center">Edit</th>
                        @endcan
                        @can('delete')
                            <th class="text-center">Delete</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($currencies as $currency)
                        <tr>
                            <td>
                                <img src="{{ $currency['logo_url'] }}">
                            </td>
                            <td>
                                <h4><a href="{{ route('show', ['id' => $currency['id']]) }}">{{ $currency['title'] }}</a></h4>
                            </td>
                            <td>
                                <h4>{{ $currency['short_name'] }}</h4>
                            </td>
                            <td>
                                <h4>{{ $currency['price'] }}</h4>
                            </td>
                            @can('edit')
                                <td>
                                    <a class="btn btn-warning" href="{{ route('edit', ['id' => $currency['id']]) }}" role="button">Edit</a>
                                </td>
                            @endcan
                            @can('delete')
                            <td>
                                <form action="{{ route('destroy', ['id' => $currency['id']]) }}" method="POST">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger delete-button" type="submit">Delete</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
