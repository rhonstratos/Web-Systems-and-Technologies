<!-- 
    main repo
    https://github.com/rhonstratos/Web-Systems-and-Technologies
-->
<?php 
    include './config.php';
    $sql =" 
    drop database ".DB_DATABASE;
    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
    mysqli_query($con,$sql);
    //echo "database reset";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Reset</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-dark py-lg-5">
    <div class="position-fixed top-50 start-50 translate-middle text-white" style="z-index: 11">
        <div id="toast" class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-white">
                <img src="./icons/woggy_like.png" class="rounded me-2" alt="...">
                <strong class="me-auto text-black">Succcess</strong>
                <small class="text-black">Just now</small>
            </div>
            <div class="toast-body text-white text-center fs-4">
                Database successfully destroyed
                <div class="mt-2 pt-2 border-top text-center">
                    <a href="./" class="btn btn-primary btn-sm fs-5">Go back</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        var option = {
            animation: true,
            autohide: false
        };
        var toastLiveExample = document.getElementById('toast');
        var toasty = new bootstrap.Toast(toastLiveExample,option);
        toasty.show();
    </script>
</body>
</html>