# Page Generator
Application to generate personal page with qrcode link. Buzzvel Skill Test
## Story
João is tired of using business cards for his business. He liked having a picture on
his phone so that people scanning it could see all their data on one page.
Your goal is to create a tool that helps João solve his problem in a simple way.

## Install project
- Pull Laravel/php project from git provider.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Configure database connection variables	
		```
        DB_CONNECTION=mysql
        DB_HOST=mysql
        DB_PORT=3306
        DB_DATABASE=buzzvel-skills-tests
        DB_USERNAME=sail
        DB_PASSWORD=password
		```  
- Open the console and cd your project root directory
- Run `composer install` 
- Run `./vendor/bin/sail up -d`
- Run `./vendor/bin/sail php artisan key:generate` 
- Run `./vendor/bin/sail php artisan migrate`
- Run `./vendor/bin/sail php artisan db:seed` to run seeders, if any.
- Run `./vendor/bin/sail php artisan serve`
- You can now access your project at localhost:80

## Run Tests
-Run `./vendor/bin/sail php artisan test` or `./vendor/bin/sail artisan test`

## Routes
<details open>
<summary>/generate/</summary>
<p>
Main Page
</p>
</details>

<details open>
<summary>/generate/</summary>
<p>
Page that generates the QR Code with URL
</p>
</details>

<details open>
<summary>/qrcode/</summary>
<p>
Page that redirects from QR Code URL to John's page
</p>
</details>

<details open>
<summary>/page/{slug}</summary>
<p>
John's page
</p>
</details>

### Api

<details open>
<summary>[GET] /pages/{slug}</summary>
<p>
API que retorna todas as páginas
</p>
</details>

