Su.Auth
=======

This module is the interface of the auth function for the su website

SuFramework
------

> It's a easy-to-use, flexible, light framework designer for su dev

### URL pattern

```
Http://localhost:8000/auth/index.php?controller=index&action=index
```

### FrontController

in the entrance of the website, index.php, you must require the frontcontroller and get an instance of it and finally dispatch the request...

### Controller


you must touch a file named after XyyyController such as IndexController and create a php class with the same name of filename

the class must extends `SuController`

for example:

```php
class IndexController extends SuController  {
  public function indexAction()  {
    $this->render('index.html',null);
  }
}

```

### View

we use twig as our template engine.


### Model

we use doctrine as our ORM engine.
