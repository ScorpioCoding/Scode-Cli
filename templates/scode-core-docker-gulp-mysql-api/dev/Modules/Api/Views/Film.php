<?php


/**
 * Film Create Page
 */
if ($args['page'] === "Create") {
  if ($isData) {
    if ($isCreate["state"] === true) {
      header('HTTP/1.1 200 OK');
      $response["success"] = true;
      $response["data"] = $isCreate['data'];
    } else {
      header('HTTP/1.1 200 OK');
      $response["success"] = false;
      $response["errors"] = $isCreate['data'];
    }
  } else {
    header('HTTP/1.1 400 Bad Request');
    $response['error'] = "No data was provided!";
  }
}

/**
 * Film Read Page
 */
if ($args['page'] === "Read") {
  if ($isHas["state"] === true) {
    if ($isCount["state"] === true && $isCount["data"][0] > 0) {
      if ($isData["state"] === true) {
        //Successfully  
        header('HTTP/1.1 200 OK');
        $response["success"] = true;
        $response['data'] = $isData["data"];
      } else {
        //Successfully  
        header('HTTP/1.1 200 OK');
        $response["success"] = false;
        $response['errors'] = $isData["data"];
      }
    } else {
      header('HTTP/1.1 500 Could not execute query countTable');
      $response['errors'] = $isCount["data"];
    }
  } else {
    // There was an error
    header('HTTP/1.1 500 Could not execute query hasTable');
    $response['errors'] = $isHas["data"];
  }
}