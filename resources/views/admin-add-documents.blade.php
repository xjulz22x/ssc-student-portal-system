@extends('layouts.student')

@section('content')
    <section>
        <div class="main">
            {{-- @if(session('message'))
            <div class="alert alert-success alert-dismissible w-4/5 m-auto mt-10 p-10">
                <p class="">
                    {{ session('message') }}
                </p>
            </div>
            @endif --}}
            <div class="row sidebar">
                @include('layouts.partials.side-bar')
                <!--end of side-->
                <div class="col-xl-8 col-md-7 col-sm-6">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-plus-square"></i> {{ __('Add Documents') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('document.add') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Document Name') }}</label>
                                    <div class="col-md-6">
                                        <input  type="text" class="form-control @error('doc_name') is-invalid @enderror" name="doc_name" value="{{ old('doc_name') }}" required autocomplete="doc_name" autofocus>
                                        @error('doc_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Price(₱)') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="doc_price" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Requisit Name</th>
                                        <th>Add Requirement</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requirements as $requirement)
                                        <tr>
                                            <th scope="row">{{$requirement->id}}</th>
                                            <td>{{$requirement->doc_description}}</td>
                                            <td>
                                                <input type="checkbox" name="requirements[]" value="{{$requirement->id}}">
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add Document') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
