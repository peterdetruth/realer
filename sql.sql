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

CREATE TABLE education_levels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category ENUM('primary', 'secondary', 'tertiary') NOT NULL,
    sort_order INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE education_qualifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    education_level_id INT NOT NULL,
    name VARCHAR(150) NOT NULL,
    sort_order INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_qualification_level
        FOREIGN KEY (education_level_id)
        REFERENCES education_levels(id)
        ON DELETE CASCADE
);

CREATE TABLE work_experiences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    is_active TINYINT(1) DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE experience_periods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(100) NOT NULL,
    sort_order INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `qualifications` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `education_level_id` INT UNSIGNED NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `sort_order` INT UNSIGNED DEFAULT 0,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT fk_education_level
        FOREIGN KEY (`education_level_id`)
        REFERENCES `education_levels`(`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE education_qualifications DROP FOREIGN KEY fk_qualification_level;
ALTER TABLE education_levels MODIFY id INT UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE education_qualifications MODIFY education_level_id INT UNSIGNED NOT NULL;

ALTER TABLE education_qualifications ADD CONSTRAINT fk_qualification_level FOREIGN KEY (education_level_id) REFERENCES education_levels(id) ON DELETE CASCADE;




