<?php
    include './config.php';
    session_start();
    if(!isset($_SESSION["message"]))
        $mssg = '';
    else
        $mssg = $_SESSION["message"];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container d-flex align-items-center justify-content-center mw-100">
        <div class="border border-5 border-dark rounded-3 container m-5 p-3 bg-light mw-100">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
                <div class="container-fluid">
                    <a href="./" class="navbar-brand btn btn-primary">Dashboard</a>
                    <a href="./create.php" class="navbar-brand btn btn-primary">New Student</a>
                    <a href="./read.php" class="navbar-brand btn btn-primary">Refresh</a>
                </div>
            </nav>
            <div class="overflow-auto">
                <table class="table table-hover text-center text-uppercase fs-6">
                    <thead>
                        <tr>
                        <th scope="col">Student #</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Birthdate (Y,M,D)</th>
                        <th scope="col">Age</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mother's Name</th>
                        <th scope="col">Father's Name</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "select * from student";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo '
                        <tr>
                            <th scope="row">'.$row['id'].'</th>
                            <td>'.$row['fname'].'</td>
                            <td>'.$row['mname'].'</td>
                            <td>'.$row['lname'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['birthday'].'</td>
                            <td>'.$row['age'].'</td>
                            <td>'.$row['contactno'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>'.$row['mothersname'].'</td>
                            <td>'.$row['fathersname'].'</td>
                            <td>
                            <a type="button" href="./update.php?updateId='.$row['id'].'" class="btn btn-outline-dark">Edit</a>
                            </td>
                            <td>
                            <a type="button" href="./delete.php?deleteId='.$row['id'].'" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="position-fixed top-50 start-50 translate-middle text-white" style="z-index: 11">
        <div id="goodToast" class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-white">
                <img src="./icons/woggy_like.png" class="rounded me-2" alt="...">
                <strong class="me-auto text-black">Success</strong>
                <small class="text-black">Just now</small>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white text-center fs-4">
                <?php echo $mssg; ?>
                <div class="mt-2 pt-2 border-top text-center">
                    <button class="btn btn-primary btn-sm fs-5" data-bs-dismiss="toast" aria-label="Close">Nice</button>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed top-50 start-50 translate-middle text-white" style="z-index: 11">
        <div id="badToast" class="toast bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-white">
                <img src="./icons/woggy_stopAngry.png" class="rounded me-2" alt="...">
                <strong class="me-auto text-black">Error</strong>
                <small class="text-black">Just now</small>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white text-center fs-4">
                <?php echo $mssg; ?>
                <div class="mt-2 pt-2 border-top text-center">
                    <button class="btn btn-primary btn-sm fs-5" data-bs-dismiss="toast" aria-label="Close">Oof</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        var option = {
            animation: true,
            autohide: true,
            delay: 3000
        };
        var goodtoast = new bootstrap.Toast(
            document.getElementById('goodToast'),option)
        var badtoast = new bootstrap.Toast(
            document.getElementById('badToast'),option)
<?php
    if(isset($_SESSION['toast'])&&$_SESSION['toast']=="good")
    echo "
        goodtoast.show();
    ";
    else if (isset($_SESSION['toast'])&&$_SESSION['toast']=="bad")
    echo "
        badtoast.show();
    ";
    session_destroy();
?>
    </script>
</body>
</html>