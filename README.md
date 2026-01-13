# Roles & Permissions Microservice

# Setup
- composer install
- php artisan migrate
- php artisan serve

# Authentication of users to get token
POST /api/login

# Roles to create and view
POST /api/roles
GET /api/roles

# Permissions to create and view
POST /api/permissions
GET /api/permissions

# Assign permission to roles and roles to users
POST /api/roles/{role_id}/permissions
POST /api/users/{user_id}/roles

# Authorize to check is valid or not
POST /api/authorize
