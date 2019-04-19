1-create database table (shop) or just import it from the folder of the project


3- foreign key 
1) empty the items table (which will have the foreign key) 
2) the code 

ALTER TABLE items  // tabe which I make changes on  and which will have the foreign key

ADD CONSTRAINT member_1 // name the constraint

FOREIGN KEY(Member_ID) // foreign key

REFERENCES users(UserID)// reference to which coulmn

ON UPDATE CASCADE //If you like the Parent and Child terms and you feel they are easy to be remembered, you may like the translation of ON DELETE CASCADE to Leave No Orphans!

ON DELETE CASCADE// opposite of CasCade is restrict


3) joining coulmn from table to another tabe through forgein key

SELECT items.*, categories.Name AS cat_name, users.Username AS member FROM items

INNER JOIN categories ON categories.ID = items.Cat_ID

INNER JOIN users ON users.UserID = items.Member_ID