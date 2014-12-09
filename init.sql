drop table if exists InterTableConnectionMetaData;
create table InterTableConnectionMetaData(FromTable varchar(50),ToTable varchar(50), TheConnection varchar(500), InBetweenTables varchar(500), primary key(FromTable, ToTable));

insert into InterTableConnectionMetaData values
('Products','Categories','Products.CategoryID=Categories.CategoryID','Products|Categories');

insert into InterTableConnectionMetaData values
('Categories','Products','Products.CategoryID=Categories.CategoryID','Products|Categories');

insert into InterTableConnectionMetaData values
('Order_Details','Products','Products.ProductID=Order_Details.ProductID','Products|Order_Details');

insert into InterTableConnectionMetaData values
('Products','Order_Details','Products.ProductID=Order_Details.ProductID','Products|Order_Details');


insert into InterTableConnectionMetaData values
('Products','Shippers','Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.ShipperID=Shippers.ShipperID','Products|Order_Details|Orders|Shippers');

insert into InterTableConnectionMetaData values
('Shippers','Products','Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.ShipperID=Shippers.ShipperID','Products|Order_Details|Orders|Shippers');

insert into InterTableConnectionMetaData values
('Shippers','Categories','Products.CategoryID=Categories.CategoryID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.ShipperID=Shippers.ShipperID','Products|Order_Details|Orders|Shippers|Categories');

insert into InterTableConnectionMetaData values
('Categories','Shippers','Products.CategoryID=Categories.CategoryID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.ShipperID=Shippers.ShipperID','Products|Order_Details|Orders|Shippers|Categories');

insert into InterTableConnectionMetaData values
('Shippers','Order_Details','Order_Details.OrderID=Orders.OrderID and Orders.ShipperID=Shippers.ShipperID','Order_Details|Orders|Shippers');

insert into InterTableConnectionMetaData values
('Order_Details','Shippers','Order_Details.OrderID=Orders.OrderID and Orders.ShipperID=Shippers.ShipperID','Order_Details|Orders|Shippers');

insert into InterTableConnectionMetaData values
('Categories','Order_Details','Products.CategoryID=Categories.CategoryID and Products.ProductID=Order_Details.ProductID','Products|Categories|Order_Details');


insert into InterTableConnectionMetaData values
('Order_Details','Categories','Products.CategoryID=Categories.CategoryID and Products.ProductID=Order_Details.ProductID','Products|Categories|Order_Details');

insert into InterTableConnectionMetaData values
('Products','Suppliers','Products.SupplierID=Suppliers.SupplierID','Products|Suppliers');


insert into InterTableConnectionMetaData values
('Suppliers','Products','Products.SupplierID=Suppliers.SupplierID','Products|Suppliers');

insert into InterTableConnectionMetaData values
('Order_Details','Orders','Order_Details.OrderID=Orders.OrderID','Order_Details|Orders');

insert into InterTableConnectionMetaData values
('Orders','Order_Details','Order_Details.OrderID=Orders.OrderID','Order_Details|Orders');

insert into InterTableConnectionMetaData values
('Employees','Orders','Orders.EmployeeID=Employees.EmployeeID','Employees|Orders');

insert into InterTableConnectionMetaData values
('Orders','Employees','Orders.EmployeeID=Employees.EmployeeID','Employees|Orders');

insert into InterTableConnectionMetaData values
('Orders','Customers','Orders.CustomerID=Customers.CustomerID','Orders|Customers');

insert into InterTableConnectionMetaData values
('Customers','Orders','Orders.CustomerID=Customers.CustomerID','Orders|Customers');

insert into InterTableConnectionMetaData values
('Employees','Order_Details','Orders.EmployeeID=Employees.EmployeeID and Order_Details.OrderID=Orders.OrderID','Employees|Orders|Order_Details');

insert into InterTableConnectionMetaData values
('Order_Details','Employees','Orders.EmployeeID=Employees.EmployeeID and Order_Details.OrderID=Orders.OrderID','Employees|Orders|Order_Details');

insert into InterTableConnectionMetaData values
('Employees','Customers','Orders.EmployeeID=Employees.EmployeeID and Customers.CustomerID=Orders.CustomerID','Employees|Orders|Customers');

insert into InterTableConnectionMetaData values
('Customers','Employees','Orders.EmployeeID=Employees.EmployeeID and Customers.CustomerID=Orders.CustomerID','Employees|Orders|Customers');

insert into InterTableConnectionMetaData values
('Shippers','Employees','Orders.EmployeeID=Employees.EmployeeID and Orders.ShipperID=Shippers.ShipperID','Employees|Orders|Shippers');

insert into InterTableConnectionMetaData values
('Employees','Shippers','Orders.EmployeeID=Employees.EmployeeID and Orders.ShipperID=Shippers.ShipperID','Employees|Orders|Shippers');


insert into InterTableConnectionMetaData values
('Orders','Shippers','Orders.ShipperID=Shippers.ShipperID','Orders|Shippers');

insert into InterTableConnectionMetaData values
('Shippers','Orders','Orders.ShipperID=Shippers.ShipperID','Orders|Shippers');

insert into InterTableConnectionMetaData values
('Shippers','Customers','Orders.ShipperID=Shippers.ShipperID and Orders.CustomerID=Customers.CustomerID','Orders|Shippers|Customers');

insert into InterTableConnectionMetaData values
('Customers','Shippers','Orders.ShipperID=Shippers.ShipperID and Orders.CustomerID=Customers.CustomerID','Orders|Shippers|Customers');

insert into InterTableConnectionMetaData values
('Employees','Products','Orders.EmployeeID=Employees.EmployeeID and Orders.OrderID=Order_Details.OrderID and Order_Details.ProductID=Products.ProductID','Employees|Orders|Order_Details|Products');

insert into InterTableConnectionMetaData values
('Products','Employees','Orders.EmployeeID=Employees.EmployeeID and Orders.OrderID=Order_Details.OrderID and Order_Details.ProductID=Products.ProductID','Employees|Orders|Order_Details|Products');

insert into InterTableConnectionMetaData values
('Employees','Categories','Orders.EmployeeID=Employees.EmployeeID and Orders.OrderID=Order_Details.OrderID and Order_Details.ProductID=Products.ProductID and Products.CategoryID=Categories.CategoryID','Employees|Orders|Order_Details|Products|Categories');

insert into InterTableConnectionMetaData values
('Categories','Employees','Orders.EmployeeID=Employees.EmployeeID and Orders.OrderID=Order_Details.OrderID and Order_Details.ProductID=Products.ProductID and Products.CategoryID=Categories.CategoryID','Employees|Orders|Order_Details|Products|Categories');


insert into InterTableConnectionMetaData values
('Categories','Suppliers','Products.SupplierID=Suppliers.SupplierID and Products.CategoryID=Categories.CategoryID','Products|Suppliers|Categories');

insert into InterTableConnectionMetaData values
('Suppliers','Categories','Products.SupplierID=Suppliers.SupplierID and Products.CategoryID=Categories.CategoryID','Products|Suppliers|Categories');

insert into InterTableConnectionMetaData values
('Order_Details','Suppliers','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID','Products|Suppliers|Order_Details');

insert into InterTableConnectionMetaData values
('Suppliers','Order_Details','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID','Products|Suppliers|Order_Details');

insert into InterTableConnectionMetaData values
('Orders','Suppliers','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID','Products|Suppliers|Order_Details|Orders');

insert into InterTableConnectionMetaData values
('Suppliers','Orders','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID','Products|Suppliers|Order_Details|Orders');

insert into InterTableConnectionMetaData values
('Employees','Suppliers','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.EmployeeID=Employees.EmployeeID','Products|Suppliers|Order_Details|Orders|Employees');

insert into InterTableConnectionMetaData values
('Suppliers','Employees','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.EmployeeID=Employees.EmployeeID','Products|Suppliers|Order_Details|Orders|Employees');

insert into InterTableConnectionMetaData values
('Customers','Suppliers','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.CustomerID=Customers.CustomerID','Products|Suppliers|Order_Details|Orders|Customers');

insert into InterTableConnectionMetaData values
('Suppliers','Customers','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.CustomerID=Customers.CustomerID','Products|Suppliers|Order_Details|Orders|Customers');


insert into InterTableConnectionMetaData values
('Shippers','Suppliers','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.ShipperID = Shippers.ShipperID','Products|Suppliers|Order_Details|Orders|Shippers');

insert into InterTableConnectionMetaData values
('Suppliers','Shippers','Products.SupplierID=Suppliers.SupplierID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.ShipperID = Shippers.ShipperID','Products|Suppliers|Order_Details|Orders|Shippers');

insert into InterTableConnectionMetaData values
('Products','Orders','Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID','Products|Order_Details|Orders');


insert into InterTableConnectionMetaData values
('Orders','Products','Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID','Products|Order_Details|Orders');


insert into InterTableConnectionMetaData values
('Products','Customers','Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.CustomerID=Customers.CustomerID','Products|Order_Details|Orders|Customers');


insert into InterTableConnectionMetaData values
('Customers','Products','Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID and Orders.CustomerID=Customers.CustomerID','Products|Order_Details|Orders|Customers');


insert into InterTableConnectionMetaData values
('Customers','Order_Details','Customers.CustomerID=Orders.CustomerID and Orders.OrderID=Order_Details.OrderID','Customers|Orders|Order_Details');

insert into InterTableConnectionMetaData values
('Order_Details','Customers','Customers.CustomerID=Orders.CustomerID and Orders.OrderID=Order_Details.OrderID','Customers|Orders|Order_Details');

insert into InterTableConnectionMetaData values
('Customers','Categories','Customers.CustomerID=Orders.CustomerID and Orders.OrderID=Order_Details.OrderID and Order_Details.ProductID=Products.ProductID and Products.CategoryID=Categories.CAtegoryID','Customers|Orders|Order_Details|Products|Categories');

insert into InterTableConnectionMetaData values
('Categories','Customers','Customers.CustomerID=Orders.CustomerID and Orders.OrderID=Order_Details.OrderID and Order_Details.ProductID=Products.ProductID and Products.CategoryID=Categories.CAtegoryID','Customers|Orders|Order_Details|Products|Categories');


insert into InterTableConnectionMetaData values
('Categories','Orders','Products.CategoryID=Categories.CategoryID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID','Products|Categories|Order_Details|Orders');

insert into InterTableConnectionMetaData values
('Orders','Categories','Products.CategoryID=Categories.CategoryID and Products.ProductID=Order_Details.ProductID and Order_Details.OrderID=Orders.OrderID','Products|Categories|Order_Details|Orders');

drop table if exists TableAttributeMapping;
create table TableAttributeMapping ( OriginalTableName varchar(50), OriginalCorrespondingAttribute varchar(50), CustomAttributeName varchar(50));

INSERT INTO TableAttributeMapping VALUES ('Categories','CategoryID','Category ID');


INSERT INTO TableAttributeMapping VALUES ('Categories','CategoryName','Category Name');

INSERT INTO TableAttributeMapping VALUES ('Categories','Description','Description');

INSERT INTO TableAttributeMapping VALUES ('Shippers','ShipperID','Shipper ID');

INSERT INTO TableAttributeMapping VALUES ('Shippers','CompanyName','Shipper Company Name');

INSERT INTO TableAttributeMapping VALUES ('Shippers','Phone','Phone');

insert into TableAttributeMapping values ('Order_Details','OrderID','Order ID');

insert into TableAttributeMapping values ('Order_Details','ProductID','Product ID');

insert into TableAttributeMapping values ('Order_Details','UnitPrice','Unit Price');

insert into TableAttributeMapping values ('Order_Details','Quantity','Quantity');

insert into TableAttributeMapping values ('Order_Details','Discount','Discount Given');

insert into TableAttributeMapping values ('Products','ProductID','Product ID');

insert into TableAttributeMapping values ('Products','ProductName','Product Name');

insert into TableAttributeMapping values ('Products','SupplierID','Supplier ID');

insert into TableAttributeMapping values ('Products','CategoryID','Category ID');

insert into TableAttributeMapping values ('Products','QuantityPerUnit','Quantity Per Unit');

insert into TableAttributeMapping values ('Products','UnitPrice','Unit Price');

insert into TableAttributeMapping values ('Products','UnitsInStock','Units In Stock');

insert into TableAttributeMapping values ('Products','UnitsOnOrder','Units On Order');

insert into TableAttributeMapping values ('Products','ReorderLevel','Reorder Level');

insert into TableAttributeMapping values ('Products','Discontinued','Discontinued');

insert into TableAttributeMapping values ('Employees','EmployeeID','Employee ID');

insert into TableAttributeMapping values ('Employees','LastName','Last Name');

insert into TableAttributeMapping values ('Employees','FirstName','First Name');

insert into TableAttributeMapping values ('Employees','Title','Title');

insert into TableAttributeMapping values ('Employees','TitleOfCourtesy','Title Of Courtesy');

insert into TableAttributeMapping values ('Employees','BirthDate','Birth Date');

insert into TableAttributeMapping values ('Employees','HireDate','Hire Date');

insert into TableAttributeMapping values ('Employees','Address','Address');

insert into TableAttributeMapping values ('Employees','City','City');

insert into TableAttributeMapping values ('Employees','Region','Region');

insert into TableAttributeMapping values ('Employees','PostalCode','Postal Code');

insert into TableAttributeMapping values ('Employees','Country','Country');

insert into TableAttributeMapping values ('Employees','HomePhone','Home Phone');

insert into TableAttributeMapping values ('Employees','Extension','Extension');

insert into TableAttributeMapping values ('Employees','Photo','Photo');

insert into TableAttributeMapping values ('Employees','Notes','Notes');

insert into TableAttributeMapping values ('Employees','ReportsTo','Reports To');

insert into TableAttributeMapping values ('Suppliers','SupplierID','Supplier ID');

insert into TableAttributeMapping values ('Suppliers','CompanyName','Company Name');

insert into TableAttributeMapping values ('Suppliers','ContactName','Contact Name');

insert into TableAttributeMapping values ('Suppliers','ContactTitle','Contact Title');

insert into TableAttributeMapping values ('Suppliers','Address','Address');

insert into TableAttributeMapping values ('Suppliers','City','City');

insert into TableAttributeMapping values ('Suppliers','Region','Region');

insert into TableAttributeMapping values ('Suppliers','PostalCode','Postal Code');

insert into TableAttributeMapping values ('Suppliers','Country','Country');

insert into TableAttributeMapping values ('Suppliers','Phone','Phone');

insert into TableAttributeMapping values ('Suppliers','Fax','Fax');

insert into TableAttributeMapping values ('Suppliers','HomePage','Home Page');

insert into TableAttributeMapping values ('Orders','OrderID','Order ID');

insert into TableAttributeMapping values ('Orders','CustomerID','Customer ID');

insert into TableAttributeMapping values ('Orders','EmployeeID','Employee ID');

insert into TableAttributeMapping values ('Orders','OrderDate','OrderDate');

insert into TableAttributeMapping values ('Orders','RequiredDate','Required Date');

insert into TableAttributeMapping values ('Orders','ShippedDate','Shipped Date');

insert into TableAttributeMapping values ('Orders','ShipperID','Shipper ID');

insert into TableAttributeMapping values ('Orders','Freight','Freight');

insert into TableAttributeMapping values ('Orders','ShipName','Ship Name');

insert into TableAttributeMapping values ('Orders','ShipAddress','Ship Address');

insert into TableAttributeMapping values ('Orders','ShipCity','Ship City');

insert into TableAttributeMapping values ('Orders','ShipRegion','Ship Region');

insert into TableAttributeMapping values ('Orders','ShipPostalCode','Ship Postal Code');

insert into TableAttributeMapping values ('Orders','ShipCountry','Ship Country');

insert into TableAttributeMapping values ('Customers','CustomerID','Customer ID');

insert into TableAttributeMapping values ('Customers','CompanyName','Company Name');

insert into TableAttributeMapping values ('Customers','ContactName','Contact Name');

insert into TableAttributeMapping values ('Customers','ContactTitle','Contact Title');

insert into TableAttributeMapping values ('Customers','Address','Address');

insert into TableAttributeMapping values ('Customers','City','City');

insert into TableAttributeMapping values ('Customers','Region','Region');

insert into TableAttributeMapping values ('Customers','PostalCode','Postal Code');

insert into TableAttributeMapping values ('Customers','Country','Country');

insert into TableAttributeMapping values ('Customers','Phone','Phone');

insert into TableAttributeMapping values ('Customers','Fax','Fax');

drop table if exists TableNameMetaData;
create table TableNameMetaData(OriginalTable varchar(50), CustomTablename varchar(50));

insert into TableNameMetaData values('Categories','Categories');
insert into TableNameMetaData values('Customers','Customers');
insert into TableNameMetaData values('Employees','Employees');
insert into TableNameMetaData values('Orders','Orders');
insert into TableNameMetaData values('Order_Details','Order Details');
insert into TableNameMetaData values('Products','Products');
insert into TableNameMetaData values('Shippers','Shippers');
insert into TableNameMetaData values('Suppliers','Suppliers');
