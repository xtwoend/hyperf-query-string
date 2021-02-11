# Hyperf Query 


## Installation

```
composer require xtwoend/query-string
```

add config in `bin/bootstrap.php`

```
$app->configure('query-builder');
$app->register(\Xtwoend\QueryString\ConfigProvider::class);
```

## Usage

```

\\ ?sort[id]=1&sort[name]=0
$request->sorts();
\\ result ['id' => 'desc', 'name'=> 'asc']

\\ ?q=keyword
$request->filter();

```