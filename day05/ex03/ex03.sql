show databases;
USE db_jchardin;
show tables;
describe fiche_personne;
/* USE db_jchardin; */

INSERT INTO ft_table (login, date_de_creation)
SELECT nom, date_naissance FROM fiche_personne
WHERE nom like '%a%'
AND LENGTH(nom) < 9
ORDER BY nom
LIMIT 10
;

/* Vous attribuerez à ces utilisateurs le groupe ’other’. */
