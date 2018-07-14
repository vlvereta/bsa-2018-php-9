@extends('layouts.app')

@section('title', 'Edit currency')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editing currency in the market') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update', $currency['id']) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Currency name:') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') ? old('title') : $currency['title'] }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_name" class="col-sm-4 col-form-label text-md-right">{{ __('Short name:') }}</label>

                                <div class="col-md-6">
                                    <input id="short_name" type="short_name" class="form-control{{ $errors->has('short_name') ? ' is-invalid' : '' }}" name="short_name" value="{{ old('short_name') ? old('short_name') : $currency['short_name'] }}" required autofocus>

                                    @if ($errors->has('short_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('short_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo_url" class="col-sm-4 col-form-label text-md-right">{{ __('Logo URL:') }}</label>

                                <div class="col-md-6">
                                    <input id="logo_url" type="logo_url" class="form-control{{ $errors->has('logo_url') ? ' is-invalid' : '' }}" name="logo_url" value="{{ old('logo_url') ? old('logo_url') : $currency['logo_url'] }}" required autofocus>

                                    @if ($errors->has('logo_url'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('logo_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-sm-4 col-form-label text-md-right">{{ __('Price:') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') ? old('price') : $currency['price'] }}" required autofocus>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
