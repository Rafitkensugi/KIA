CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(100),
    description TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 2. users
-- -------------------------------------------------
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150),
    email VARCHAR(150) UNIQUE,
    password_hash VARCHAR(255),
    role_id INT,
    photo VARCHAR(255),
    status TINYINT DEFAULT 1,
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 3. patients_mother
-- -------------------------------------------------
CREATE TABLE patients_mother (
    mother_id INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(20),
    name VARCHAR(150),
    birth_date DATE,
    phone VARCHAR(20),
    address TEXT,
    blood_type VARCHAR(5),
    alergies TEXT,
    medical_history TEXT,
    created_at DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 4. patients_child
-- -------------------------------------------------
CREATE TABLE patients_child (
    child_id INT AUTO_INCREMENT PRIMARY KEY,
    mother_id INT,
    nik VARCHAR(20),
    name VARCHAR(150),
    birth_date DATE,
    gender ENUM('L','P'),
    birth_weight FLOAT,
    birth_length FLOAT,
    alergies TEXT,
    created_at DATETIME,
    FOREIGN KEY (mother_id) REFERENCES patients_mother(mother_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 5. pregnancies
-- -------------------------------------------------
CREATE TABLE pregnancies (
    pregnancy_id INT AUTO_INCREMENT PRIMARY KEY,
    mother_id INT,
    hpht DATE,
    hpl DATE,
    gravida INT,
    para INT,
    abortus INT,
    notes TEXT,
    created_at DATETIME,
    FOREIGN KEY (mother_id) REFERENCES patients_mother(mother_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 6. registrations
-- -------------------------------------------------
CREATE TABLE registrations (
    reg_id INT AUTO_INCREMENT PRIMARY KEY,
    reg_code VARCHAR(30),
    patient_type ENUM('mother','child'),
    mother_id INT NULL,
    child_id INT NULL,
    visit_date DATE,
    service_type ENUM('pemeriksaan_ibu','pemeriksaan_anak','imunisasi','usg','lainnya'),
    status ENUM('pending','on_queue','finished') DEFAULT 'pending',
    created_at DATETIME,
    FOREIGN KEY (mother_id) REFERENCES patients_mother(mother_id),
    FOREIGN KEY (child_id) REFERENCES patients_child(child_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 7. queue
-- -------------------------------------------------
CREATE TABLE queue (
    queue_id INT AUTO_INCREMENT PRIMARY KEY,
    reg_id INT,
    queue_number INT,
    status ENUM('waiting','processing','done') DEFAULT 'waiting',
    created_at DATETIME,
    FOREIGN KEY (reg_id) REFERENCES registrations(reg_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 8. medical_records
-- -------------------------------------------------
CREATE TABLE medical_records (
    record_id INT AUTO_INCREMENT PRIMARY KEY,
    reg_id INT,
    height FLOAT,
    weight FLOAT,
    blood_pressure VARCHAR(20),
    pulse INT,
    temperature FLOAT,
    symptoms TEXT,
    notes TEXT,
    created_at DATETIME,
    FOREIGN KEY (reg_id) REFERENCES registrations(reg_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 9. diagnosis
-- -------------------------------------------------
CREATE TABLE diagnosis (
    diag_id INT AUTO_INCREMENT PRIMARY KEY,
    record_id INT,
    icd10 VARCHAR(20),
    diagnosis_name VARCHAR(255),
    notes TEXT,
    FOREIGN KEY (record_id) REFERENCES medical_records(record_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 10. treatments
-- -------------------------------------------------
CREATE TABLE treatments (
    treatment_id INT AUTO_INCREMENT PRIMARY KEY,
    record_id INT,
    treatment_name VARCHAR(255),
    cost DECIMAL(12,2),
    notes TEXT,
    FOREIGN KEY (record_id) REFERENCES medical_records(record_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 11. prescriptions
-- -------------------------------------------------
CREATE TABLE prescriptions (
    prescription_id INT AUTO_INCREMENT PRIMARY KEY,
    record_id INT,
    drug_id INT,
    dosage VARCHAR(100),
    instruction VARCHAR(255),
    quantity INT,
    notes TEXT,
    FOREIGN KEY (record_id) REFERENCES medical_records(record_id),
    FOREIGN KEY (drug_id) REFERENCES drugs(drug_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 12. drugs
-- -------------------------------------------------
CREATE TABLE drugs (
    drug_id INT AUTO_INCREMENT PRIMARY KEY,
    drug_name VARCHAR(150),
    category VARCHAR(100),
    unit VARCHAR(50),
    price DECIMAL(12,2),
    expiration_date DATE,
    stock_minimum INT,
    created_at DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 13. drug_stock
-- -------------------------------------------------
CREATE TABLE drug_stock (
    stock_id INT AUTO_INCREMENT PRIMARY KEY,
    drug_id INT,
    type ENUM('in','out'),
    quantity INT,
    supplier VARCHAR(150),
    batch_number VARCHAR(50),
    date DATE,
    notes TEXT,
    FOREIGN KEY (drug_id) REFERENCES drugs(drug_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 14. transactions
-- -------------------------------------------------
CREATE TABLE transactions (
    trx_id INT AUTO_INCREMENT PRIMARY KEY,
    reg_id INT,
    total_amount DECIMAL(12,2),
    payment_method ENUM('cash','transfer','qris'),
    status ENUM('paid','unpaid') DEFAULT 'unpaid',
    created_at DATETIME,
    FOREIGN KEY (reg_id) REFERENCES registrations(reg_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 15. immunizations
-- -------------------------------------------------
CREATE TABLE immunizations (
    immun_id INT AUTO_INCREMENT PRIMARY KEY,
    child_id INT,
    record_id INT,
    vaccine_name VARCHAR(150),
    vaccine_batch VARCHAR(50),
    immunization_date DATE,
    next_schedule DATE,
    effects TEXT,
    FOREIGN KEY (child_id) REFERENCES patients_child(child_id),
    FOREIGN KEY (record_id) REFERENCES medical_records(record_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 16. reports
-- -------------------------------------------------
CREATE TABLE reports (
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    report_type VARCHAR(100),
    period VARCHAR(50),
    data JSON,
    created_at DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 17. settings
-- -------------------------------------------------
CREATE TABLE settings (
    setting_id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) UNIQUE,
    setting_value TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------
-- 18. audit_logs
-- -------------------------------------------------
CREATE TABLE audit_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action VARCHAR(100),
    target_table VARCHAR(100),
    target_id INT,
    description TEXT,
    created_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;