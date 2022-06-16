
CREATE DATABASE IF NOT EXISTS TIP_DB;

create table user_acc
(
userid int primary key auto_increment,
firstname varchar(10),
lastname varchar(10),
email varchar(50),
phone varchar(15),
password varchar(20),
`desc` varchar(255),
numOfMentees int,
acc_type varchar(7)
);

create table subscriptions
(
userid int,
start_date DATE,
end_date DATE,
status varchar(10),
sub_type varchar(10),
foreign key (userid) references user_acc(userid)
);