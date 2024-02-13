## Run Application

1. Make sure you are in the root directory of the project where the `Dockerfile` is located.

2. Build the Docker image using the following command:

```bash
docker build -t api-php .
```

3. After the image is successfully built, run the container with the following command:

```bash
docker run -d -p 80:80 -v "$(pwd):/var/www/html" --name slim-php api-php
```

This command creates and runs a container from the `api-php` image, exposing port 80 of the container to port 80 of the host, and mounting the current directory (where the `Dockerfile` is located) as the `/var/www/html` directory inside the container.

Thank you for the addition! Here's the updated section:

---

## Test Application

1. Open a web browser and navigate to the following URL to access the home page:

```
http://localhost
```

This should display the list of users in HTML format.

2. To get the data in JSON format, you can use the following endpoint:

```
http://localhost/?format=api
```

This will return the data in JSON format.

3. You can also specify a name to customize the greeting on the home page. For example:

```
http://localhost/?name=John
```

This will display the home page with a personalized greeting for "John".

4. By default, if no format is specified, the endpoint will return HTML. For example:

```
http://localhost/?name=John
```

This will display the home page with a personalized greeting for "John" in HTML format.

---

Let me know if you need further assistance!
