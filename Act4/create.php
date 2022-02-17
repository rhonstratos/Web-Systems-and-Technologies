<?php
    include './config.php';
    if(session_id()!='')
            session_destroy();
    if(isset($_POST['submit']) || $_SERVER['REQUEST_METHOD']=='POST'){
        $fname=mysqli_real_escape_string($db,$_POST['fname']);
        $mname=mysqli_real_escape_string($db,$_POST['mname']);
        $lname=mysqli_real_escape_string($db,$_POST['lname']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $bdate=mysqli_real_escape_string($db,$_POST['bdate']);
        $address=mysqli_real_escape_string($db,$_POST['address']);
        $cnum=mysqli_real_escape_string($db,$_POST['cnum']);
        $mothername=mysqli_real_escape_string($db,$_POST['mothername']);
        $fathername=mysqli_real_escape_string($db,$_POST['fathername']);

        $sql="
        INSERT INTO STUDENT 
        (fname,mname,lname,email,birthday,age,
        address,contactno,mothersname,fathersname) 
        VALUES 
        ('$fname','$mname','$lname','$email','$bdate',TIMESTAMPDIFF(YEAR,'$bdate',curdate()),
        '$address','$cnum','$mothername','$fathername');";
        $result = mysqli_query($db,$sql);
        if($result){
            session_start();
            $_SESSION["toast"]="good";
            $_SESSION["message"]="Your student profile is now saved!";
            header('location: read.php');
        }
        else {
            session_start();
            $_SESSION["toast"]="bad";
            $_SESSION["message"]="An error has occured while saving!";
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
    <title>Student Profile Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-dark bg-gradient my-lg-5 p-lg-5">
    <div class="container col-lg-6 ">
        <form class="border border-5 border-primary rounded-3 my-5 p-3 bg-light" name="register" autocomplete="nope" method="post">
            <div class="container">
                <h1 class="display-1 mb-lg-5 text-wrap text-center">Student Profile</div>
                <div class="container mb-3  text-center">
                    <label for="fname" class="display-6 fs-3 form-label">First Name</label>
                    <input type="text" required autocomplete="nope" class="form-control text-center" name="fname" placeholder="Juan Benido" >
                </div>
                <div class="container mb-3 text-center">
                    <label for="mname" class="display-6 fs-3 form-label">Middle Name</label>
                    <input type="text" required autocomplete="nope" class="form-control text-center" name="mname" placeholder="Despacito" >
                </div>
                <div class="container mb-3 text-center">
                    <label for="lname" class="display-6 fs-3 form-label">Last Name</label>
                    <input type="text" required autocomplete="nope" class="form-control text-center" name="lname" placeholder="Dela Hoya" >
                </div>
                <div class="container mb-3 text-center">
                    <label for="lname" class="display-6 fs-3 form-label">Email</label>
                    <input type="email" required autocomplete="nope" class="form-control text-center" name="email" placeholder="user@funky.com" >
                </div>
                <div class="row mb-3 container-sm text-center">
                    <div class="col">
                        <label for="bdate" class="display-6 fs-3 form-label">Birth Date</label>
                        <input type="date" required autocomplete="nope" class="form-control text-center" name="bdate" id="test" placeholder="YYYY-MM-DD | 1900-12-30" onchange="calc(this.value);" >
                    </div>
                    <div class="col">
                        <label for="age" class="display-6 fs-3 form-label">Age</label>
                        <input type="text" required autocomplete="nope" class="form-control text-center " readonly placeholder="Select birthdate" name="age" id="age" >
                    </div>
                </div>
                <div class="container mb-3 text-center">
                    <label for="address" class="display-6 fs-3 form-label">Address</label>
                    <textarea  autocomplete="nope" required placeholder="Earth, Solar System, Milky Way" class="form-control text-center" name="address" rows="2" ></textarea>
                </div>
                <div class="container mb-3 text-center">
                    <label for="cnum" class="display-6 fs-3 form-label">Contact Number</label>
                    <input type="number" required autocomplete="nope" class="form-control text-center" name="cnum" placeholder="Mobile or Telephone Number" >
                </div>
                <div class="container mb-3 text-center">
                    <label for="mothername" class="display-6 fs-3 form-label">Mother's Full Name</label>
                    <input type="text" required autocomplete="nope" placeholder="Mother Nature" class="form-control text-center" name="mothername" >
                </div>
                <div class="container mb-3 text-center">
                    <label for="fathername" class="display-6 fs-3 form-label">Father's Full Name</label>
                    <input type="text" required autocomplete="nope" placeholder="Darth Vader" class="form-control text-center" name="fathername" >
                </div>
                <div class="d-grid gap-2 col-6 mx-auto my-3">
                    <button type="submit" class="btn btn-primary fs-3" id="liveToastBtn" name="submit">Submit</button>
                    <a href="./" class="btn btn-outline-dark fs-3" type="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        var datepicker = document.getElementById('test');
        var age = document.getElementById('age');

        if ( window.history.replaceState ) 
            window.history.replaceState( null, null, window.location.href );
        function calcAge(str) {
            var parts = str.split("-");                  // Gives us ["dd", "mm", "yyyy"]
            return new Date(parseInt(parts[0], 10),      // Year
                            parseInt(parts[1], 10) - 1,  // Month (starts with 0)
                            parseInt(parts[2], 10));     // Day of month
        }
        function calc(val){
            var today = new Date();
            var birthDate = calcAge(val);
            var dayDiff = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate()))
                dayDiff--;
            age.value=dayDiff;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
