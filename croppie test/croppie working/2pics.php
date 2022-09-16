<html lang="en">

<head>
	<title>PHP - jquery ajax crop image before upload using croppie plugins</title>


	<script src="/lib/jquery.js"></script>
	<script src="/lib/croppie.js"></script>
	<!-- <link rel="stylesheet" href="/lib/bootstrap.css"> -->
	<link rel="stylesheet" href="/lib/croppie.css">
</head>

<body>
	<div class="container">

		<a href="#personal">Upload Personal Pic</a>
		personal: <input id="personal" class="form form-control" type="text" width="300" height="300" value=""> <br>
		<div>

			<div id="upload-personal"></div>
			<strong>Select Personal Image:</strong>
			<br />
			<input type="file" id="uploadPersonal">
			<br />
			<button class="btn btn-success upload-result">Upload Image</button>


		</div>


		family: <input id="family" class="form form-control" type="text" width="300" height="300" value="">
		<a href="#family">Upload Family Pic</a>

		<div>

			<div id="upload-family"></div>
			<strong>Select Family Image:</strong>
			<br />
			<input type="file" id="uploadFamily">
			<br />
			<button class="btn btn-success upload-result">Upload Image</button>


		</div>




		<!--  -->

	</div>
	<div class="col-md-4">
		<div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
	</div>
	</div>


	</div>
	</div>
	</div>


	<script type="text/javascript">
		let personal = document.getElementById("personal"); // "wahala";
		let family = document.getElementById("family"); // "wahala";



		let personalPic = document.getElementById("personalPic"); // "wahala";
		let familyPic = document.getElementById("familyPic"); // "wahala";



		$personalCrop = $('#upload-personal').croppie({
			enableExif: true,
			viewport: {
				width: 550,
				height: 550,
				type: 'circle'
			},
			boundary: {
				width: 600,
				height: 600
				//,type: 'circle'
			}
		});



		$familyCrop = $('#upload-family').croppie({
			enableExif: true,
			viewport: {
				width: 550,
				height: 550,
				type: 'circle'
			},
			boundary: {
				width: 600,
				height: 600
				//,type: 'circle'
			}
		});



		$('#uploadPersonal #uploadFamily').on('change', function() {
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


		function uploader(type) {

			switch (type) {
				case 'personal':

					console.log("");
					break;
				case 'personal':
					console.log("");
					break;
				default:
					console.log("wahala dey");
					break;

			}



		}



		$('.upload-result').on('click', function(ev) {
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

						personal.value = resp; // "wahala";
					}
				});
			});
		});
	</script>


</body>

</html>