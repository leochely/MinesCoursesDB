use users;

create table users (username varchar(50) primary key, pass text);

create table temp_users(username varchar(50) primary key, pass text);

create table department(initials varchar(4) primary key);

create table courses(course_number int, department varchar(4) references department(initials), professor varchar(50), primary key (course_number, department));

create table review(course_number int references courses(course_number), department varchar(4) references department(initials), review varchar(500), user varchar(50) references users(username));

INSERT INTO department VALUES ('CSCI'), ('MATH'), ('CBEN'), ('CHGN'), ('CSM'), ('CEEN'), ('EGGN'), ('EBGN'), ('LIFL'), ('AFGN'), ('BIOL'), ('CHGC'), ('LICM'), ('EENG'), ('ENGY'), ('EDNS'), ('GEGX'), ('GEGN'), ('GEOL'), ('GPGN'), ('HNRS'), ('HASS'), ('MLGN'), ('MEGN'), ('MTGN'), ('MSGN'), ('MNGN'), ('LIMU'), ('NUGN'), ('PEGN'), ('PAGN'), ('PHGN'), ('SPRS'), ('SYGN');   