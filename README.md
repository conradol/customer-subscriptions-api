

# Customer Subscriptions API

  

A API to manager customers subscriptions

  

### Requirements

[PHP >= 7.2](https://www.php.net/manual/en/install.php)

[Docker](https://www.docker.com/get-started)

[Docker Compose](https://docs.docker.com/compose/install/)

[Composer](https://getcomposer.org/doc/00-intro.md)

### Installing

Access the project root path
```
$ cd project_path
```

Install dependencies

```
$ composer install
```
Start docker

```
$ docker-compose up -d
```
Run migrations
```
$ composer phinx migrate
```
Seed DB
```
$ composer phinx seed:run
```
### Running the tests

```
composer test
```

## Endpoints

### Customer
- List customers:
`GET`  `/customer` 
	response: 
    
	```
	[
	  {
	    "id": number,
	    "email": string,
	    "name": string,
	    "birthdate": date,
	    "gender": string,
	    "create_at": timestamp,
	    "updated_at": timestamp
	  }
  ]
  ```
- Edit customer name:
	`PUT` `/customer/{id}/name`
	body: 

	```
	{
	  "name": string
	}
	```
	response: 

	```
	  {
	    "id": number,
	    "email": string,
	    "name": string,
	    "birthdate": date,
	    "gender": string,
	    "create_at": timestamp,
	    "updated_at": timestamp
	  }
	```
	 
- Get customer subscription:
	`GET` `\customer\{id}\subscription`
	response: 
	```
	{
	  "id": number,
	  "customer_id": number,
	  "base_price": number,
	  "total_price": number,
	  "next_order_date": date,
	  "create_at": timestamp,
	  "updated_at": timestamp,
	  "pet": [
	    {
	      "id": number,
	      "subscription_id": number,
	      "name":  string,
	      "weight": number,
	      "gender": string,
	      "lifestage": string,
	      "create_at": timestamp,
	      "updated_at": timestamp
	    }
	  ]
	}
	``` 
### Subscription
- Update next order date:
	`PUT` `subscription/{id}/next-order-date`
	body:
		```
		{ 
			"next_order_date": date
		} 
		```
	response: 
	```
	{
	  "id": number,
	  "customer_id": number,
	  "base_price": number,
	  "total_price": number,
	  "next_order_date": date,
	  "create_at": timestamp,
	  "updated_at": timestamp
	}
	```
- Delete pet:

	`DELETE` `/subscription/{id}/pet/{petId}`
	
	response: `204`
	
- Dispatch subscription now

	`POST` `/subscription/{id}/dispatch`
	
	response: `200`
