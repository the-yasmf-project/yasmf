## Sample "All users"

A simple project with a database connection.

### The database schema

The project expects a database with 2 tables "users" and "status".
First you have to create a database on a mysql server.
The SQL below can be used to create the schema and to populate the database.

```
CREATE TABLE `status` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `status_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `status` (`id`, `name`)
VALUES
(1,'Waiting for account validation'),
(2,'Active account'),
(3,'Waiting for account deletion');

CREATE TABLE `users` (
`username` varchar(50) NOT NULL,
`id` bigint(20) NOT NULL AUTO_INCREMENT,
`email` varchar(100) NOT NULL,
`status_id` int(11) NOT NULL DEFAULT '1',
PRIMARY KEY (`id`),
UNIQUE KEY `user_id_uindex` (`id`),
KEY `user_status_id_index` (`status_id`),
CONSTRAINT `user_status__fk` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `users` (`username`, `id`, `email`, `status_id`)
VALUES
('bobdeniro',1,'bobdeniro@hollywood.com',1),
('eliseB',2,'eliseb@ihm.com',1),
('arthurH',3,'arthurH@michelin.com',1),
('wandaL',4,'wandal@lalaland.com',2),
('paulsimon',5,'paulsimon@guitare.org',2),
('jessicaA',6,'jessicaa@hollywood.com',2),
('steveM',7,'stevem@cars.com',2),
('evaM',8,'evam@movieland.com',2),
('alpacino',9,'alpacino@moviecountry.com',2),
('eddym',10,'eddym@beverly.com',3),
('francoises',11,'francoises@quaidesbrumes.org',3);
```

