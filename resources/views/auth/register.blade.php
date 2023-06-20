<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
   
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img6.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>
              

              @if(Session::has('error'))
                    <p class="text-danger">{{ session::get('error') }}</p>
                @endif

                @if(Session::has('success'))
                  <div class="alert alert-success alert-block" role="alert">
                  {{ Session::get('success') }}
                  </div>
                @endif

            <form action="{{ route('register') }}" method="post">

                @csrf

                @method('post')
                <div class="form-outline mb-4">
                  <input type="text" name="name" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>

                        @if($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif

                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>

                    @if($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif

                

                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>

                    @if($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif

                </div>

                <!-- <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Comform your password</label>

                </div> -->

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                <button class="btn btn-outline-dark btn-lg px-5" type="submit">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    

    
</body>
</html>