@extends('layouts.student')

@section('content')
  <div class="container">
            {{-- @if(session('message'))
                <div class="alert alert-success alert-dismissible w-4/5 m-auto mt-10 p-10">
                    <p class="">
                        <i class="fas fa-check-square"></i> {{ session('message') }}
                    </p>
                </div>
            @elseif (session('error-message'))
            <div class="alert alert-danger alert-dismissible w-4/5 m-auto mt-10 p-10">
                <p class="">
                    <i class="fas fa-check-square"></i> {{ session('error-message') }}
                </p>
            </div>
            @endif --}}

            <div class="card">
                <div class="card-header"><i class="fas fa-clipboard"></i> {{ __('STUDENT DASHBOARD') }}</div>
                    <div class="card-body">
                        <h6 class="card-title"><i class="fas fa-list-alt"></i> STUDENT REQUEST STATUS</h6>
                        <p class="card-text"> <i class="fas fa-file-signature"></i><small class="text-muted"> Name:</small> {{ Auth::user()->full_name }} </p>
                        <p class="card-text"><i class="fas fa-info-circle"></i><small class="text-muted"> Request Status: </small>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Done</option>
                                        @foreach ($user->documents as $docs)
                                            @if ($docs->pivot->status == 1)
                                                <option value="{{$docs->id}}" disabled>{{$docs->document_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Pending</option>
                                        @foreach ($user->documents as $docs)
                                        @if ($docs->pivot->status == 0)
                                                <option value="{{$docs->id}}" disabled>{{$docs->document_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        {{-- <p class="card-text mt-2"><i class="fas fa-money-bill-wave-alt"></i><small class="text-muted"> Payment: </small></p> --}}
                    </div>
                </div>
            <section>

                <div class="card">
                    <form action="{{route('request.document')}}" method="POST">
                       @csrf
                        <div class="row">
                            <!--TOR-->
                                @foreach($documents as $document)
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="request-container">
                                        <div class="request-title">
                                            <h3>{{$document->document_name}}</h3>
                                        </div>
                                        <div class="request-requirement">
                                            <ul>
                                                @foreach($document->requirements as $req)
                                                <li>{{$req->doc_description}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="request-button">

                                            <p><b>Price:</b> {{$document->price}}</p>
                                            <label for="">TOGGLE TO ADD</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="documents[]" value="{{$document->id}}">
                                                @error('documents')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- <input type="checkbox" name="documents[]" value="{{$document->id}}"> --}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-3 my-4">
                                <button type="submit" class="btn btn-danger btn-block">Submit Request</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </section>

</div>
@endsection
