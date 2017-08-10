SELECT a.title, a.content, a.picture, a.date_publish, u.firstname, u.lastname
FROM articles AS a 
JOIN users AS u
ON a.id_user = u.id
WHERE a.id = 10

/*or without JOIN */

SELECT a.title, a.content, a.picture, a.date_publish, u.firstname, u.lastname  
FROM users u, articles a
WHERE u.id = a.id_user
AND a.id = 10;