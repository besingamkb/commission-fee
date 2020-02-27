# Commission Fee Usage

Run the script with the parameter csv file.

The CSV file parameters should an absolute file path or else it couldn't file it.

CSV file should follow the format below without.

```csv
2014-12-31,4,natural,cash_out,1200.00,EUR
2015-01-01,4,natural,cash_out,1000.00,EUR
2016-01-05,4,natural,cash_out,1000.00,EUR
2016-01-05,1,natural,cash_in,200.00,EUR
```

 - For **[0]** is the date
 - then **[1]** is the user ID
 - then **[2]** is the UserType
 - then **[3]** is the OperationType
 - then **[4]** is the amount
 - finally **[5]** is the currency
 
 CSV file shouldn't have a header on the first row

`php script.php input.csv`