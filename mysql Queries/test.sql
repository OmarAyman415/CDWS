SELECT
p.ssn,
p.name, 
f.name as foundation_name,
f.foundationId,
f.licenceid,
f.idNumberRoom,
f.place,
a.state,
auth.phone as authorize_phone,
auth.idNumber as idMember,
p.phone,
p.email,
p.adjId,
p.ssnVisitor,
p.approven
FROM persons p
left JOIN
foundation f ON p.ssn = f.ssnPerson      
LEFT JOIN 
adj_id a ON a.id = p.adjId
LEFT JOIN
authorize auth ON auth.ssn = p.ssnVisitor
                    