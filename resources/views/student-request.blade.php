@extends('layouts.student')

@section('content')
<div class="container">
    

<div class="card">
    <div class="card-header"><i class="fas fa-align-left"></i> {{ __('STUDENT REQUEST FORM') }}</div>
        <div class="card-body">
            <form action="{{route('request.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            
                    <fieldset>
                        <div class="form-group  mb-3">
                            
                            {{-- <input type="text" class="form-control" value="Transcript of Record" name="name_request"> --}}
                         
                            <select class="form-control" aria-label="Default select example" name="name_request">
                                <option selected>Please select your document here</option>
                                <option value="TRANSCRIPT OF RECORDS (TOR)">TRANSCRIPT OF RECORDS (TOR)</option>
                                <option value="RECONSTRUCTED OF DIPLOMA">RECONSTRUCTED OF DIPLOMA</option>
                                <option value="CERTIFICATE OF GRADUATION">CERTIFICATE OF GRADUATION</option>
                                <option value="FORM 137 (high school)">FORM 137 (high school)</option>
                                <option value="CERTIFICATE OF GRADE (COG)">CERTIFICATE OF GRADE (COG)</option>
                                <option value="CERTICATE OF GENERAL WEIGHTED AVERAGE (GWA)">CERTICATE OF GENERAL WEIGHTED AVERAGE (GWA)</option>
                                <option value="CERTIFICATE OF EVALUATION OF GRADE">CERTIFICATE OF EVALUATION OF GRADE</option>
                                <option value="CERTIFICATE OF GOOD MORAL CHARACTER (GMC)">CERTIFICATE OF GOOD MORAL CHARACTER (GMC)</option>
                                <option value="CERTIFICATE OF CROSS–ENROLLMENT">CERTIFICATE OF CROSS–ENROLLMENT</option>
                                <option value="CERTIFICATE OF HONOR AWARDED">CERTIFICATE OF HONOR AWARDED</option>
                            </select>
                        </div>
                    </fieldset>
                    
                    <div class="input-group mb-3">
                        
                        <input type="text" class="form-control" placeholder="First Name" aria-label="" aria-describedby="button-addon2" name="first_name" value="{{ Auth::user()->first_name }}" >
                    </div>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{ Auth::user()->middle_name }}" >
                    </div>
                    <div class="input-group mb-3"><input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ Auth::user()->last_name }}" >
                    </div>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Student Number" name="student_number" value="{{ Auth::user()->student_id }}" >
                    </div>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Purpose of Request" name="purpose">
                    </div>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="How many copy do you want?" name="qty_copy">
                    </div>

                    <div class="input-group mb-3">
                        <p style="padding-right: 5px; font-size: mideum; font-weight:bold">Warning: </h5>
                        <p>
                            This request has a three working days. Thank you very much.
                        </p>
                    </div>
                    <div class="footer">
                        <a href="/student-profile"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Back</button></a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Send Request</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection