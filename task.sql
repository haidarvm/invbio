-- alter table
-- new
ALTER TABLE `invbio_stock_in` CHANGE `rak` `location` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
ALTER TABLE `invbio_user` ADD `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL  AFTER `created_at`;
ALTER TABLE `invbio_item` ADD `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL  AFTER `created_at`;

-- done
ALTER TABLE `invbio_stock` ADD `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL  AFTER `created_at`;
ALTER TABLE `invbio_stock_in` ADD `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL  AFTER `created_at`;
ALTER TABLE `invbio_stock_out` ADD `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL  AFTER `created_at`;
ALTER TABLE `invbio_item` ADD `location` VARCHAR(300) NULL AFTER `unit`;
ALTER TABLE `invbio_stock_in` ADD `rak` VARCHAR(200) NOT NULL AFTER `desc`; 

ALTER TABLE `invbio_stock_in` ADD `desc` VARCHAR(2000) NULL AFTER `quantity`;
ALTER TABLE `invbio_stock_out` ADD `desc` VARCHAR(2000) NULL AFTER `quantity`; 

-- get all with date start end 
 select `item_name`, `invbio_i`.`item_id`, `item_code`, `category_name`, `stock_id`, `quantity`, `units`, `invbio_stock_in`.`created_at`, `invbio_stock_in`.`location` from `invbio_stock_in` left join `invbio_item` as `invbio_i` on `invbio_i`.`item_id` = `invbio_stock_in`.`item_id` left join `invbio_category` as `invbio_c` on `invbio_c`.`category_id` = `invbio_i`.`category_id` order by `invbio_stock_in`.`created_at` desc


select *  from `invbio_stock` 
where date(`created_at`) >= '2022-03-30' order by `invbio_stock`.`created_at` desc;

-- select all trx by item
select `item_name`, `invbio_i`.`item_id`, `item_code`, `category_name`, invbio_in.stock_id as stock_id_in, invbio_out.stock_id as stock_id_out, invbio_in.quantity as quantity_in, invbio_out.quantity as quantity_out, `invbio_in`.`created_at` from `invbio_stock_in` as `invbio_in` left join `invbio_item` as `invbio_i` on `invbio_i`.`item_id` = `invbio_in`.`item_id` left join `invbio_stock_out` as `invbio_out` on `invbio_in`.`item_id` = `invbio_out`.`item_id` left join `invbio_category` as `invbio_c` on `invbio_c`.`category_id` = `invbio_i`.`category_id` where `invbio_in`.`item_id` = 3 order by `invbio_in`.`created_at` desc

-- Trigger On insert Stock In
CREATE TRIGGER update_stock
AFTER 
ON invbio_stock
FOR EACH ROW
BEGIN
SET quantity = new.quantity, item_id = new.item_id 
END

-- Trigger On insert Stock Out


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