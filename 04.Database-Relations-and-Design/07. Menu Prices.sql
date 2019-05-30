SELECT 
	category_id, 
	ROUND(AVG(price), 2) AS 'Average Price', 
	MIN(price) AS 'Cheapset Product',
	MAX(price) AS 'Most Expensice Product'
FROM products 
GROUP BY category_id
ORDER BY category_id
