# Scode-Cli

Command Line Application for scode.

Scode-Cli creates a php mvc webapp that you can modify, make your own and upload to your webserver.

## Creater/ Maintainer

=> ScorpioCoding  
=> Design, Development, DevOps  
=> [website](https://scorpiocoding.com)

## Scode

ScorpioCoding Homegrown Standalone Php Mvc Application - Scode

Scode is a fully standalone functional webapp that you can modify to create beautifull standalone websites.
From Single Page Applications (SPA) to full blown Backend Data Driven Applications (Blogs, Ecommerce).

### Current options

- scode-core
  - The core application
- scode-core-docker
  - The core application for Docker
- scode-core-docker-gulp
  - The core appllication for Docker with gulp automation.
  - Automated folder relocation
  - Automated Javascript and Sass
- scode-core-docker-gulp-mysql
  - The core application for Docker with gulp automation and MySql database.
  - Automated folder relocation
  - Automated Javascript and Sass
  - PhpAdmin for database management
- scode-core-docker-gulp-mysql-api
  - The core application for Docker with gulp automation and MySql database.
  - Automated folder relocation
  - Automated Javascript and Sass
  - PhpAdmin for database management
  - Modified to read Api urls. ex https://api.example.org

## Installation

```cmd
npm install -g scode-cli
```

## Usage

```cmd
npx scode-cli
```

## Docker

- Best hosted on VPS with docker pre installed ex. [debian & docker from OVH](https://ovh.nl)
- Installed behind nginx proxy manager ex. [nginxproxymanager](https://nginxproxymanager.com/)
- Installed behind [portainer](https://www.portainer.io/)

- Best practice is to change the `_dockerfiles` to <ins>underscore your project name</ins> ex. `_helloworld`

  - This will insure that Docker creates your Project Name as the Docker Group Container Name

- You can change the `docker-compose` file if hosting multiple websites on a single Server (ex. VPS)
  - Modify the Container Names, External Ports, Network Name, Volume Name
  - Modify the app container Name => Modify nginx -> default.conf file aswell.

#### Docker usage

- Open a seperate terminal in the \_dockerfiles directory and run the following command

```cmd
docker compose up -d --build
```

```cmd
docker compose down
```

## Gulp - Automation

- Gulp needs to be initiated by installing the package.
- The `node_modules` folder will be install with all the dependencies.
- Open a seperate terminal in the \_gulpfiles directory and run the following command

```cmd
npm install
```

```cmd
npm gulp
```
