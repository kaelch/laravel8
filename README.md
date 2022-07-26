## Broadcasting

### Back-end(Server)
#### Events/MessageNotification.php
`php artisan make:event MessageNotification`
```php
public function broadcastOn()
{
    - return new PrivateChannel('channel-name');
    + return new Channel('notification');
}
```

#### routes/channels.php
```php
Broadcast::channel('notification', function ($user, $id) {
    return true;
});
```
#### config/app.php
```php
'providers' => [
    ...
    App\Providers\BroadcastServiceProvider::class,
]
```

#### www.pusher.com
```php
//.env
...
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=
```

#### routes/web.php
```php
Route::get('/event', function(){
    event(new \App\Events\MessageNotification('This is our first broadcast message!'));
});

Route::get('/listen', function(){
   return view('listen');
});
```
### Front-end(Client)

1. `composer require laravel/ui`
2. `php artisan ui vue`
3. `npm install laravel-echo pusher-js`
4. `npm install && npm run watch`
5. `resources/js/bootstrap.js`
    ```javascript
    import Echo from 'laravel-echo';
    
    window.Pusher = require('pusher-js');
    
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: true
    });
    ```
6. `resources/js/app.js`
    ```javascript
    const app = new Vue({
        el: '#app',
        created(){
            Echo.channel('notification')
                .listen('MessageNotification', (e) => {
                    alert('Welp, this showed up without a refresh!');
                });
        }
    });
    ```
7. `resources/views/listen.blade.php`
    ```html
    ...
    <body>
    <div id="app"></div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
    ...
    ```
