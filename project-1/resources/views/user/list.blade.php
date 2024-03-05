<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User List</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row text-center">
            <h1>User Detail</h1><br><br><br>
        </div>
        <div class="row ">
        <form  action="user-list" method="get">
            <input type="text" class="form-control" name="search" placeholder="Search" style="width: 200px;">
            <input type="submit" class="btn btn-primary" value="search">
        </form>
        </div><br>
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Program</th>
                        <th>Batch</th>
                        <th>Passing Year</th>
                        <th>University</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->userDetail->phone}}</td>
                        <td>{{$data->userDetail->address}}</td>
                        <td>{{$data->userDetail->city}}</td>
                        <td>{{$data->userDetail->pincode}}</td>
                        <td>{{$data->userDetail->state}}</td>
                        <td>{{$data->userDetail->country}}</td>
                        <td>{{$data->educationalDetail->program}}</td>
                        <td>{{$data->educationalDetail->batch}}</td>
                        <td>{{$data->educationalDetail->passing_year}}</td>
                        <td>{{$data->educationalDetail->university}}</td>
                    </tr>
                    @empty
                        <p>No users found</p>
                    @endforelse
                </tbody>
            </table>
             {{ $user->links('pagination::bootstrap-5') }}  
        </div>
    </div>
</body>
</html>