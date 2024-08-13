# Senior PHP Developer Assignment


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

### 3. Transaction Categorization

- Implement a service to categorize transactions:
- If the transaction is a `Credit` and the amount is greater than $10,000, trigger a notification to the finance team.
- If the transaction is a `Debit` and the amount is less than $500, apply a discount of 0.5% to the calculated fee.

### 5. Save Transactions to MySQL

- Save the processed transactions, including the calculated fees, to a MySQL database.
