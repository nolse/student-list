# student-list 
This repo is a simple application to list student with a webserver (PHP) and API (Flask)

![project](https://user-images.githubusercontent.com/18481009/84582395-ba230b00-adeb-11ea-9453-22ed1be7e268.jpg)


------------


## Objectives

The objectives of this practice exam are to ensure that you are able to manage a docker infrastructure, so you will be evaluated about the following

### Themes:

- improve an existed application deployment process
- versioning your infrastructure release
- address best practice when implementing docker infrastructure
- Infrastructure As Code

## Context


*POZOS*  is an IT company located in France and develops software for High School.

The innovation department want to disrupt the existing infrastructure to ensure that

it can be scalable, easily deployed with a maximum of automation.

POZOS wants you to build a "**POC**" to show how docker can help you and how much this technology is efficient.

For this POC, POZOS will give you an application and want you to build a "decouple" infrastructure based on "**Docker**".

Currently, the application is running on a single server with any scalability and any high availability.

When POZOS needs to deploy a new release, every time some goes wrong.

In conclusion, POZOS needs agility on its software farm.

## Infrastructure

For this POC, you will only use one single machine with a docker installed on it.

The build and the deployment will be made on this machine.

POZOS recommends you to use ubuntu OS because it's the most used in the company.

Please also note that you are authorized to use a virtual machine base on Centos7.6 and not your physical machine.

The security is a very critical aspect of POZOS DSI so please do not disable the firewall or other security mechanisms otherwise please explain your reasons in your delivery.

## Application


The application that you will be working on is named "*student_list*", this application is very basic and enables POZOS to show the list of the student with their age.

student_list has two modules:

- the first module is a REST API (with basic authentication needed) who send the desire list of the student based on JSON file
- The second module is a web app written in HTML + PHP who enable end-user to get a list of students

Your work is to build one container for each module an make them interact with each other

Application source code can be found [here](https://github.com/diranetafen/student-list.git "here")

The files that you must provide (in your delivery) are ***Dockerfile*** and ***docker-compose.yml***  (currently both are empty)

Now it is time to explain you each file's role:

- docker-compose.yml: to launch the application (API and web app)
- Dockerfile: the file that will be used to build the API image (details will be given)
- requirements.txt: contains all the packages to be installed to run the application
- student_age.json: contain student name with age on JSON format
- student_age.py: contains the source code of the API in python
- index.php: PHP  page where end-user will be connected to interact with the service to - list students with age. You need to update the following line before running the website container to make ***api_ip_or_name*** and ***port*** fit your deployment

```bash 
 $url = 'http://<api_ip_or_name:port>/pozos/api/v1.0/get_student_ages';
 ```
- The structure of your github repository

Send your delivery at ***contact@eazytraining.fr*** and we will provide you the link of the solution.
****************** ################# ********************

# Student List – Docker & Private Registry (Pozos)

This project demonstrates a complete Docker-based application including:
- a Python API
- a PHP website
- a private Docker Registry
- a web UI to manage and visualize Docker images

The environment runs inside a Vagrant virtual machine.

---
##  Architecture Overview

- **Vagrant VM**
  - Ubuntu 22.04
  - Docker & Docker Compose
- **Application stack**
  - Python API (`pozos-api`)
  - PHP Website
- **Private Docker Registry**
  - Docker Registry v2
  - Registry Web UI (Joxit)

---

##  Project Structure

```text
student-list/
├── README.md
├── docker-compose.yml
├── docker-compose-registry.yml
├── simple_api/
│   ├── student_age.py
│   ├── student_age.json
│   ├── requirements.txt
│   └── Dockerfile
├── website/
│   └── index.php
├── pozos-registry/
└── screenshots/
    ├── POZOS-REGISTRY_EMPTY.png
    ├── Resultat_PUSH_1_POZOS-API.png
    ├── Resultat_PUSH_2_POZOS-API.png
    ├── TAG-POZOS-API_REGISTRY.png
    ├── LIST_STUDENTS.png
    ├── STUDENT_CHEKING_APP.png
    ├── student-list_simple_api_mastercurl-utoto.png
    └── Delete_Container.png

Start the application :

docker compose up -d

Services exposed

| Service     | Port |
| ----------- | ---- |
| Python API  | 5000 |
| PHP Website | 8080 |

The application stack is defined in docker-compose.yml and includes : pozos-api and pozos-website

A shered docker bridge network

Start the private docker registry

docker compose -f docker-compose-registry.yml up -d

Registry services :

| Service         | Port |
| --------------- | ---- |
| Docker Registry | 5001 |
| Registry Web UI | 8090 |


Build and Push API image

docker build -t pozos-api ./simple_api
docker tag pozos-api localhost:5001/pozos-api:1.0
docker push localhost:5001/pozos-api:1.0

Push Results :

Image visible in registry UI 

API Test

![Résultat curl student-list](screenshots/student-list_simple_api_mastercurl-utoto.png)

![docker ps](screenshots/student-list_simple_api_mastercurl-utoto.png)

![docker ps](screenshots/Delete_Container.png)

![Docker PS](screenshots/LIST_STUDENTS.png)

![Docker PS](screenshots/POZOS-REGISTRY_EMPTY.png)

![Docker PS](screenshots/TAG-POZOS-API_REGISTRY.png)

![Docker PS](screenshots/Resultat_PUSH_1_POZOS-API.png)

![Docker PS](screenshots/Resultat_PUSH_2_POZOS-API.png)
