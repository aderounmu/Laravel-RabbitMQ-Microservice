
# 👾 Laravel RabbitMQ Microservice

Welcome to my Laravel RabbitMQ Microservice project. This a project created with laravel to showcase how to make Microservice and make them communicate with eachother

It is made up of three parts 

* Admin Service 
* Main Service 
* RabbitMQ
## Requirements

 * [Docker Desktop](https://www.docker.com/products/docker-desktop/)

 * [Laravel](https://laravel.com/docs/9.x)

 * [git](https://git-scm.com/downloads)

 * [Docker](https://docs.docker.com/engine/install/)
  
* [Docker compose](https://docs.docker.com/compose/install/)
## Installation

clone my-project with git

```bash
git clone https://github.com/aderounmu/Laravel-RabbitMQ-Microservice.git

cd aravel-RabbitMQ-Microservice
```

The setup is in this other

Setup laravel with docker on the RabbitMQ
```bash
  cd RabbitMQ
  docker compose up -d  
```

Setup laravel with docker on the admin app

```bash
  cd admin
  docker compose --env-file=.env up -d  --build
```

Setup laravel with docker on the main app

```bash
  cd main
  docker compose --env-file=.env up -d  --build
  
```
Connect main app to redis queue

```bash
  docker compose exec main php artisan queue:work
```

To stop run after all three 
```bash 
docker compose down --volumes

```
## Features

- Product Creation
- Product Viewing
- Product Updating
- Product Deleting

The Admin App only can perform this features expecy viewing products but the main app is notified via rabbitmq when changes occur. Both the Admin and main app can view the products
## API Reference

#### Get all items

```http
  GET /api/products
```



#### Get item

```http
 GET /api/products/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to fetch |


#### Create item

```http
  POST /api/products/
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `title`      | `string` | **Required**. title of item to add |
| `image`      | `string` | **Required**. title of item to add|



#### Update item

```http
  PUT /api/products/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to update |
| `title`      | `string` | **Required**. title of item to update |
| `image`      | `string` | **Required**. title of item to upatde|



#### Delete item

```http
  DELETE /api/products/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to delete|
## Appendix

Any additional information goes here

