

import mysql.connector
import csv

# Kết nối tới MySQL
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="", 
    database="shopalot_eshop"  
)

cursor = db.cursor()

# Truy vấn đơn giản: user_id, product_id từ lịch sử mua hàng
cursor.execute("""
    SELECT orders.user_id, order_details.product_id
    FROM orders
    JOIN order_details ON orders.id = order_details.order_id
""")

rows = cursor.fetchall()

# Ghi ra file CSV
with open('purchase_history.csv', mode='w', newline='') as file:
    writer = csv.writer(file)
    writer.writerow(['user_id', 'product_id'])  # header
    writer.writerows(rows)

print("purchase_history.csv đã được tạo!")
cursor.close()
db.close()
