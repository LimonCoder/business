<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo base_url();?>"/>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <style type="text/css">
    .contain {
      margin: 0 auto;
      background: #ccc5c5;
    }
  </style>

</head>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0  my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-6 contain">

                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold; font-size: 30px">Welcome !</h1>
                  </div>
					<div class="alert alert-success alert-dismissible succesalert" style="display: none" role="alert">
						<strong>Success !</strong> Login Successfully
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
                  <form class="login_form" id="login_form" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="user_name" name="user_name" aria-describedby="emailHelp" placeholder="User Name : " required>
						<span id="error" style="color: red; margin-left: 5px;display: none">These credentials do not match our records.</span>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit"  class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>


  <script type="text/javascript">
    
    $(document).ready(function () {



		$(document).on("submit","#login_form",function (event) {
			event.preventDefault();

			$.ajax({
				url:'login/can_login',
				type:'post',
				data:$(this).serializeArray(),
				// dataType:'json',
				success:function (result) {
					if (result == 1){
                        $("#error").hide();
                        $(".succesalert").show('fade');
					    setTimeout(function () {
                            $(".succesalert").hide('fade');
                            window.open("Admin","_self");
                        },1700);

					}else {
						$("#error").show();
					}
                }
			})
        })
    })
    
  </script>

</body>

</html>
