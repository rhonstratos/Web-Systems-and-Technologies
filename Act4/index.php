<!-- 
    main repo
    https://github.com/rhonstratos/Web-Systems-and-Technologies
-->
<?php 
    include './config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-dark py-lg-5">
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container position-absolute top-0 end-0 p-3">
            <div class="toast bg-info" role="alert" aria-live="assertive" aria-atomic="true" id="perma">
                <div class="toast-header">
                    <img src="./icons/woggy_imIn.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">Permanent Student</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-white text-center fs-6">
                    A permanent student will always exist even if deleted!
                </div>
            </div>
            <div class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true" id="goodToast">
                <div class="toast-header">
                    <img src="./icons/woggy_like.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">Database</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-white text-center fs-6">
                    Database successfully created!
                </div>
            </div>
            <div class="toast bg-secondary" role="alert" aria-live="assertive" aria-atomic="true" id="goodToast1">
                <div class="toast-header">
                    <img src="./icons/woggy_naruhodo.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">Database</strong>
                    <small class="text-muted">2 seconds ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-center text-white fs-6">
                    Heads up! generating new database!
                </div>
            </div>
        </div>
    </div>
    <div class="container col-lg-6">
        <div class="border border-5 border-primary rounded-3 my-5 p-4 bg-light text-center">
            <h1 class="display-1">Student Management Dashboard</h1>
            <div class="cointainer d-grid gap-2 col-8 mx-auto my-5">
                <a href="./create.php" class="btn btn-primary btn-sm fs-2" type="button">
                    Register New Student</a>
                <a href="./read.php" class="btn btn-primary btn-sm fs-2" type="button">
                    Display All Students</a>
                <a href="./reset.php" class="btn btn-primary btn-sm fs-2" type="button">
                    Reset Database</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        var option = {
            animation: true,
            autohide: true,
            delay: 3000
        };
        var toastLiveExample = document.getElementById('goodToast');
        var toastLiveExample1 = document.getElementById('goodToast1');
        var perm = document.getElementById('perma');
        var toasty = new bootstrap.Toast(toastLiveExample,option);
        var toasty1 = new bootstrap.Toast(toastLiveExample1,option);
        var perma = new bootstrap.Toast(perm,option);
        toasty.show();
        toasty1.show();
        perma.show();
    </script>
</body>
</html>