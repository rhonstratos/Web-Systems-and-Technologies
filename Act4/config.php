<!-- 
    main repo
    https://github.com/rhonstratos/Web-Systems-and-Technologies
-->
<?php 
    $_SESSION['dbtoast']=1;
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');       //database username (dafault: root)
    define('DB_PASSWORD', '');           //database password (default: <blank>)
    define('DB_DATABASE', 'SCHOOL');     //database name

    $sql =" 
    create database if not exists ".DB_DATABASE;
    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
    mysqli_query($con,$sql);
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql =" 
    create table if not exists student(
        id int not null AUTO_INCREMENT,
        fname varchar(50) not null,
        mname varchar(50) not null,
        lname varchar(50) not null,
        email varchar(255) not null,
        birthday date not null,
        age int not null,
        address varchar (255) not null,
        contactno varchar(15) not null,
        mothersname varchar (150) not null,
        fathersname varchar (150) not null,
        primary key (id,fname,mname,lname)
    );
    ";
    mysqli_query($db,$sql);
    $sql = " 
    INSERT INTO student 
    (fname,mname,lname,
    email,birthday,
    age,
    address,contactno,
    mothersname,fathersname)
    select 
    'ronald','a','dy tioco jr',
    'ronald.dytioco.a@bulsu.edu.ph','2000-12-20',
    TIMESTAMPDIFF(YEAR,'2000-12-20',curdate()),
    'city of malolos','09667083023',
    'mother nature','darth vader'
    WHERE NOT EXISTS (SELECT * FROM student)";
    mysqli_query($db,$sql);
?>