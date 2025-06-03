-- MySQL Complete Reference Guide
-- ==============================

-- ===================================
-- DATABASE MANAGEMENT
-- ===================================

-- Create database
CREATE DATABASE myDB;

-- Use database
USE myDB;

-- Drop database
DROP DATABASE myDB;

-- Make database read-only
ALTER DATABASE myDB READ ONLY = 1;


-- ===================================
-- TABLE OPERATIONS
-- ===================================

-- Create table with various data types
CREATE TABLE employees (
    employee_id INT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    hourly_pay DECIMAL(5, 2),
    hire_date DATE
);

-- Select all data from table
SELECT * FROM employees;

-- Rename table
RENAME TABLE employees TO workers;

-- Add new column to table
ALTER TABLE employees ADD phone_number VARCHAR(15);

-- Rename column
ALTER TABLE employees RENAME COLUMN phone_number TO email;

-- Modify column data type
ALTER TABLE employees MODIFY COLUMN email VARCHAR(100);

-- Move column position - after specific column
ALTER TABLE employees MODIFY email VARCHAR(100) AFTER last_name;

-- Move column to first position
ALTER TABLE employees MODIFY email VARCHAR(100) FIRST;

-- Drop column
ALTER TABLE employees DROP COLUMN email;


-- ===================================
-- DATA MANIPULATION (CRUD)
-- ===================================

-- INSERT DATA
-- -----------

-- Insert single row with all columns
INSERT INTO employees VALUES (1, "Eugene", "Krabs", 25.50, "2023-01-02");

-- Insert multiple rows at once
INSERT INTO employees VALUES 
    (2, "SpongeBob", "SquarePants", 15.00, "2023-01-03"),
    (3, "Squidward", "Tentacles", 18.50, "2023-01-04"),
    (4, "Patrick", "Star", 12.00, "2023-01-05");

-- Insert row with only specific columns
INSERT INTO employees (employee_id, first_name, last_name)
VALUES (6, "Sheldon", "Plankton");

-- SELECT DATA
-- -----------

-- Select specific columns
SELECT first_name, last_name FROM employees;

-- Select all columns
SELECT * FROM employees;

-- Select with WHERE conditions
SELECT * FROM employees WHERE employee_id = 1;
SELECT * FROM employees WHERE hourly_pay > 15;
SELECT * FROM employees WHERE employee_id != 1;
SELECT * FROM employees WHERE hire_date IS NULL;

-- UPDATE DATA
-- -----------

-- Update multiple columns for specific record
UPDATE employees SET hourly_pay = 10.25, hire_date = "2023-01-07" WHERE employee_id = 1;

-- Update with NULL value
UPDATE employees SET hourly_pay = 10.25, hire_date = NULL WHERE employee_id = 2;

-- DELETE DATA
-- -----------

-- Delete specific record
DELETE FROM employees WHERE employee_id = 6;


-- ===================================
-- CONSTRAINTS & DEFAULT VALUES
-- ===================================

-- UNIQUE CONSTRAINT
-- -----------------

-- Create table with UNIQUE constraint
CREATE TABLE products (
    product_id INT,
    product_name VARCHAR(25) UNIQUE,
    price DECIMAL(4, 2)
);

-- Add UNIQUE constraint to existing table
ALTER TABLE products ADD CONSTRAINT UNIQUE(product_name);

-- NOT NULL CONSTRAINT
-- -------------------

-- Create table with NOT NULL constraint
CREATE TABLE products (
    product_id INT,
    product_name VARCHAR(25),
    price DECIMAL(4, 2) NOT NULL
);

-- Modify existing column to add NOT NULL
ALTER TABLE products MODIFY price DECIMAL(4, 2) NOT NULL;

-- CHECK CONSTRAINT
-- ----------------

-- Create table with CHECK constraint
CREATE TABLE employees (
    employee_id INT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    hourly_pay DECIMAL(5, 2),
    hire_date DATE,
    CONSTRAINT chk_hourly_pay CHECK (hourly_pay >= 10.00)
);

-- Add CHECK constraint to existing table
ALTER TABLE employees ADD CONSTRAINT chk_hourly_pay CHECK(hourly_pay >= 10.00);

-- Drop CHECK constraint
ALTER TABLE employees DROP CHECK chk_hourly_pay;

-- DEFAULT VALUES
-- --------------

-- Create table with DEFAULT constraint
CREATE TABLE products (
    product_id INT,
    product_name VARCHAR(25),
    price DECIMAL(4, 2) DEFAULT 0.00
);

-- Add DEFAULT to existing column
ALTER TABLE products ALTER price SET DEFAULT 0;


-- ===================================
-- TRANSACTION CONTROL
-- ===================================

-- Turn off autocommit (manual transaction control)
SET AUTOCOMMIT = OFF;

-- Commit changes
COMMIT;

-- Rollback to previous savepoint
ROLLBACK;


-- ===================================
-- DATE & TIME FUNCTIONS
-- ===================================

-- Create table with date/time columns
CREATE TABLE test (
    my_date DATE,
    my_time TIME,
    my_datetime DATETIME
);

-- Insert current date and time
INSERT INTO test VALUES(CURRENT_DATE(), CURRENT_TIME(), NOW());

-- Date arithmetic - add/subtract days
INSERT INTO test VALUES(CURRENT_DATE() + 1, CURRENT_TIME(), NOW());
INSERT INTO test VALUES(CURRENT_DATE() - 1, CURRENT_TIME(), NOW());


-- ===================================
-- UNIONS
-- ===================================

-- Combine data from multiple tables
SELECT * FROM income UNION SELECT * FROM expenses;

-- Union with specific columns
SELECT first_name, last_name FROM employees 
UNION 
SELECT first_name, last_name FROM customers;


-- ===================================
-- SELF JOINS
-- ===================================

-- Basic self join
SELECT * FROM customers AS a 
INNER JOIN customers AS b 
ON a.referral_id = b.customer_id;

-- Self join with column aliases and concatenation
SELECT 
    a.customer_id,
    a.first_name,
    a.last_name,
    CONCAT(b.first_name, " ", b.last_name) AS "referred_by"
FROM customers AS a
INNER JOIN customers AS b
ON a.referral_id = b.customer_id;

-- Self join with LEFT JOIN (shows all customers)
SELECT 
    a.customer_id,
    a.first_name,
    a.last_name,
    CONCAT(b.first_name, " ", b.last_name) AS "referred_by"
FROM customers AS a
LEFT JOIN customers AS b
ON a.referral_id = b.customer_id;