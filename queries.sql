/*i. Get details of all books in stock ordered by year-to-date-qty-sold in descending order.*/
select b.isbn,a.author_name,b.title,b.book_subject,b.selling_price,s.quantity_on_hand,detail.quantity_sold
from book b, written_by wb, author a, stores s,
(select st.isbn, count(*) as quantity_sold
from sale_to st
group by isbn) detail
where b.isbn=detail.isbn and b.isbn=wb.isbn and wb.email=a.email and b.isbn = s.isbn
order by quantity_sold desc

/*ii. Get details of all back orders for a given publisher.*/
select bo.order_id, o.order_date, bo.isbn,bo.qty,of.branch_name
from orders o, order_from off, book_order bo
where o.order_id =  bo.order_id and bo.order_id = off.order_id and bo.arrival_date is null and publisher_number = "p2";


/*iii. For a given customer, get details of all his/her special orders.*/
select c.first_name,so.order_id,so.order_date,so.quantity,so.ISBN,so.branch_name,so.publisher_number
from customer c, special_order so
where c.cid=so.cid and c.cid='c1'

/*iv. For a given customer, get details of all his/her purchases made during a
specific period of time from a given branch.*/
select c.cid, c.first_name, st.transaction_id, st.quantity, st.order_date, b.title, b.isbn, b.cost_price, b.book_subject
from customer c, sale_to st, book b
where  c.cid = st.cid and st.isbn = b.isbn and st.order_date between '2020-02-02' and '2020-09-09' and c.cid='c1'

/*v. Give a report of sales during a specific period of time for a given branch.*/
SELECT pb.branch_name, sum(b.selling_price)
FROM publisher_branch as pb, order_from as o_f, orders as o, book_order as bo, book as b 
WHERE pb.branch_name = o_f.branch_name 
	and o_f.order_id = bo.order_id 
	and bo.ISBN = b.ISBN
	and o.order_date >= DATE("2020-01-01") 
	and o.order_date <= DATE("2020-07-01")
	and pb.branch_name = "b1"
	group by pb.branch_name;

/*vi. Find the title and name of publisher of book(s) that have the highest backorder.*/

select off.publisher_number,p.company_name,back_order.isbn,b.title, max(quantity) as back_order_quantity
from order_from off, publisher p, book b,
(select bo.isbn,bo.order_id, sum(bo.qty) as quantity
from book_order bo
where arrival_date is null
group by bo.isbn) as back_order
where off.order_id=back_order.order_id and off.publisher_number=p.publisher_number and back_order.isbn = b.isbn

/*vii. Give details of books that are supplied by a given publisher ordered by
their sale price in increasing order.*/
select b.title, b.isbn, b.selling_price, b.book_subject, a.author_name, b.selling_price
from book b, author a, written_by wb
where b.publisher_number="p3" and b.isbn = wb.isbn and wb.email = a.email
order by b.selling_price

/*viii. For all publishers who have at least three branches, get details of the head
office and all the branches for those publishers.*/
select pub2.publisher_number, pub2.head_address, pub2.head_number, pub2.head_company_name, pub2.head_city, pub2.head_postal, pub2.head_province, pub2.head_email, pub2.head_website,
b.branch_name,b.postal_code,b.address,b.province,b.telephone_number  
from publisher_branch b,
(select pub.publisher_number,p.address as head_address, p.telephone_number as head_number, p.company_name as head_company_name, p.city as head_city, p.postal_code as head_postal, p.province as head_province, p.email_address as head_email,p.website as head_website
from publisher p,
(select pb.publisher_number, count(*) as branch_number
from  publisher_branch pb
group by pb.publisher_number
having branch_number >=3) as pub
where p.publisher_number = pub.publisher_number) as pub2
where pub2.publisher_number=b.publisher_number

/*ix. Get details of books that are in the inventory for at least one year but there
have never been a purchase for that specific book.*/
select bo.isbn, b.title, b.selling_price,b.book_subject,s.quantity_on_hand,a.author_name
from book_order bo, stores s, book b, written_by wb, author a
where bo.isbn not in(select st.isbn 
from sale_to st
where st.order_date between '2019-07-17' and '2020-07-17')
and bo.isbn=s.isbn and bo.arrival_date < '2019-07-17' and bo.isbn = b.isbn and b.isbn=wb.isbn and wb.email=a.email

/*x. Get details of all books that are in the inventory for a given author.*/
select b.title, b.isbn, b.selling_price, b.book_subject, s.quantity_on_hand, a.author_name, a.author_name
from book b, author a,written_by bi, stores s
where b.isbn=bi.isbn and bi.email = a.email and bi.isbn = s.isbn and a.email="pkennally8@engadget.com"
