SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) 
AS full_name
FROM employees
WHERE salary IN(25000, 14000, 12500, 23600);
