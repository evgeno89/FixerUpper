
DROP TABLE IF EXISTS products;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    image_path VARCHAR(255)
);

INSERT INTO products (name, description, price, image_path) VALUES
('Hammer', 'Durable steel claw hammer.', 19.99, 'Hamer.png'),
('Chainsaw', 'High-power chainsaw for heavy cutting.', 149.99, 'ChainSaw.png'),
('Cordless Drill', 'Portable cordless electric drill.', 79.99, 'Cordless Drill.png'),
('Measuring Tape', '12-foot measurement tape.', 9.99, 'MeasureTape.png'),
('Circular Saw', 'Precision circular saw for wood cutting.', 129.99, 'ElectricSaw.png');
