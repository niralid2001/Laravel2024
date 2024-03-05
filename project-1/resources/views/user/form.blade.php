<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Form</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <form  action="user-create" method="POST">
                @csrf 
                <div class="row text-center">
                    <h1>User Detail</h1><br><br><br>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">  
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="email" id="email" placeholder="email Address">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number">  
                    </div>
                    <div class="col-md-6">
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="city" placeholder="City">  
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="pincode" placeholder="Pin Code">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="state" placeholder="State">  
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="country" placeholder="Country">
                    </div>
                </div><br>
                <div class="row text-center">
                    <h1>Educational Details</h1><br><br><br>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="program" placeholder="Program">  
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="batch" placeholder="Batch">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="passing_year" placeholder="Passing Year">  
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="university" placeholder="University">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>