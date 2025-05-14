<?php

namespace Modules\Api\Utils;

use App\Core\NewException;


class ValidateFilm
{
  public static function validateSlug(string $slug)
  {
    $errorList = array();

    $slug = self::test_input($slug);

    if ($slug === "")
      $errorList[] = 'Slug Required!';

    return $errorList;
  }

  private static function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  //END CLASS
}