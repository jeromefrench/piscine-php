SELECT CONCAT(`last_name`,' ',`first_name`,' ',date(`birthdate`)) AS `birthdate` 
FROM `db_jchardin`.`user_card` 
WHERE year(`birthdate`) = '1989' 
ORDER BY `last_name` ASC;
