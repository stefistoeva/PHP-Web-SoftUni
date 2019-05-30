SELECT 
	e.employee_id,
	e.first_name,
	em.employee_id AS manager_id,
	em.first_name AS manager_name
FROM employees AS e
INNER JOIN employees AS em ON em.employee_id = e.manager_id
WHERE e.manager_id = 3 OR e.manager_id = 7
ORDER BY e.first_name
