# Roles & Permissions Microservice

# Setup
- composer install
- Change the database name in the .env file according to the locally created database.
- php artisan migrate
- php artisan serve

# Prefilled users table
| Name       | Email              | Password |
| -----------| -------------------| -------- |
| Admin      | admin@mail.com     | 12345678 |
| Editor     | editor@mail.com    | 12345678 |
| Approver   | approver@mail.com  | 12345678 |
| Viewer     | viewer@mail.com    | 12345678 |

# Authentication of users to get token
POST /api/login
Parameter
{
  "email": "admin@mail.com",
  "password": "12345678"
}

# Roles to create and view
POST /api/roles
Parameter
{
  "name": "admin"
}

GET /api/roles

# Permissions to create and view
POST /api/permissions
Parameter
{
  "name": "document.create"
}

GET /api/permissions

# Assign permission to roles and roles to users
POST /api/roles/{role_id}/permissions
Parameter
{
  "permission_ids": [1, 2, 3]
}

POST /api/users/{user_id}/roles
Parameter
{
  "role_ids": [1]
}

# Authorize to check is valid or not
POST /api/authorize
Parameter
{
  "token": "USER_API_TOKEN",
  "permission": "document.create"
}
