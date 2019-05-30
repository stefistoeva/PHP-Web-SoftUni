SELECT deposit_group
FROM wizzard_deposits AS w
GROUP BY deposit_group
ORDER BY AVG(w.magic_wand_size) ASC
LIMIT 1
