<div class="col-xl-4 col-md-4 col-sm-4">
    <div class="card">
        <div class="card-header"> {{ __(' Sorsogon State University - Bulan Campus ') }}<i class="fas fa-map-marker-alt"></i></div>
        <div class="card-body">
            <div class="admin-inner-container">
                <div class="admin-list">
                    <ul>
                        <li>
                        <a href="{{route('requestlist')}}"><i class="far fa-list-alt"></i> Request List</a>
                        </li>
                        <li>
                            <a href="{{route('admin.add')}}"><i class="fas fa-user-check"></i> Add Staff</a>
                        </li>
                        <li>
                            <a href="{{route('student.add')}}"><i class="fas fa-user-plus"></i> Add Student</a>
                        </li>
                        <li>
                            <a href="{{route('studentlist')}}"><i class="fas fa-users"></i> Student List</a>
                        </li>
                        <li>
                            <a href="{{route('stafflist')}}"><i class="fas fa-users"></i> Staff List</a>
                        </li>
                        <li>
                            <a href="{{route('document.create')}}"><i class="fas fa-folder-plus"></i> Add Document</a>
                        </li>
                        <li>
                            <a href="{{route('document.list')}}"><i class="fas fa-copy"></i> List of Documents</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
