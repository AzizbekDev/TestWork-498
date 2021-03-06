
# TestWork 498
This project on Laravel (REST API), only Backend!



## For this project, you need to implement the following list of tasks.

- The project contains a database of two tables with a many-to-many relationship;
- Working with the database should be done through the repository pattern;
- It is necessary to implement simple authentication through a key (using additional packages passport, jwt etc);
- The API should provide data access with the ability to sort and search across multiple fields;
- When working with data, you must use the pivot attribute for models and include it in search queries.


## API Reference

#### Register User

```http
  POST /api/auth/register
```
***Params***
| Parameter   | Type     | Description                |
| :-----------| :------- | :------------------------- |
| `name`      | `string` | **Required**.              |
| `email`     | `string` | **Required**, **Unique**   |
| `password`  | `string` | **Required**.              |
| `c_password`| `string` | **Required**.              |

#### Login User

```http
  POST /api/auth/login
```
***Params***
| Parameter   | Type     | Description                |
| :---------- | :------- | :------------------------- |
| `email`     | `string` | **Required**, **Unique**   |
| `password`  | `string` | **Required**.              |

#### Get User

```http
  POST /api/auth/me
```  
***Headers***
| Key            | Value                            |
| :------------- | :------------------------------- |
| `Authorization`| `Bearer eyJ0eXAiOiJKV1QiLCJhb...`|
| `Accept`       | `application/json`               |

#### Get User All Addresses
```http
  GET /api/addresses
```
***Headers***
| Key            | Value                            |
| :------------- | :------------------------------- |
| `Authorization`| `Bearer eyJ0eXAiOiJKV1QiLCJhb...`|
| `Accept`       | `application/json`               |

#### Get User Default Address
```http
  GET /api/addresses
```
***Headers***
| Key             | Value                           |
| :------------- | :------------------------------- |
| `Authorization`| `Bearer eyJ0eXAiOiJKV1QiLCJhb...`|
| `Accept`       | `application/json`               |

***Params***
| Parameter   | Type     | Description          |
| :---------- | :------- | :------------------- |
| `default`   | `boolean`| Value **False/True**.|


#### Store User Address
```http
  POST /api/addresses
```
***Headers***
| Key            | Value                            |
| :------------- | :------------------------------- |
| `Authorization`| `Bearer eyJ0eXAiOiJKV1QiLCJhb...`|
| `Accept`       | `application/json`               |

***Params***
| Parameter    | Type     | Description                           |
| :----------- | :------- | :------------------------------------ |
| `name`       | `string` | **Required**.                         |
| `city`       | `string` | **Required**.                         |
| `postal_code`| `string` | **Required**.                         |
| `country_id` | `intager`| **Required**, **Exists:countries,id** |
| `default`    | `boolean`| **Nullable**.                         |

#### Get Countries List

```http
  GET /api/countries
```
## Deployment
First run this commands:
```bash
 git clone https://github.com/AzizbekDev/TestWork-498.git 
 cd TestWork-498
 composer install
```
Second create enivorment file
```bash
 cp .env.example .env
 php artisan key:generate
```
Next setup database settings
```md
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Next run this commands
```bash
 php artisan migrate --seed
 php artisan passport:install
```
Finaly serve the server
```bash
 php artisan serve
```
