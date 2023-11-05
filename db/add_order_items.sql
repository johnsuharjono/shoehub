-- Note: check if foreign keys exists

INSERT INTO order_item (order_id, product_id, product_size_id, quantity)
VALUES 
  (1, 14, 11, 50), -- (order_id 1) bought 1906R (product_id 14), size 10 (size_id 11), quantity 10
  (1, 1, 4, 50), -- (order_id 1) bought AF1 (product_id 1), size 9 (size_id 4), quantity 10
  (2, 14, 11, 1), -- (order_id 2) bought 1906R (product_id 14), size 10 (size_id 11), quantity 1
  (3, 12, 13, 20), -- (order_id 3) bought Adizero (product_id 12), size 6 (size_id 13), quantity 20
  (3, 2, 23, 20) -- (order_id 3) bought Alphafly (product_id 2), size 10 (size_id 23), quantity 20
;