<p align="center">
	<a href="https://faradetva.sk" target="_blank">
		<img src="https://github.com/OndrejVrto/faradetva.sk/blob/main/public/images/logo/logo-farnosti-detva.svg?raw=true" width="300">
	</a>
</p>

# ⛪ <span style="color: orange;">Website and CMS for the [parish Detva](https://faradetva.sk) in Slovakia</span>

The [site](https://faradetva.sk) is created as part of my learning the Laravel framework.

I tried to implement as many packages as possible and try as many ways of writing code as possible, because it is better to try once than to see 100 times.

## 🧔 <span style="color: orange;">About author</span>
**I like learning. I like programming. I'm a mechanical engineer, but I want to be a developer. But something needs to be done. That's why I'm doing this project.**

You can find out more about me on my [personal page](https://ondrejvrto.eu/).

## 🛠️ <span style="color: orange;">What can this application do?</span>
#### <span style="color: green;">Generaly</span>
* custom CMS system for pages
* 25 various models
* perfect image cropper with size lock function, optimization and automatic file renaming before uploading to the server
* responsive images
* purify html in local mode / minimalize html in production mode
* permission and roles for users with super-administrator role
* inpersonate user
* custom log for SQL Queries
* automatic temp directory cleaning
* checkboxes to change settings located on the dashboard
* custom Content Security Policy
* custom health checks
* response cache for entire pages and queries
* crawler full page search into MailiSearch

#### <span style="color: green;">Design and SEO</span>
* nice template for web and administration
* custom Booststrap css variable for Mix
* nice charts
* perfect Schema Markup for SEO
* several custom RSS feeds
* custom Sitemap

#### <span style="color: green;">Used</span>
* many own validation rules, traits, services, facades, enums and commands
* one DB table for multiple similar models
* several polymorphic tables for one model
* many own blade components
* autolink generator with purify for some inputs
* subscribers using email
* nesting controller
* schedule and queue functionality enabled

and much more ....

<span style="color: cyan;">The TODO list is never empty.</span>

Take a look at the web result https://faradetva.sk or [install this application](#install) on your computer.

## 🧪 <span style="color: orange;">Examples screenshots</span>
#### <span style="color: green;">Dashboard for super-administrator
![dashboard](https://github.com/OndrejVrto/faradetva.sk/blob/main/storage/demo/dashboard.jpg?raw=true)

####  <span style="color: green;">Sample form (page)</span>
![dashboard](https://github.com/OndrejVrto/faradetva.sk/blob/main/storage/demo/sample-form.jpg?raw=true)

####  <span style="color: green;">Sample list (pictures)</span>
![dashboard](https://github.com/OndrejVrto/faradetva.sk/blob/main/storage/demo/sample-list-item.jpg?raw=true)

####  <span style="color: green;">Sample of front page</span>
![dashboard](https://github.com/OndrejVrto/faradetva.sk/blob/main/storage/demo/sample-front-page.jpg?raw=true)

---
# <span id="install" style="color: orange;"> 📌 Install this application to local server in Windows</span>
* <span style="color: green;">This application needs the following services to work properly.</span>
	* Apache server with SSL and enabled Http2 protocol
	* MySql 8.0
	* php 8.1
	* MeiliSearch
* <span style="color: green;">Optional:</span>
	* Slack webhook for logging
	* MailTrap.io for mail traping
	* google.maps api key if wish nice maps

## 🧾 <span style="color: orange;">Installation</span>
01. I'am work in Windows. Local development needs software. Best solution for me is [Laragon](https://laragon.org).
	- instal [Laragon](https://laragon.org) in to directory `C:/` and run it **as administrator**.
	- download [php 8.1](https://windows.php.net/download#php-8.1) and unpack to Laragon directory `c:\laragon\bin\php\`. Set php version in Laragon to this version.
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

07. Change branch in project to `DEMO`
	```cmd
	git checkout DEMO
	```

08. Copy example enviroment file to work version
	```cmd
	copy .env.example .env
	```

09. Install php packages
	```cmd
	composer install
	```

10. Install JS packages
	```cmd
	npm install
	```
11. Mix js and css files to production
	```cmd
	npm run prod
	```
12. Create Aplication key
	```cmd
	php artisan key:generate
	```
13. Copy `demo-data-faradetva-test.zip` from main [private google disk storage](https://drive.google.com/drive/folders/1XJDhf14HkVtQsQR-2nKiGBkNFI1NoVFI?usp=sharing)
	- I don't want to version this data via git, but without it the application won't run. 
	- MIT license does not apply to this content

14. Unpack and rewrite directories `Storage` and `Database` in root path from `demo-data-faradetva-test.zip`

15. Create tables in database with demo data
	```cmd
	php artisan migrate:fresh --seed
	```

16. Create storage symbolic link
	```cmd
	php artisan storage:link
	```

17. Refresh Laravel Health Checks
	```cmd
	php artisan health:check
	```

18. Create index for MeiliSearch in page
	```cmd
	php artisan site-search:create-index
	```
	name: `HTTPS_FaraDetva`
	
	url to crawl: `https://faradetva.test`

19. Create separate terminal/promt nr.2
	```cmd
	meilisearch.exe
	```

20. Create separate terminal/promt nr.3
	```cmd
	php artisan queue:work
	```

21. Run crawler for search
	```cmd
	php artisan site-search:crawl
	```

22. Create separate terminal/promt nr.4 for Schedule (CRON)
	```cmd
	php artisan schedule:work
	```

23. In browser go to [https://faradetva.test](https://faradetva.test)

<span style="color: green; font-size: 24px">Congratulations. 🏆 You did it!</span>

### <span style="color: cyan;">Notes</span>
- check your MeiliSerch service in [http://127.0.0.1:7700](http://127.0.0.1:7700)
- To use SLACK logging you must enter your address in the LOG_SLACK_WEBHOOK_URL variable in the .env file
- To use google maps you need to insert your key into GOOGLE_MAP_API_KEY in an .env file

# 🍕 <span style="color: orange;">Contributing</span>

Thank you for considering contributing to this repository!

# 🛡️ <span style="color: orange;">Security Vulnerabilities</span>

If you discover a security vulnerability, please send an e-mail to Ondrej Vrťo via [ondrej.vrto@gmail.com](mailto:ondrej.vrto@gmail.com).

# 📖 <span style="color: orange;">License</span>

This code in this page is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
