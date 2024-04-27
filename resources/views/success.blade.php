<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}" />
</head>
<body>
    
<section class="success">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="success-inner">
                    <p>
                        <span style="color:#02c;">Success!</span><br>    
                        Thanks for submitting your information. Within 30 minutes you will receive an email automatically.<br>
                        <a href="{{route('home')}}" class="btn btn-info">Back to home</a>
                    </p>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>


















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>