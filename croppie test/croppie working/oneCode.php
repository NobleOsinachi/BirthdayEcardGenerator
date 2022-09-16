	<html lang="en">

	<head>
		<title>PHP - jquery ajax crop image before upload using croppie plugins</title>

		<script src="/lib/jquery.js"></script>
		<script src="/lib/croppie.js"></script>
		<link rel="stylesheet" href="/lib/bootstrap.css">
		<link rel="stylesheet" href="/lib/croppie.css">
		
	</head>

	<body>
		<div class="container">

			<div id="whatIsMyName" class=""></div>
			<br>
			<br>
			<br>
			personal: <input id="personal" class="form form-control" type="text" width="300" height="300">
			<button onclick="crop('personal');let name='personal';">Upload Personal Photo</button>

			<a id="viewPersonal" target="_blank" href="">View Personal Photo</a>
			<br>
			family: <input id="family" class="form form-control" type="text" width="300" height="300">
			<button onclick="crop('family');let name='family';">Upload Family Photo</button>
			<a id="viewFamily" target="_blank" href="">View Family Photo</a>



			<div style="height: 700px;" id="upload-demo"></div>

			<input type="file" id="upload" style="visibility: hidden;">
			<button class="btn btn-success upload-result">Upload Image</button>
		</div>
		<div class="col-md-4">
			<center>
				<div id="upload-demo-i"></div>
			</center>
		</div>


		<script type="text/javascript">
			let setName = document.getElementById("whatIsMyName");

			let crop = function(name) {
				setName.className = name;
				console.log(name);

				$("#upload").click();

				// return name;
			}


			$uploadCrop = $('#upload-demo').croppie({
				enableExif: true,
				viewport: {
					width: 550,
					height: 550,
					type: 'circle'
				},
				boundary: {
					width: 600,
					height: 600
				}
			});


			$('#upload').on('change', function() {
				var reader = new FileReader();
				reader.onload = function(e) {
					$uploadCrop.croppie('bind', {
						url: e.target.result
					}).then(function() {
						console.log('jQuery bind complete');
					});

				}
				reader.readAsDataURL(this.files[0]);
			});


			$('.upload-result').on('click', function(ev) {

				console.log(ev);


				$uploadCrop.croppie('result', {
					type: 'canvas',
					size: 'viewport'
				}).then(function(resp) {


					$.ajax({
						url: "/ajaxpro.php",
						type: "POST",
						data: {
							"image": resp
						},
						success: function(data) {
							html = '<img src="' + resp + '" />';
							$("#upload-demo-i").html(html);

							let getName = document.getElementById("whatIsMyName").className;
							document.getElementById(getName).value = resp; // "wahala";
							alert(getName + " photo uploaded");
						}
					});
				});

			});
		</script>




	</body>

	</html>