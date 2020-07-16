/*iii. For a given customer, get details of all his/her special orders.*/

select c.cid,c.name,so.order_id,so.order_date,so.qty
from customer c, special_order so
where c.cid=so.cid


/*iv. For a given customer, get details of all his/her purchases made during a
specific period of time from a given branch.*/

select c.cid, c.name, st.transaction_id, st.qty, st.order_date, b.title, b.isbn, b.cost_price, b.subject
where  c.cid = st.cid and st.isbn = b.isbn and st.order_date between 2020/02/02 and 2020/09/09

/*For all publishers who have at least three branches, get details of the head
office and all the branches for those publishers.*/

select p.p
select p.publisher_number, count(*) as branch_number
from publisher p
group by p.publisher_number
having branch_number