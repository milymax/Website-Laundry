<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<title></title>
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Login Laundry</h2>
        <div class="text-center mb-5 text-dark">Silahkan Login Terlebih Dahulu</div>
        <div class="card my-5">

            <form action="proses_login.php" method="post" enctype="multipart/form-data" class="card-body cardbody-color p-lg-5">

            <div class="text-center">
              <img src="/Laundry/foto/laundry_login.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" name="username" aria-describedby="emailHelp"
                placeholder="Username">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
              Registered? <a href="#" class="text-dark fw-bold"> Create an Account</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<div class="col-md"></div>
</div>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
crossorigin="anonymous"></script>
</body>
</html>