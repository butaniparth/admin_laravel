
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <title>Add Record</title>
  </head>
  <body>

  @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">  
    <strong>{{ $message }}</strong>
   </div>
   @endif

   <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <div class="card mt-3">
            <h3 class="text-muted">Edit Data !!! {{ $editform->id }}</h3>
          <form action="/{{ $editform->id }}/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="form-group col-md-12">
                <label>Name :</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name',$editform->name) }}"/>


              </div>

              <div class="form-group col-md-12">
                <label>Email :</label>
                <input type="text" class="form-control" name="email" placeholder="Enter Email" id="email" value="{{ old('email',$editform->email) }}">
              </div>

              <div class="form-group col-md-12">
                <label >Mo Number :</label>
                <input type="number" class="form-control" name="number" placeholder="91+..." id="number" value="{{ old('number',$editform->number) }}">
              </div>

              <div class="form-group mb-3">
                <label for="">Country :</label>
                <input type="text" class="form-control" name="country" placeholder="Country" id="country"  value="{{ old('country',$editform->country) }}">
              </div>

              <div class="form-group mb-3">
                <label for="">State :</label>
                <input type="text" class="form-control" name="state" placeholder="State" id="state" value="{{ old('state',$editform->state) }}">
              </div>
              <div class="form-group mb-3">
                <label for="">City :</label>
                <input type="text" class="form-control" name="city" placeholder="City" id="city"  value="{{ old('city',$editform->city) }}">
              </div>


              <div class="form-group col-md-12 mt-3">
                <label>Select photo :</label>
                <input type="file" class="form-control" name="images" id="images" value="{{ old('images',$editform->images) }}">
              </div>
    
              <div class="form-group col-12 mt-3 mx-5">
                <button class="btn btn-dark" type="submit">Update</button>

                <a class="btn btn-success" href="/home">Display</a>

              </div>

          </form>
        </div>
      </div>
    </div>
  </div>

   
</body>
</html>


