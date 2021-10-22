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
        <h1 class="text-center">Update Selected Details.</h1><br>
        <form class="form-group row" action="/updatedetails" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$details->id}}">
            <div class="col-6">
                <label for="fname">First Name :- </label><br>
                <input type="text" name="fname" class="form-control" value={{$details->first_name}}>
            </div>
            <div class="col-6">
                <label for="fname">Last Name :- </label><br>
                <input type="text" name="lname" class="form-control" value={{$details->last_name}}>
                <br>
            </div>

            <div class="col-6">
                <label for="fname">Email Address :- </label><br>
                <input type="text" name="email" class="form-control" value={{$details->email_address}}>
            </div>
            <div class="col-6">
                <label for="fname">Mobile Number :- </label><br>
                <input type="text" name="mobile_number" class="form-control" value={{$details->mobile_number}}>
                <br>
            </div>

            <div class="col-6">
                <label for="pname">Product Name</label><br>
                <select class="form-control" name="pname">
                    @if($details->product_name == "Windows 10")
                        <option selected>Windows 10</option>
                        <option>Windows 11</option>
                        <option>Microsoft Office 365</option>
                        <option>Microsoft Office Normal</option>
                        <option>Microsoft Account</option>
                    @elseif($details->product_name == "Windows 11")
                        <option selected>Windows 11</option>
                        <option>Windows 10</option>
                        <option>Microsoft Office 365</option>
                        <option>Microsoft Office Normal</option>
                        <option>Microsoft Account</option>
                    @elseif($details->product_name == "Microsoft Office 365")
                        <option selected>Microsoft Office 365</option>
                        <option>Windows 11</option>
                        <option>Windows 10</option>
                        <option>Microsoft Office Normal</option>
                        <option>Microsoft Account</option>
                    @elseif($details->product_name == "Microsoft Office Normal")
                        <option selected>Microsoft Office Normal</option>
                        <option>Microsoft Office 365</option>
                        <option>Windows 11</option>
                        <option>Windows 10</option>
                        <option>Microsoft Account</option>
                    @else
                        <option>Microsoft Office 365</option>
                        <option>Windows 11</option>
                        <option>Windows 10</option>
                        <option>Microsoft Office Normal</option>
                        <option selected>Microsoft Account</option>
                    @endif

                </select>
            </div>
            <div class="col-6">
                <label for="pcat">Product Category</label><br>
                <select class="form-control" name="pcat">
                    @if($details->category == "Microsoft Office")
                        <option selected>Microsoft Office</option>
                        <option>Microsoft Windows</option>
                    @else
                        <option selected>Microsoft Windows</option>
                        <option>Microsoft Office</option>
                    @endif
                </select>
                <br>
            </div>

            <div class="col-6">
                <label for="key">Microsoft Key :- </label>
                <input type="text" name="key" class="form-control" value={{$details->ms_key}}>
                <br>
            </div>

            <div class="col-12 text-center">
                <input type="submit" name="submit" value="Update Custormer Details" class="btn btn-primary col-3">
                <input type="submit" name="clear" value="Cancle" class="btn btn-warning col-2">
            </div>

        </form>
    </div>
</body>
</html>