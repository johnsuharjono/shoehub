-- Note: generate hashed passwords first using php's password_hash and PASSWORD_DEFAULT

INSERT INTO user (name, email, password, address, phone_number, role)
VALUES 
-- Admin
(
  'Admin User', 
  'admin@shoehub.com', 
  '$2y$10$PAXeQdTQ54GAwRt70jQm6ORVqbbduXo8tugh9ZpLgNMxe65LLMC1G', -- admin
  'NTU Tama', 
  '12345678', 
  'admin'
),
-- User
(
  'John Doe', 
  'john@gmail.com', 
  '$2y$10$ZXPwDfCj.OqaMteS/O4Epur2P3UzUD9bUQQGzabk4yhCKXiDRSsJ6', -- john
  '38 Nanyang Crescent', 
  '11111111', 
  'user'
);
