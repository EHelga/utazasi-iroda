@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-white bg-dark">
                    <div class="card-header">
                        {{ __('Create new travel') }}
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            {{ csrf_field() }}


                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Content</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea name="content" style="resize:none;" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" required>{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Travel start date</label>
                                <div class="col-md-6">
                                    <input type="date" name="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ old('date') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="endDate" class="col-md-4 col-form-label text-md-right">Travel end date</label>
                                <div class="col-md-6">
                                    <input type="date" name="endDate" class="form-control{{ $errors->has('endDate') ? ' is-invalid' : '' }}" value="{{ old('endDate') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="maxNumber" class="col-md-4 col-form-label text-md-right">Maximum number of people</label>
                                <div class="col-md-6">
                                    <input type="text" name="maxNumber" class="form-control{{ $errors->has('maxNumber') ? ' is-invalid' : '' }}" value="{{ old('maxNumber') }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
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