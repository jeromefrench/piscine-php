/* MariaDB [(none)]> SET PASSWORD FOR jeronemo@localhost = PASSWORD(jeronemo); */
SHOW DATABASES;
USE db_jchardin;
SHOW TABLES;
CREATE TABLE `db_jchardin`.`ft_table` ( `id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(255) NOT NULL DEFAULT 'toto' , `groupe` ENUM('staff','student','other','') NOT NULL , `date_de_creation` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
SHOW TABLES;
