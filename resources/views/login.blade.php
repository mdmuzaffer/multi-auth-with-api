
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <main>
    <section id="log-in" class="log-in">
      <div class="log-in-main">
        <div class="container-fluid">
          <div class="row log-h">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 bg-log d-flex align-items-center">
              <div class="log-in-logo d-flex justify-content-center">
                <img class="w-50" src="{{ asset('admin/assets/img/dhaam-logo.png')}}">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
              <div class="log-in-fields shadow  rounded w-50 relative mx-auto">
                <div class="leaf-img">
                  <img class="w-50" src="{{ asset('admin/assets/img/leaf.png')}}">
                </div>
                  <div class="log-in-heading">
                    <h4 class="fw-bold log">Login as a Admin User</h4>

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                            <p style="color:red;">{{ $error }}</p>
                            @endforeach
                        @endif

                        @if(Session::has('error'))
                            <p style="color:red;">{{ Session::get('error') }}</p>
                        @endif

                  </div>
                  <div class="form-fields">

                    <form action="{{ route('login') }}" method="POST" class="was-validated">
                        @csrf
                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Email</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="email"
                          required>
                      </div>
                      <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password"
                          required>
                      </div>
                      <div class="submit-btn d-flex justify-content-center mb-2">
                        <button type="submit" class=" btn-primary log-btn w-50 rounded">Submit</button>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

</body>

</html>

