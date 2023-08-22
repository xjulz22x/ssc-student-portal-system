@extends('layouts.student')

@section('content')

<section>
        <div class="main">
            <div class="row sidebar">
            @include('layouts.partials.side-bar')
                <!--end of side-->
                <div class="col-xl-8 col-md-8 col-sm-8">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-users"></i> {{ __(' LIST OF STAFFS') }}</div>
                            <div class="card-body">
                            <table class="table">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Last Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staffs as $staff)
                                    <tr>
                                        <th scope="row">{{$staff->first_name}}</th>
                                        <td>{{$staff->middle_name}}</td>
                                        <td>{{$staff->last_name}}</td>
                                        <td><button class="btn btn-danger deleteUser" data-userid="{{$staff->id}}">Delete</button></td>  
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
</div>
</section>
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to Delete this Staff?</h6>
                <form action="{{route('staff.delete','id')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
   $(document).on('click','.deleteUser',function(){
    var userID=$(this).attr('data-userid');
    $('#id').val(userID); 
    $('#DeleteModal').modal('show');
    });

    $(document).on('click','.cancel', function(){
        $('#DeleteModal').modal('hide');
    });
</script>
@endsection