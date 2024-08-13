# Senior PHP Developer Code Review

## Scenario:
You'll be reviewing a financial application that processes transactions from bank statement files uploaded via REST. 
Each transaction needs to be read from a file, processed to calculate the associated fee based on given criteria and then saved to a MySQL database.

## Requirements

### 1. Read Transactions from CSV

- Implement a feature that reads transactions from a CSV file. Each transaction includes:
  - `transaction_id`
  - `date`
  - `amount`
  - `currency`
  - `type` (either `Credit` or `Debit`)
  - `account_id`

### 2. Calculate Fees

- Implement a service to calculate fees based on the transaction type:
  - **Credit:** Charge a fee of 1.5% of the transaction amount.
  - **Debit:** Charge a fee of 1.0% of the transaction amount.

### 3. Save Transactions to MySQL
- Save the processed transactions, including the calculated fees, to a MySQL database.
