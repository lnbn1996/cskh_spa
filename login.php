<!-- DOCTYPE html-->
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Give a proper title to your web page -->
<title>Login Page</title>
<meta charset="utf-8">
<!-- Viewport Meta Tag --> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS Link-->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/custom-styles.css" />
</head>
<body>

<!-- Main Container Starts -->
      <div class="container-fluid">
<!-- Bootstrap grid row starts -->
        <div class="row align-items-center form-wrapper">
<!-- Left light-dark-bg section Starts -->
            <div class="col-md-6 col-sm-12 left-box">
              <div class="col-lg-12">
                <h1>Page Login For Manager</h1>
              </div>
            </div>
<!-- Left light-dark-bg section Ends -->

<!-- Right dark-bg section Starts -->
            <div class="col-md-6 col-sm-12 form-box">
              <div class="col-lg-12">
                <h2>Login</h2>
<!-- Login Form Starts -->
                <form class="login-form mt-1 needs-validation" novalidate>
                  <div class="form-group">
                    <input type="text" name="username" placeholder="Enter your username" class="form-control input-lg" required="">
                    <div class="invalid-feedback">
                      Please enter your username!
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" placeholder="Enter your password" class="form-control input-lg" required="">
                    <div class="invalid-feedback">
                      Please enter your password!
                    </div>
                  </div>
                  <div class="custom-control custom-checkbox mt-3 mb-3">
                    <input type="checkbox" class="custom-control-input" id="customControlInline" checked="">
                    <label class="custom-control-label" for="customControlInline">
                      Remember me</label>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">Sign in</button>
                  </div>
                </form>
<!-- Login Form Ends -->
              </div>

            </div>
<!-- Right dark-bg section Ends -->
        </div>
<!-- Bootstrap grid row Ends -->
      </div>
<!-- Main Container Ends -->


<!-- To load page faster, place javascript links to the bottom of webpage -->
<script>
// JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<!-- jQuery library Link-->
<script src="assets/js/jquery-3.1.min.js"></script>
<!-- Popper JS Link -->
<script src="assets/js/popper.min.js"></script>
<!-- Latest Compiled and Minified Bootstrap JavaScript CDN Link -->
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>