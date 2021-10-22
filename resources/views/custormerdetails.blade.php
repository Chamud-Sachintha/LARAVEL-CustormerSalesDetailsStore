<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        @foreach($errors->all() as $error)

            <div class="alert alert-danger" role="alert">{{$error}}</div>

        @endforeach
        <h1 class="text-center">Custormer Product Details.</h1><br>
        <form class="form-group row" action="\savedetails" method="post">
            {{csrf_field()}}
            <div class="col-6">
                <label for="fname">First Name :- </label><br>
                <input type="text" name="fname" placeholder="Amal Perera" class="form-control">
            </div>
            <div class="col-6">
                <label for="fname">Last Name :- </label><br>
                <input type="text" name="lname" placeholder="Amal Perera" class="form-control">
                <br>
            </div>
            
            <div class="col-6">
                <label for="fname">Email Address :- </label><br>
                <input type="text" name="email" placeholder="Amal Perera" class="form-control">
            </div>
            <div class="col-6">
                <label for="fname">Mobile Number :- </label><br>
                <input type="text" name="mobile_number" placeholder="Amal Perera" class="form-control">
                <br>
            </div>

            <div class="col-6">
                <label for="pname">Product Name</label><br>
                <select class="form-control" name="pname">
                    <option>Windows 10</option>
                    <option>Windows 11</option>
                    <option>Microsoft Office 365</option>
                    <option>Microsoft Office Normal</option>
                    <option>Microsoft Account</option>
                </select>
            </div>
            <div class="col-6">
                <label for="pcat">Product Category</label><br>
                    <select class="form-control" name="pcat">
                        <option>Microsoft Office</option>
                        <option>Microsoft Windows</option>
                    </select>
                    <br>
            </div>

            <div class="col-6">
                <label for="key">Microsoft Key :- </label>
                <input type="text" name="key" placeholder="1234-1234-1234-12234-123234" class="form-control">
                <br>
            </div>

            <div class="col-12 text-center">
                <input type="submit" name="submit" value="Save Custormer Details" class="btn btn-primary col-2">
                <input type="reset" name="clear" value="Clear Feilds" class="btn btn-warning col-2">
            </div>
        </form>
        <br>

        <h3>You Can Filter Data Using Follwing Crieterias.</h3><br>

        <form class="form-group row" action="/filterdata" method="post">
            {{csrf_field()}}
            <div class="col-6">
                <label for="byemail">Email Address :- </label><br>
                <input type="text" name="byemail" placeholder="abc@gmail.com" class="form-control">
            </div>
            <div class="col-6">
                <label for="bymobile">Mobile Number :- </label><br>
                <input type="text" name="bymobile" placeholder="+94 77 4533221" class="form-control">
                <br>
            </div>

            <div class="col-6">
                <label for="bypname">Product Name</label><br>
                <select class="form-control" name="bypname">
                    <option selected></option>
                    <option>Windows 10</option>
                    <option>Windows 11</option>
                    <option>Microsoft Office 365</option>
                    <option>Microsoft Office Normal</option>
                    <option>Microsoft Account</option>
                </select>
            </div>
            <div class="col-6">
                <label for="bypcat">Product Category</label><br>
                    <select class="form-control" name="bypcat">
                        <option selected></option>
                        <option>Microsoft Office</option>
                        <option>Microsoft Windows</option>
                    </select>
                    <br>
            </div>

            <div class="col-12 text-center">
                <input type="submit" name="submit" value="Filter Custormer Details" class="btn btn-primary col-2">
                <input type="reset" name="clear" value="Clear Feilds" class="btn btn-warning col-2">
            </div>

        </form>
        <br>

        <table class="table">
            <caption>Details List.</caption>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Mobile Number</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Microsoft Key</th>
            <th>Actions</th>
            
            <?php $var = 1; ?>
            @foreach($details as $detail)
                @if($var % 2 == 0)

                    <tr class="table-primary">
                        <td>{{$detail->id}}</td>
                        <td>{{$detail->first_name}}</td>
                        <td>{{$detail->last_name}}</td>
                        <td>{{$detail->email_address}}</td>
                        <td>{{$detail->mobile_number}}</td>
                        <td>{{$detail->product_name}}</td>
                        <td>{{$detail->category}}</td>
                        <td>{{$detail->ms_key}}</td>

                        <td><a href="/updatedetail/{{$detail->id}}" class="btn btn-primary">Update</a></td>
                        <td><a href="/deletedetail/{{$detail->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>

                @else
                    <tr>
                        <td>{{$detail->id}}</td>
                        <td>{{$detail->first_name}}</td>
                        <td>{{$detail->last_name}}</td>
                        <td>{{$detail->email_address}}</td>
                        <td>{{$detail->mobile_number}}</td>
                        <td>{{$detail->product_name}}</td>
                        <td>{{$detail->category}}</td>
                        <td>{{$detail->ms_key}}</td>

                        <td><a href="/updatedetail/{{$detail->id}}" class="btn btn-primary">Update</a></td>
                        <td><a href="/deletedetail/{{$detail->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>

                @endif

                <?php $var++; ?>

            @endforeach

        </table>
    </div>
</body>
</html>