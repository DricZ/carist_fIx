

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">
	<link rel="icon" href="favicon.ico">

	<title>BlastMe Admin Page | Log in</title>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<main class="main h-100 w-100">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
                                        <!-- Gambar login -->
										<img src="assets/test.png" alt="Telin" class="img-fluid" width="432" height="432" />
									</div>
									<form action="lib/Login.php" method="POST">
										<input type="hidden" id="tz" name="tz"/>
										<div class="form-group">
											<input type="hidden" id="jck" name="jck" value="7991507e167a7cc5583d0caefc2d89d5e30f1700"/>
										</div>
										<div class="form-group">
											<label>Username</label>
											<input class="form-control form-control-lg" type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off"/>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input class="form-control form-control-lg" type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off"/>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-primary" id="btnSignIn" name="btnSignIn">Sign in</button>
										</div>
										
									</form>
								</div>
							</div>
						</div>

						<div class="row text-center justify-content-center align-self-center align-items-end">
								Provided  By &nbsp;<a href="http://www.neuapix.com">
                                    <!-- Image bawah -->
                                <img src="assets/test.png" alt="NeuAPIX" class="img-fluid" width="100" height="40"/></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script>
		$(document).ready(function(){
			$('#tz').val(Intl.DateTimeFormat().resolvedOptions().timeZone);
			console.log($('#tz').val());
		})

		// console.log(Intl.DateTimeFormat().resolvedOptions().timeZone);
		// var offset = new Date().getTimezoneOffset();
		// console.log(offset);
		// var baliTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Makassar"});
		// baliTime = new Date(baliTime);
		// console.log('Bali time: ' + baliTime.toLocaleString());
		//
		// var yyyy = baliTime.getFullYear();
		//
		// var mm = baliTime.getMonth() + 1;
		// if (mm < 10) {
		// 	mm = '0' + mm;
		// }
		//
		// var dd = baliTime.getDate();
		// if (dd < 10) {
		// 	dd = '0' + dd;
		// }
		//
		// var HH = baliTime.getHours();
		// if (HH < 10) {
		// 	HH = '0' + HH;
		// }
		//
		// var ii = baliTime.getMinutes();
		// if (ii < 10) {
		// 	ii = '0' + ii;
		// }
		//
		// var ss = baliTime.getSeconds();
		// if (ss < 10) {
		// 	ss = '0' + ss;
		// }
		//
		// formattedBaliTime = yyyy + "-" + mm + "-" + dd + " " + HH + ":" + ii + ":" + ss;
		//
		// console.log("Formatted bali time: " + formattedBaliTime);
	</script>

	<script src="js/app.js"></script>

	<svg width="0" height="0" style="position:absolute">
    <defs>
      <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong"><path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z"></path></symbol>
    </defs>
  </svg>
</body>
</html>
