use users;

create table users (username varchar(50) primary key, pass text);

create table temp_users(username varchar(50) primary key, pass text);

create table courses(id text primary key, name text, department text, teacher text, foreign key (department) references department(name));

create table review(comment text, username varchar(50), course text, primary key (username, course), foreign key (username) references users(username), foreign key (course) references courses(id));

create table department(name text);
