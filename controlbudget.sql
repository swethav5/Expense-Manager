CREATE DATABASE controlbudget;

CREATE TABLE controlbudget.user(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(225) NOT NULL,
	email VARCHAR(225) NOT NULL,
	password VARCHAR(225) NOT NULL,
	contact BIGINT(11) NOT NULL);

CREATE TABLE controlbudget.plandetails(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	user_id INT(11) NOT NULL,
	title VARCHAR(225) NOT NULL,
	from_date DATE NOT NULL,
	to_date DATE NOT NULL,
	initial_budget INT(11) NOT NULL,
	people INT(11) NOT NULL,
	FOREIGN KEY(user_id) REFERENCES user(id) ON UPDATE CASCADE);

CREATE TABLE controlbudget.person_names(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	plan_id INT(11) NOT NULL,
	person VARCHAR(225) NOT NULL,
	FOREIGN KEY(plan_id) REFERENCES plandetails(id) ON UPDATE CASCADE);

CREATE TABLE controlbudget.addexpense(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	planid INT(11) NOT NULL,
	pid INT(11) NOT NULL,
	title VARCHAR(225) NOT NULL,
	date DATE NOT NULL,
	amount INT(11) NOT NULL,
	person VARCHAR(225) NOT NULL,
	bill VARCHAR(225),
	FOREIGN KEY(planid) REFERENCES plandetails(id) ON UPDATE CASCADE,
	FOREIGN KEY(pid) REFERENCES person_names(id) ON UPDATE CASCADE);	 


	



