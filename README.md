## Subir aplicação

```bash
docker build -t api-php .
docker volume create api-php
docker run -d -p 80:80 -v "$(pwd):/var/www/html" --name api-php api-php

```