CREATE TABLE positions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    table_order INT NOT NULL,           -- Number on the table
    title VARCHAR(255) NOT NULL,        -- Position title
    salary TEXT NOT NULL,               -- Salary (can include line breaks)
    duties TEXT NOT NULL,               -- Duties & Responsibilities
    requirements TEXT NOT NULL,         -- Requirements
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

UPDATE users
SET role_id = 1,
    role = 'admin'
WHERE email = 'admin@kennie.local';

ALTER TABLE positions ADD vacant_positions INT NOT NULL AFTER table_order;

