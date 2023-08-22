@extends('layouts.student')

@section('content')


<section>
        <div class="container-fluid">
            <div class="row sidebar">
            @include('layouts.partials.side-bar')
                <!--end of side-->
                <div class="col-xl-8 col-md-7 col-sm-6">
                    <div class="admin-side-container">
                        <h1 class="text-center">
                            List of Requested Document
                        </h1>
                        <div class="table-container">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Request ID</th>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Requested Document</th>
                                        <th>Total Price</th>
                                        <th>Date Requested</th>
                                        <th>Released</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>12-2121</td>
                                        <td>Raven Alvarez</td>
                                        <td>TOR</td>
                                        <td>100.00</td>
                                        <td>Jul 9, 2021</td>
                                        <td>Released</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
