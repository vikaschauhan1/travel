create view avgrate as
select AVG(rating) as avgrating, guide_id
FROM ratings 
group by guide_id
ORDER BY avgrating DESC;



create view rate as
select GROUP_CONCAT(avgrating) from 
avgrate;