<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>My Portfolio Contact</title>
</head>
<body style="height: 100%;">
    <div class="card text-white py-5" style="height:100%; background-color: black;">
        <div class="container my-auto">
            <h1 class="text-center mb-5">My Portfolio JRA</h1>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-5">
                    <p class="card-text text-center">
                        <strong>Name: </strong> {{$data->name}}
                    </p>
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 mb-5">
                    <p class="card-text text-center">
                        <strong>Email: </strong> {{$data->email}}
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                    <strong class="text-center">Message: </strong> 
                    <p class="card-text">
                        {{$data->message}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>