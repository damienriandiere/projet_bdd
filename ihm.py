from flask import Flask, render_template, request, jsonify
import pymysql

app = Flask(__name__)
db = pymysql.connect(host='localhost', user='root', password = 'password', db = 'my_db')

@app.route('/')
def index():
    return ""

@app.route('/items', methods=['GET'])
def get_items():
    with db.cursor() as cursor:
        sql = "SELECT * FROM items"
        cursor.execute(sql)
        items = cursor.fetchall()
    return jsonify(items)

@app.route('/items', methods=['POST'])
def add_item():
    name = request.form['name']
    description = request.form['description']
    with db.cursor() as cursor:
        sql = "INSERT INTO items (name, description) VALUES (%s, %s)"
        cursor.execute(sql, (name, description))
        db.commit()
    return 'Item added successfully'

@app.route('/items/<int:item_id>', methods=['PUT'])
def update_item(item_id):
    name = request.form['name']
    description = request.form['description']
    with db.cursor() as cursor:
        sql = "UPDATE items SET name=%s, description=%s WHERE id=%s"
        cursor.execute(sql, (name, description, item_id))
        db.commit()
    return 'Item updated successfully'

@app.route('/items/<int:item_id>', methods=['DELETE'])
def delete_item(item_id):
    with db.cursor() as cursor:
        sql = "DELETE FROM items WHERE id=%s"
        cursor.execute(sql, (item_id,))
        db.commit()
    return 'Item deleted successfully'

if __name__ == '__main__':
    app.run(debug = True)