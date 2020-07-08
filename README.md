# Laravel Real-Time/Queueing Notifications
### with Laravel Echo Server, Socket.IO, Redis (Queue) and MySQL (For storing Notification)

Laravel Echo Server - NodeJs server for Laravel Echo broadcasting with Socket.io. [Laravel Echo Server](https://github.com/tlaverdure/laravel-echo-server).

Use Laravel Echo Server and Socket.IO for broadcasting on a particular port for Real Time Notifications. Further documentation about [Broadcasting](https://laravel.com/docs/7.x/broadcasting) and [Notification](https://laravel.com/docs/7.x/notifications#sending-notifications).

Redis - An in-memory data structure which store data as in-memory key–value pair. [Further Reading](https://redis.io/)

There are several ways and reasons to show notifications:
1. If you only want to show live notifcations (like the count of notifications only) we can use only Redis and set key ```count``` for storing the count of notifications. We can also store more values as key-value pair.
2. If you want to store further information about the notifcation (to show it in notificton tab) than we need to ```Create table for storing notifications data```.
3. We can use both Redis with anyother database (e.g. MySQL) for achieving both of the above requirements.

## Setup Redis
1. To use Redis on Windows, follow the [Link](https://riptutorial.com/redis/example/29962/installing-and-running-redis-server-on-windows).
2. To use Redis on Linux:
    1. To install Redis on Linux ```sudo apt install redis-server```. 
    2. Use command to open this file (redis.conf) with your preferred text editor ```sudo nano /etc/redis/redis.conf``` and change ```supervised no``` to ```supervised systemd```.
    3. Now restart the Redis service ```sudo systemctl restart redis.service```.
    4. Test the Redis service ```sudo systemctl status redis```.
    5. You can use Redis cli ```redis-cli``` for checking if it is working correctly.
    
        ```
        127.0.0.1:6379> ping
        PONG
        ```
    6. You can set (optional) Redis password as well. [Further reading](https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-redis-on-ubuntu-18-04)
3. Update the ***.env*** file in your project

    ```
    BROADCAST_DRIVER=redis
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    REDIS_DB=0
    ```
## Setup Laravel Echo Server
1. To install Laravel Echo Server ```npm install -g laravel-echo-server```.
2. Configure Laravel Echo Server ```laravel-echo-server init```.

	<p align="center">
		<img width="600" src="https://github.com/waqasahmedNU/laravel-live-queueing-notifications/blob/master/docs/images/laravel-echo-server-init.PNG">
	</p>

    This will generate configuration file ```laravel-echo-server.json``` for echo server.
    ```
    {
        "authHost": "http://localhost",
        "authEndpoint": "/broadcasting/auth",
        "clients": [
            {
                "appId": "",
                "key": ""
            }
        ],
        "database": "redis",
        "databaseConfig": {
            "redis": {},
            "sqlite": {
                "databasePath": "/database/laravel-echo-server.sqlite"
            }
        },
        "devMode": true,
        "host": null,
        "port": "6001",
        "protocol": "http",
        "socketio": {},
        "secureOptions": 67108864,
        "sslCertPath": "",
        "sslKeyPath": "",
        "sslCertChainPath": "",
        "sslPassphrase": "",
        "subscribers": {
            "http": true,
            "redis": true
        },
        "apiOriginAllow": {
            "allowCors": false,
            "allowOrigin": "",
            "allowMethods": "",
            "allowHeaders": ""
        }
    }
    ```
    To configure Laravel Echo Server for ```https```, you need to update these configurations. Add the SSL Certification and Key path ```sslCertPath``` and ```sslKeyPath```. Next you need to add ```"https": true``` in ```subscribers```.
	**NOTE:** You can modify parameters according to your need.
3. We'll start server to check if everything is working fine ```laravel-echo-server start```. 
	
	**NOTE:** **_Make sure Redis is running._**
	
	<p align="center">
		<img width="400" src="https://github.com/waqasahmedNU/laravel-live-queueing-notifications/blob/master/docs/images/laravel-echo-server-start.PNG">
	</p

4. To test Laravel Echo Server, using the URL syntx ```http://{HOST}:{PORT}/apps/{APP_ID}/{method}?auth_key={KEY}```.

    For example ```http://localhost:6001/apps/7135664adb31c6d9/status?auth_key=22b5ea0e4a06d7d299048c93daa6e11e``` from ```laravel-echo-server.json``` file contains,
    ```
    "clients": [
		{
			"appId": "7135664adb31c6d9",
			"key": "22b5ea0e4a06d7d299048c93daa6e11e"
		}
	],
    ```
		
	<p align="center">
		<img width="800" src="https://github.com/waqasahmedNU/laravel-live-queueing-notifications/blob/master/docs/images/laravel-echo-server-test.PNG">
	</p

## API Testing and Documentation
1. Create Resource Notification
	<p align="center">
		<img width="800" src="https://github.com/waqasahmedNU/laravel-live-queueing-notifications/blob/master/docs/images/notification_create.PNG">
	</p>
2. Update Resource Notification
	<p align="center">
		<img width="800" src="https://github.com/waqasahmedNU/laravel-live-queueing-notifications/blob/master/docs/images/notification_update.PNG">
	</p>
3. Delete Resource Notification
	<p align="center">
		<img width="800" src="https://github.com/waqasahmedNU/laravel-live-queueing-notifications/blob/master/docs/images/notification_delete.PNG">
	</p>

## Demo API
The demo API project is developed using [Lumen Framework](https://lumen.laravel.com/)
