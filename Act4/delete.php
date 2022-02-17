<?php
    session_start();
    include './config.php';
    $id=$_GET['deleteId'];
    $get="select * from student where id = $id";
    $getresult= mysqli_query($db,$get);
    $row=mysqli_fetch_assoc($getresult);
    if(isset($_POST['submit']) || $_SERVER['REQUEST_METHOD']=='POST'){
        $sql="
        DELETE 
        FROM
            `student`
        WHERE
            `student`.`id` = $id
        ";
        $result = mysqli_query($db,$sql);
        if($result){
            session_start();
            $_SESSION["toast"]="good";
            $_SESSION["message"]="Your student profile is now deleted!";
            header('location: read.php');
        }
        else {
            session_start();
            $_SESSION["toast"]="bad";
            $_SESSION["message"]="An error has occured while deleting!";
            header('location: read.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container d-flex align-items-center justify-content-center mw-100">
        <div class="container m-5 p-3 bg-light w-50 text-center rounded-3 border border-danger border-5">
            <h1 class="display-1 mb-5">Delete Student Profile</h1>
            <div class="container">
                <span class="display-5 text-center">Student Name</span>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">First:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['fname']; ?></p>
                    </div>
                </div>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Middle:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['mname']; ?></p>
                    </div>
                </div>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Last:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['lname']; ?></p>
                    </div>
                </div>
                <span class="display-5 text-center">Student Bio</span>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Email:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['email']; ?></p>
                    </div>
                </div>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Birthdate:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['birthday']; ?></p>
                    </div>
                </div>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Age:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['age']; ?></p>
                    </div>
                </div>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Contact #:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['contactno']; ?></p>
                    </div>
                </div>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Address:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['address']; ?></p>
                    </div>
                </div>
                <span class="display-5 text-center">Family Bio</span>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Father:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['fathersname']; ?></p>
                    </div>
                </div>
                <div class="row mx-5 mt-3 py-0 text-start d-flex align-items-center justify-content-center">
                    <div class="col-lg-3 text-end">
                        <p class="h-1 fs-4">Mother:</p>
                    </div>
                    <div class="col-lg-5 text-start">
                        <p class="h-1 fs-4 text-uppercase"><?php echo $row['mothersname']; ?></p>
                    </div>
                </div>
                <form method="post">
                    <div class="d-grid gap-2 mt-5 col-2 mx-auto my-3">
                        <a href="./read.php" class="btn btn-dark fs-3" type="button">Cancel</a>
                        <button type="submit" class="btn btn-outline-danger fs-3" id="liveToastBtn" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>