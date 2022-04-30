# CRUD Заказов

## Получение списка заказов

### `GET: /api/v1/orders`
### Ответ:
```
{
    "status": true,
    "message": "Список заказов получен",
    "data": [
        {
            "order_id": 1,
            "phone": "+7 (991) 999-22-11",
            "fio": "Смирнов Тест Андреевич",
            "address": "г. Иваново, ул. Петрозаводская, д. 4",
            "sum": 1990,
            "created_at": "30-04-2022 14:49"
        },
        {
            "order_id": 2,
            "phone": "+7 (995) 888-11-33",
            "fio": "Петров Василий Васильевич",
            "address": "г. Кострома, ул. Революционная, д. 4",
            "sum": 19590.99,
            "created_at": "30-04-2022 15:29"
        },
        ...
    ]
}
```
## Добавление заказа

### `POST: /api/v1/orders/add`
### Параметры
```
(string|requaired) phone
(string|requaired) fio
(string|requaired) address
(numeric|requaired) sum
```
### Ответ:
```
{
    "status": true,
    "message": "Заказ успешно добавлен"
}
```

## Редактирование заказа

### `POST: /api/v1/orders/edit/{id}`
### Параметры
```
URL params: {id} - order_id заказа

(string|requaired) phone
(string|requaired) fio
(string|requaired) address
(numeric|requaired) sum
```
### Ответ:
```
{
    "status": true,
    "message": "Заказ успешно отредактирован"
}
```
## Получение заказа

### `GET: /api/v1/orders/show/{id}`
### Параметры
```
URL params: {id} - order_id заказа
```
### Ответ:
```
{
    "status": true,
    "message": "Заказ успешно получен",
    "data": {
        "order_id": 2,
        "phone": "+7 (995) 888-11-33",
        "fio": "Петров Василий Васильевич",
        "address": "г. Кострома, ул. Революционная, д. 4",
        "sum": 19590.99,
        "created_at": "30-04-2022 15:33"
    }
}
```
