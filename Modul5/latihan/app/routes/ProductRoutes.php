<?php

namespace app\routes;

include "app/controller/ProductController.php";

use app\controller\ProductController;

class ProductRoutes
{
  public function handle($method, $path)
  {
    if ($method == 'GET' && $path == '/api/products') {
      $controller = new ProductController();
      echo $controller->index();
    }

    if ($method == 'GET' && strpos($path, '/api/products') == 0) {
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];

      $controller = new ProductController();
      echo $controller->getById($id);
    }

    // if ($method == 'POST' && $path == '/api/products') {
    //   $controller = new ProductController();
    //   echo $controller->insert();
    // }

    if($method === 'POST' && $path === '/api/products'){
      $controller = new ProductController();
      echo $controller->insert();
    }

    if ($method === 'PUT' && strpos($path, '/api/products') === 0) {
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];

      $controller = new ProductController();
      echo $controller->update($id);
    }

    if ($method == 'DELETE' && strpos($path, '/api/products') == 0) {
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];

      $controller = new ProductController();
      echo $controller->delete($id);
    }
  }
}