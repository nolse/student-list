-- 
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

docker build -t pozos-api .
docker tag pozos-api localhost:5001/pozos-api:1.0
docker push localhost:5001/pozos-api:1.0
Push Results :
Image visible in registry UI
API Test

The reults is in the file screenshots.md
--

