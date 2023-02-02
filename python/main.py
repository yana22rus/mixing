from flask import Flask, render_template, request
import sqlite3

app = Flask(__name__)

languages = ["python", "php", "node", "java", "golang"]

file = "/home/qwe/Documents/mixing/Data.db"


@app.route("/")
def index():
    return render_template("index.htm", languages=languages)


@app.route("/python", methods=["GET", "POST"])
def python():
    if request.method == "POST":
        if request.form["submit"] == "Сохранить":
            data = request.form["city"]

            with sqlite3.connect(file) as con:
                cur = con.cursor()

                cur.execute("INSERT INTO Data (city) VALUES  (?)", (data,))

        if request.form["submit"] == "Удалить":
            delete(request.form.get("id"))

    with sqlite3.connect(file) as con:
        cur = con.cursor()
        cur.execute('SELECT * FROM Data')
        lst_city = cur.fetchall()

    return render_template("crud.htm", lst_city=lst_city)


@app.route("/delete/<int:entity_id>", methods=["POST"])
def delete(entity_id):
    with sqlite3.connect(file) as con:
        cur = con.cursor()
        cur.execute("DELETE FROM Data WHERE id = ?", (entity_id,))


if __name__ == "__main__":
    app.run(debug=True)
