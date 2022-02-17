create database SCHOOL;
create table SCHOOL.STUDENT(
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
insert into STUDENT (
    fname,
    mname,
    lname,
    email,
    birthday,
    age,
    address,
    contactno,
    mothersname,
    fathersname
)
values (
    'ronald','a','dy tioco jr',
    'ronald.dytiocojr.a@bulsu.edu.ph',
    '2000-12-20',TIMESTAMPDIFF(YEAR,'2000-12-20',curdate()),
    'city of malolos','09667083023',
    'mother nature','darth vader'
);