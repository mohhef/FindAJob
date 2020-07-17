/*iii. For a given customer, get details of all his/her special orders.*/

select c.cid,c.first_name,so.order_id,so.order_date,so.qty
from customer c, special_order so
where c.cid=so.cid


/*iv. For a given customer, get details of all his/her purchases made during a
specific period of time from a given branch.*/

select c.cid, c.first_name, st.transaction_id, st.quantity, st.order_date, b.title, b.isbn, b.cost_price, b.book_subject
from customer c, sale_to st, book b
where  c.cid = st.cid and st.isbn = b.isbn and st.order_date between '2020-02-02' and '2020-09-09'


/*For all publishers who have at least three branches, get details of the head
office and all the branches for those publishers.*/
select pub2.publisher_number, pub2.head_address, pub2.head_number, pub2.head_city, pub2.head_postal, pub2.head_province, pub2.head_email, pub2.head_website,
b.branch_name,b.postal_code,b.address,b.province,b.telephone_number  
from publisher_branch b,
(select pub.publisher_number,p.address as head_address, p.telephone_number as head_number, p.city as head_city, p.postal_code as head_postal, p.province as head_province, p.email_address as head_email,p.website as head_website
from publisher p,
(select pb.publisher_number, count(*) as branch_number
from  publisher_branch pb
group by pb.publisher_number
having branch_number >=3) as pub
where p.publisher_number = pub.publisher_number) as pub2
where pub2.publisher_number=b.publisher_number