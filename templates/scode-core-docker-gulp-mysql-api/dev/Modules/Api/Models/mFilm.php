<?php

namespace Modules\Api\Models;

use PDO;
use PDOException;

use App\Core\Database;

use App\Core\NewException;
use RuntimeException;



class mFilm extends Database
{

  public function __construct()
  {
    parent::__construct();
  }


  public static function create($args = array()): array
  {
    try {

      $query = "INSERT INTO `film` (
      `id`, 
      `name`,
      `slug`, 
      `author`,
      `image`,
      `about`
      )
      VALUES (
      :id, 
      :name,
      :slug,
      :author
      :image,
      :about
      )";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', null, PDO::PARAM_NULL);
      $stmt->bindValue(':name', $args['name'], PDO::PARAM_STR);
      $stmt->bindValue(':slug', $args['slug'], PDO::PARAM_STR);
      $stmt->bindValue(':author', $args['author'], PDO::PARAM_STR);
      $stmt->bindValue(':image', $args['image'], PDO::PARAM_STR);
      $stmt->bindValue(':about', $args['about'], PDO::PARAM_STR);

      $stmt->execute();
      return array(
        "state" => true,
        "data" => array($dB->lastInsertId())
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }



  //END CLASS
}