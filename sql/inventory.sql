CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100),
    supplier VARCHAR(100),
    price DECIMAL(10,2),
    stock INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (product_name, supplier, price, stock) VALUES
('Rice Bag', 'Local Supplier', 25.50, 40),
('Sugar Pack', 'ABC Traders', 15.00, 8),
('Oil Can', 'XYZ Supplies', 60.00, 5);
