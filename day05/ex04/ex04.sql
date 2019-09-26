USE db_jchardin;
UPDATE ft_table
SET date_de_creation = DATE_ADD(date_de_creation, INTERVAL 1 YEAR)
WHERE id > 5;
