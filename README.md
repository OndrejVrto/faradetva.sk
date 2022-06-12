<p align="center">
	<a href="https://faradetva.sk" target="_blank">
		<img src="https://github.com/OndrejVrto/faradetva.sk/blob/main/public/images/logo/logo-farnosti-detva.svg?raw=true" width="200">
	</a>
</p>

# ⛪ Website and CMS for the [parish Detva](https://faradetva.sk) in Slovakia

The site is created as part of my learning the Laravel framework.

I tried to implement as many packages as possible and try as many ways of writing code as possible, because it is better to try once than to see 100 times.

The to-do list is never empty.
## 🧔 About me
**I like learning. I like programming. I'm a mechanical engineer, but I want to be a developer. But something needs to be done. That's why I'm doing this project.**

You can find out more about me on my [personal page](https://ondrejvrto.eu/).

## 🧪 Examples
#### Dashboard
![dashboard](https://github.com/OndrejVrto/faradetva.sk/blob/main/storage/demo/dashboard.jpg?raw=true)

#### Sample form
![dashboard](https://github.com/OndrejVrto/faradetva.sk/blob/main/storage/demo/sample-form.jpg?raw=true)

#### Sample list
![dashboard](https://github.com/OndrejVrto/faradetva.sk/blob/main/storage/demo/sample-list-item.jpg?raw=true)

#### Sample of front page
![dashboard](https://github.com/OndrejVrto/faradetva.sk/blob/main/storage/demo/sample-front-page.jpg?raw=true)

---
# Install application to local server in Windows
- This application needs the following services to work properly.
	- Apache server with SSL
	- MySql 8
	- php 8.0.2
	- Http2 protokol
	- MeiliSearch
- Optional:
	- Slack webhook for logging
	- MailTrap.io for mail traping
	- google.maps api key if wish nice maps

## Installation
01. I'am work in Windows. Local development needs software. Best solution for me is [Laragon](https://laragon.org).
	- instal [Laragon](https://laragon.org) in to directory `C:/` and run it **as administrator**.
	- download [php 8.0.2](https://windows.php.net/download#php-8.0) and unpack to Laragon directory `c:\laragon\bin\php\`. Set php version in Laragon to this version.
	- download [MySql 8.0.x](https://dev.mysql.com/downloads/mysql) and unpact to Laragon directory `c:\laragon\bin\mysql\`. Set MySql version in Laragon to this version.
	- enable SSL on Apache. Click to `laragon -> Menu -> Apache -> SSL -> enabled`
	- settings HTTP2. Click to `laragon -> Menu -> Apache -> SSL -> httpd-ssl.conf` and edit him.
		```
			Listen 443
			Protocols h2 h2c http/1.1
			SSLCipherSuite HIGH:MEDIUM:!MD5:!RC4
			SSLProxyCipherSuite HIGH:MEDIUM:!MD5:!RC4
			SSLHonorCipherOrder on 
			SSLProtocol all -SSLv3
			SSLProxyProtocol all -SSLv3
			SSLSessionCache `shmcb:logs/ssl_scache(512000)`
			SSLSessionCacheTimeout  300
		``` 
	- reload Laragon

02. download repository in zip and unpack or clone repository `https://github.com/OndrejVrto/faradetva.sk.git` to directory `c:/laragon/www/faradetva.test`

03. Run database manager in Laragon. [HeidiSQL](https://www.heidisql.com/) is super. Create user and database.
    
	```
		Example:
			collation:  utf8mb4_slovak_ci
			name: faradetva.test
			user: CustomUserName
			pass: CustomPassword123
	```

04. Change database settings in `.env` file
	```
    	Example:
        	DB_DATABASE=`faradetva.test`
        	DB_USERNAME=CustomUserName
        	DB_PASSWORD=CustomPassword123
	```

05. Run your favorite command prompt. I prefer [CmDer](https://conemu.github.io)

06. Change workspace path to work directory
	```cmd
	cd c:/laragon/www/faradetva.test
	```

07. Copy example enviroment file to work version
	```cmd
	copy .env.example .env
	```

08. Install php packages
	```cmd
	composer install
	```

09. Install JS packages
	```cmd
	npm install
	```
10. Mix js and css files to production
	```cmd
	npm run prod
	```
11. Create Aplication key
	```cmd
	php artisan key:generate
	```
12. Copy `demo-data-faradetva-test.zip` from main [private google disk storage](https://drive.google.com/file/d/1A0iw5Jnj-wConGHdfYwH6JAjOAwn-U1_/view?usp=sharing)
	- I don't want to version this data via git, but without it the application won't run. 
	- MIT license does not apply to this content

13. Unpack and rewrite directories `Storage` and `Database` in root path from `demo-data-faradetva-test.zip`

14. Create tables in database with demo data
	```cmd
	php artisan migrate:fresh --seed
	```

15. Create storage symbolic link
	```cmd
	php artisan storage:link
	```

16. Refresh Laravel Health Checks
	```cmd
	php artisan health:check
	```

17. Create index for MeiliSearch in page
	```cmd
	php artisan site-search:create-index
	```
	- `name:` HTTPS_FaraDetva
	- `url to crawl:` `https://faradetva.test

18. Create separate terminal/promt nr.2
	```cmd
	meilisearch.exe
	```

19. Create separate terminal/promt nr.3
	```cmd
	php artisan queue:work
	```

20. Run crawler for search
	```cmd
	php artisan site-search:crawl
	```

21. Create separate terminal/promt nr.4 for Schedule (CRON)
	```cmd
	php artisan schedule:work
	```

22. In browser go to [https://faradetva.test](https://faradetva.test)

### Congratulations. 🏆 You did it!

## Notes
- check your MeiliSerch service in [http://127.0.0.1:7700](http://127.0.0.1:7700)
- To use SLACK logging you must enter your address in the LOG_SLACK_WEBHOOK_URL variable in the .env file
- To use google maps you need to insert your key into GOOGLE_MAP_API_KEY in an .env file

# 🍕 Contributing

Thank you for considering contributing to this repository!

# 🛡️ Security Vulnerabilities

If you discover a security vulnerability, please send an e-mail to Ondrej Vrťo via [ondrej.vrto@gmail.com](mailto:ondrej.vrto@gmail.com).

# 📖 License

This code in this page is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
