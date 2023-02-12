// получаем модуль Express
const express = require('express')
const path = require("path");
// создаем приложение
const app = express()

app.set('views', path.join(__dirname, "views"))
app.set("views engine", "twig")
// устанавливаем обработчик для маршрута "/"
app.get('/', function (request, response) {

    languages = ["python", "php", "node", "java", "golang"]

    response.render('index.html.twig', {languages: languages})
})
app.get('/node', function (request, response) {
    response.end('crud')
})
// начинаем прослушивание подключений на 3000 порту
app.listen(5002)
