create table newchat (
	num int(11) not null auto_increment,
	id char(15) not null,
	name char(10) not null,
	msg text not null,
	date datetime not null,
	primary key(num),
	key date(date)
);