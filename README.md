# teedlee.ph
Teedlee Arts Inc, Web Development Repository

Teedlee is a lorem ipsum dolor sit amet.

### Version
Beta 0.2

### Installation

Project requires:
- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- [Node.js](https://nodejs.org/)
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [Bower](https://bower.io/)


Depending on your operating system install the dependencies before proceeding to the next step.

### Project Setup 

1. Fetch the project codes
   ```sh
   $ git clone https://github.com/karenbanzon/teedlee.git
   ```
2. Configure the project
   ```sh
   $ cd teedlee
   $ nano .env
   ```
3. Modify the content based on your environment settings.   
4. IMPORTANT: Add .env to gitignore. Do not commit file to remote repo.
5. Create a database and set necessary permissions.
6. Run database migrations.
   ```sh
   $ php artisan migrate
   $ php artisan db:seed
   ```
 7. Navigate browse to your project's URL.