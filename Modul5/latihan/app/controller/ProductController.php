<?php

namespace app\controller;

include "app/traits/ApiResponseFormatter.php";
include "app/models/Product.php";

use app\models\Product;
use app\traits\ApiResponseFormatter;

class ProductController{
  use ApiResponseFormatter;

  public function index(){
    $productModel = new Product();
    $response = $productModel->findAll();
    return $this->apiResponse(200, "success", $response);
  }

  public function getById($id)
  {
    $productModel = new Product();
    $response = $productModel->findById($id);
    return $this->apiResponse(200, "success", $response);
  }

  public function insert()
  {
    $jsonInput = file_get_contents('php://input');
    $inputData = json_decode($jsonInput, true);
    if (json_last_error()) {
      return $this->apiResponse(400, "error invalid input", null);
    }

    $productModel = new Product();
    $response = $productModel->create([
      "product_name" => $inputData['product_name']
    ]);

    return $this->apiResponse(200, "success", $response);
  }

  public function update($id)
  {
    $jsonInput = file_get_contents('php://input');
    $inputData = json_decode($jsonInput, true);

    if (json_last_error()) {
      return $this->apiResponse(400, "error invalid input", null);
    }

    $productModel = new Product();
    $response = $productModel->update([
      "product_name" => $inputData['product_name']
    ], $id);

    return $this->apiResponse(200, "success", $response);
  }

  public function delete($id)
  {
    $productModel = new Product();
    $response = $productModel->destroy($id);

    return $this->apiResponse(200, "success", $response);
  }
}