create table chatmem (
    num int not null auto_increment,
    id char(15) not null,
    pw char(15) not null,
    name char(10) not null,
    email char(80),
    regist_day char(20),
    primary key(num)
);
