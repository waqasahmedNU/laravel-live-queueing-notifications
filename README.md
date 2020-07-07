# Laravel Live/Queueing Notifications
### with Laravel Echo Server, Socket.IO and Redis (Queue)

Laravel Echo Server - NodeJs server for Laravel Echo broadcasting with Socket.io. [Laravel Echo Server](https://github.com/tlaverdure/laravel-echo-server).

We use Laravel Echo Server and Socket.IO for broadcasting on a particular port for Real Time Notifications. Your can further read about [Broadcasting](https://laravel.com/docs/7.x/broadcasting).

Redis is an in-memory data structure which store data as in-memory key–value pair. [Further Reading](https://redis.io/)

There are several ways and reasons to show notifications:
1. If you only want to show live notifcations (like the count of notifications only) we can use only Redis and set key ```count``` for storing the count of notifications. We can also store more values as key-value pair.
2. If you want to store further information about the notifcation (to show it in notificton tab) than we need to ```Create table for storing notifications data```.
3. We can use both Redis with anyother database (e.g. MySQL) for achieving both of the above requirements.

## Install Redis
1. To use Redis on Windows, follow the [Link](https://riptutorial.com/redis/example/29962/installing-and-running-redis-server-on-windows).
2. To use Redis on Linux:
    - To install Redis on Linux ```sudo apt install redis-server```. 
    - Use command to open this file (redis.conf) with your preferred text editor ```sudo nano /etc/redis/redis.conf``` and change ```supervised no``` to ```supervised systemd```.
    - Now restart the Redis service ```sudo systemctl restart redis.service```.
    - Test the Redis service ```sudo systemctl status redis```.
    - You can use Redis cli ```redis-cli``` for checking if it is working correctly.
    ```
    127.0.0.1:6379> ping
    PONG
    ```
    [Further reading](https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-redis-on-ubuntu-18-04)

