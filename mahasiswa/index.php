
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- general meta tags -->
  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- site specific tags -->
  <title></title>
  <!-- style sheets -->
  <link rel="stylesheet" href="css-reset.css">
  <link rel="stylesheet" href="bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <!-- javascript files -->
  <script src=".js"></script>
</head>
<body>
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" class="form-control form-control-lg" name="username" />
                    <label class="form-label" for="form2Example17">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Login">
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? 
                  <a href="register.php"style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>
                <?php 
                session_start();
                include('db.php');
                
                if (isset($_POST["submit"])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      if ($username != "" && $password != "") {
         $ambiladmin = mysqli_query($conn, "SELECT * FROM admin WHERE user_admin = '$username' AND pass_admin = '$password'");
         $ambilkepalalab = mysqli_query($conn, "SELECT * FROM kepala_lab WHERE username = '$username' AND password = '$password'");
         $ambilmahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE username = '$username' AND password = '$password'");
         $akunyangcocok = $ambiladmin->num_rows;
         $akunyangcocok2 = $ambilkepalalab->num_rows;
         $akunyangcocok3 = $ambilmahasiswa->num_rows;
         if ($akunyangcocok == 1) {
            $akunadmin = $ambiladmin->fetch_assoc();
            $_SESSION["admin"] = $akunadmin;
            echo "<script>window.location='admin/index.php';</script>";
         } elseif ($akunyangcocok2 == 1) {
            $akunkepalalab = $ambilkepalalab->fetch_assoc();
            $_SESSION["kepalalab"] = $akunkepalalab;
            echo "<script>window.location='kepalalab/index.php';</script>";
         }
            elseif ($akunyangcocok3 == 1) {
                $akunmahasiswa = $ambilmahasiswa->fetch_assoc();
                $_SESSION["mahasiswa"] = $akunmahasiswa;
                echo "<script>window.location='mahasiswa/index.php';</script>";
         } else {
   ?>

            <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 3px;"> tidak dapat login, Email atau password salah
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
   <?php
         }
      }
   }
   ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="bootstrap/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
