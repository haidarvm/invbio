LOAD DATA LOCAL INFILE '/home/haidar/Documents/dataProductBioFarma.csv' IGNORE INTO TABLE invbio_category
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(category_code, category_name);



LOAD DATA LOCAL INFILE '/home/haidar/Documents/dataProductBioFarma.csv' IGNORE INTO TABLE invbio_product
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(category_code, @category_name, product_code, product_name, unit);


UPDATE invbio_product 
INNER JOIN invbio_category ON invbio_product.category_code = invbio_category.category_code
SET invbio_product.category_id =  invbio_category.category_id




CREATE TABLE `invbio_stock_in` (                                                            
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,                                                             
  `product_id` int(8) NOT NULL,                                                                           
  `quantity` mediumint(9) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`stock_id`) 
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


CREATE TABLE `invbio_stock_out` (                                                            
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,                                                             
  `product_id` int(8) NOT NULL,                                                                           
  `quantity` mediumint(9) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`stock_id`) 
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;