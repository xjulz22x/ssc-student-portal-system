
@extends('layouts.student')

@section('content')

<section>
        <div class="main">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible w-4/5 m-auto mt-10 p-10">
                    <p class="">
                        {{ session('message') }}
                    </p>
                </div>
            @endif
            <div class="row sidebar">
            @include('layouts.partials.side-bar')
                <!--end of side-->
                <div class="col-xl-8 col-md-8 col-sm-8">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-file"></i> {{ __('LIST OF REQUESTED DOCUMENTS') }}</div>
                            <div class="card-body">
                            <table class="table">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Requested Document</th>
                                        <th>Date Requested</th>
                                        <th>Actions</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                
                                    <tr>
                                        <td>{{$user->full_name}}</td>
                                        <td>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Documents List</option>

                                                @foreach ($user->documents as $docs)
                                                    <option value="{{$docs->id}}" disabled>{{$docs->document_name}}</option>
                                                @endforeach

                                              </select>
                                        </td>
                                        <td>{{$user->created_at}}</td>
                                        <td><a href="{{route('request.edit', $user->id)}}"><button class="btn btn-success" type=""><i class="far fa-check-square"></i> Done</button></a></td>
                                        <td><form action="{{route('request.delete', $user->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash" onclick="deleteConfirmation({{$user->id}})"></i> Delete</button>

                                            </form></td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
