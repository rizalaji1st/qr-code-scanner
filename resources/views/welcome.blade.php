<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qr Code Scanner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-secondary">
    <div class="row m-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">QR Code Scanner</h1>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="text-center">Preview video</h3>
                    </div>
                    <div class="card-body">
                        <video id="preview" style="width: 100%"></video>
                    </div>
                    <div class="card-footer">
                        <label for="text">Hasil Scan</label>
                        <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0 ){
                scanner.start(cameras[0]);
            } else{
                alert('No cameras found');
            }

        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan',function(c){
            document.getElementById('text').value=c;
            swal({
                title: "QR Code : "+c,
                icon: "success",
            });
        });

     </script>
</body>
</html>