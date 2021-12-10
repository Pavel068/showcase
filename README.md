# API

## Register

### Request
#### POST http://127.0.0.1:8000/api/auth/register
Body
````
name:Pavel
email:qwe@qwe.ru
password:123456
````

### Response (201)
````
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9yZWdpc3RlciIsImlhdCI6MTYzOTE3MTI3OCwibmJmIjoxNjM5MTcxMjc4LCJqdGkiOiJQNGRCMEhIN3lnRm84VjRqIiwic3ViIjo0LCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.6TKfkmXtnigr7c2ELEdnVZ1ys-CQGjGZ2XwytiNdsYg",
    "token_type": "bearer",
    "data": {
        "id": 4,
        "name": "Pavel",
        "email": "qwe@qwe.ru",
        "email_verified_at": null,
        "role": "customer",
        "wallet": null,
        "balance": null,
        "parent_id": null,
        "created_at": "2021-12-10T21:21:18.000000Z",
        "updated_at": "2021-12-10T21:21:18.000000Z"
    }
}
````

## Login

### Request
#### POST http://127.0.0.1:8000/api/auth/login
Body
````
email:qwe@qwe.ru
password:123456
````

### Response (200)
````
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzOTE3MTQ0NywibmJmIjoxNjM5MTcxNDQ3LCJqdGkiOiI4VFpDWlg5UWFBOHdWQ0VUIiwic3ViIjo0LCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-fya-Vx8lIgIZKOcxX6ywFuYQBzTIfIFWroO_5f2EYw",
    "token_type": "bearer",
    "data": {
        "id": 4,
        "name": "Pavel",
        "email": "qwe@qwe.ru",
        "email_verified_at": null,
        "role": "customer",
        "wallet": null,
        "balance": null,
        "parent_id": null,
        "created_at": "2021-12-10T21:21:18.000000Z",
        "updated_at": "2021-12-10T21:21:18.000000Z"
    }
}
````

## Get Me
### Request
#### GET http://127.0.0.1:8000/api/auth/me
#### Authorization: Bearer

### Response (200)
````
{
    "success": true,
    "data": {
        "id": 4,
        "name": "Pavel",
        "email": "qwe@qwe.ru",
        "email_verified_at": null,
        "role": "customer",
        "wallet": null,
        "balance": null,
        "parent_id": null,
        "created_at": "2021-12-10T21:21:18.000000Z",
        "updated_at": "2021-12-10T21:21:18.000000Z"
    }
}
````

## Logout
### Request
#### DELETE http://127.0.0.1:8000/api/auth/logout
#### Authorization: Bearer

### Response (204)
````
````

