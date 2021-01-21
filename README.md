
# Blank Slate MVC
This is my own very streamline bare bones MVC framework. This was mostly for a learning project but it can also be used for my own simple API projects for a quick-start.

The framework provides basic MVC architecture and functionality. 

## Getting Started
If you would like to contribute you can get started with this project by following these instructions:  
1. Clone the repo
```sh
git clone https://github.com/GeorgeBetts/Blank-Slate-MVC.git
```
2. Copy the ENV file
```sh
cp /app/config/env.example.php /app/config/env.php
```

## Lifecycle
Your web server should serve the public folder, a `.htcaccess` file here will redirect all requests to the public `index.php` file.

The `index.php` file bootstraps all the needed framework libraries, such as the classes for Controllers, Database and Models.

The `Core.php` reads the URL and splits this by Controller, Method and Parameters. This will then call the neccessery controller file, which wil in turn utilise the Model and Database classes to complete the request.

```
http://localhost/controller/method/parameters
```