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
        <input id="imageText" class="form form-control" type="text" width="300" height="300">

        <div class="panel panel-default">
            <div class="panel-heading">Image Upload Demo</div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-4 text-center">
                        <div id="upload-demo" style="width:350px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">

                        <br>
                        <strong>Select Image:</strong>
                        <br />
                        <input type="file" id="upload">
                        <br />
                        <button class="btn btn-success upload-result">Upload Image</button>
                    </div>
                    <div class="col-md-4">
                        <div id="upload-demo-i"
                            style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <script type="text/javascript">
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 250,
            height: 250,
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
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

                    document.getElementById("imageText").value = html; // "wahala";
                }
            });
        });
    });
    </script>


</body>

</html>