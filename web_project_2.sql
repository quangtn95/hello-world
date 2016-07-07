use web_project;

CREATE TABLE IF NOT EXISTS employees
(
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(250) NOT NULL,
  sex varchar(10) ,
  birthday date ,
  address varchar(250) ,
  image varchar(150) ,
  job_title varchar(100) ,
  cellphone varchar(100) ,
  email varchar(255) ,
  dep_name varchar(100) ,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into employees(name,sex,birthday,address,job_title,cellphone,email)
values('Lê Văn Hùng', 'Nam', '1985-06-06', 'Cầu Giấy-Hà Nội', 'Nhân viên', '0972573421', 'levanhungshit@gmail.com');

insert into employees(name,sex,birthday,address,job_title,cellphone,email)
values('Nguyễn Hồng Trà', 'Nữ', '1993-09-23', 'Đống Đa-Hà Nội', 'Thư ký', '0985923567', 'hongtra@gmail.com');

insert into employees(name,sex,birthday,address,job_title,cellphone,email)
values('Bùi Thị Yến', 'Nữ', '1994-07-23', 'Thường Tín-Hà Nội', 'Nhân viên', '0972587496', 'hongtra@gmail.com');