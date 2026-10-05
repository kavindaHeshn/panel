CREATE DATABASE panel_wiring_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE panel_wiring_db;

CREATE TABLE panel_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- MCCB
    mccb_qty INT NOT NULL DEFAULT 0,
    mccb_poles VARCHAR(10) NOT NULL,
    mccb_amp VARCHAR(10) NOT NULL,
    
    -- RCCB
    rccb_qty INT NOT NULL DEFAULT 0,
    rccb_poles VARCHAR(10) NOT NULL,
    rccb_amp VARCHAR(10) NOT NULL,
    
    -- MCB
    mcb_qty INT NOT NULL DEFAULT 0,
    mcb_poles VARCHAR(10) NOT NULL,
    mcb_amp VARCHAR(10) NOT NULL,
    
    -- Other components
    changeover TINYINT(1) NOT NULL DEFAULT 0,
    pfr TINYINT(1) NOT NULL DEFAULT 0,
    ct INT NOT NULL DEFAULT 0,
    fuse INT NOT NULL DEFAULT 0,
    indicators INT NOT NULL DEFAULT 0,
    
    -- Extra useful fields
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);