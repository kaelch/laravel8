### Event
- 시스템의 상황을 기준으로 하는 이벤트가 아니라, 사용자의 행동을 기능에 전달하는 이벤트.

1. 이벤트: 동작이나 변경 발생시, 송출되는 것. 발생 당시의 정보를 객체로 표현
2. 리스너: 이벤트에 대응하는 처리를 실행
3. 디스패처: 이벤트를 발행하는 기능

### 리스너의 구현에 따라
1. 서버 사이드에서 리스너 실행
2. socket.io를 통해 브라우저 실행
3. event 헬퍼함수 이용

### 이벤트 클래스 생성
`php artisan make:event PublishProcessor`
* `/Events/PublishProcessor.php` 가 생성됩니다.
### 이벤트 모형생성(리스너 생성)
`php artisan make:listener MessageSubscriber --event PublishProcessor`
* `/Listeners/MessageSubscriber.php`가 생성됩니다.

### 이벤트 클래스 작성
```php
class PublishProcessor
{
    ...
    private $int;

    public function  __construct(int $int)
    {
        $this->int = $int;
    }

    public function getInt()
    {
        return $this->int;
    }
    ...
}
```

### 이벤트 리스너 작성
```php
<?php

namespace App\Listeners;

use App\Events\PublishProcessor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageSubscriber
{
    ...

    public function handle(PublishProcessor $event)
    {
        var_dump($event->getInt());
    }
}
```
### 이벤트 등록
```php
// web.php
Route::get('/', function () {
    \Event::dispatch(new \App\Events\PublishProcessor(1));
    return view('welcome');
});
```
