#API-клиент для работы с сервисом InSales

Пример использования:

```
require_once 'vendor/autoload.php';

$client = new \Liven\InSales\API\ApiClient('identity', 'password', 'host_name');

$client->createClient(
[
    'client' => [
        'name' => uniqid(),
        'surname' => uniqid(),
        'middlename' => uniqid(),
    ]
]
);

$client->getClient($id);
$client->getClients();
$client->updateClient($id, $data);
$client->removeClient($id);
```
