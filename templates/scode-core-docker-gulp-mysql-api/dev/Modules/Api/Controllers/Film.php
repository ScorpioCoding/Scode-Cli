<?php

namespace Modules\Api\Controllers;

use App\Core\Controller;
use App\Core\Api;
use App\Core\Auth;

use Modules\Api\Models\mCommon;
use Modules\Api\Models\mFilm;
use Modules\Api\Utils\ValidateFilm;

/**
 *  Api FILM CRUD
 */
class Film extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {
  }

  public function createAction($args = array())
  {
    $args['template'] = "Secure";
    $args['view'] = "Film";
    $args['page'] = "Create";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('POST');
      if ($isMethod) {
        $isData = json_decode(file_get_contents('php://input'), true);
        if ($isData) {
            $isCreate = mFilm::create($isData);
        }
      }
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isCreate' => $isCreate
    ]);
  }


  public function readAllAction($args = array())
  {
    $args['template'] = "Open";
    $args['view'] = "Post";
    $args['page'] = "Read";

    $isMethod = Auth::isAuthMethod('GET');
    if ($isMethod) {
      $isHas = mCommon::hasTable('post');
      if ($isHas["state"] === true) {
        $isCount = mCommon::countTable('post');
        if ($isCount["state"] === true && $isCount["data"][0] > 0) {
          $isData = mCommon::readAll('post');
        }
      }
    }

    Api::render($args, [
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }

  public function readByTagAction($args = array())
  {
    $args['template'] = "Open";
    $args['view'] = "Post";
    $args['page'] = "Read";

    $isMethod = Auth::isAuthMethod('GET');
    if ($isMethod) {
      $isHas = mCommon::hasTable('post');
      if ($isHas["state"] === true) {
        $isCount = mCommon::countTable('post');
        if ($isCount["state"] === true && $isCount["data"][0] > 0) {
          $isData = mPost::readByTag($args['tag']);
        }
      }
    }

    Api::render($args, [
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }

  public function readByIdAction($args = array())
  {
    $args['template'] = "Secure";
    $args['view'] = "Post";
    $args['page'] = "Read";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('GET');
      if ($isMethod) {
        $isHas = mCommon::hasTableById('post', $args['id']);
        if ($isHas["state"] === true) {
          $isCount = mCommon::countTableById('post', $args["id"]);
          if ($isCount["state"] === true && $isCount["data"][0] > 0) {
            $isData = mCommon::readById("post", $args["id"]);
          }
        }
      }
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }

  public function readBySlugAction($args = array())
  {
    $args['template'] = "Open";
    $args['view'] = "Post";
    $args['page'] = "Read";

    $isMethod = Auth::isAuthMethod('GET');
    if ($isMethod) {
      $isHas = mCommon::hasTable('post');
      if ($isHas["state"] === true) {
        $isCount = mCommon::countTable('post');
        if ($isCount["state"] === true && $isCount["data"][0] > 0) {
          $isData = mPost::readBySlug($args['slug']);
        }
      }
    }

    Api::render($args, [
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }

  public function readByStatusAction($args = array())
  {
    $args['template'] = "Open";
    $args['view'] = "User";
    $args['page'] = "Read";

    $isMethod = Auth::isAuthMethod('GET');
    if ($isMethod) {
      $isHas = mCommon::hasTable('post');
      if ($isHas["state"] === true) {
        $isCount = mCommon::countTable('post');
        if ($isCount["state"] === true && $isCount["data"][0] > 0) {
          $isData = mPost::readByStatus($args['status']);
        }
      }
    }

    Api::render($args, [
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }

  public function updateHeaderAction($args = array())
  {

    $args['template'] = "Secure";
    $args['view'] = "Post";
    $args['page'] = "Update";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('PUT');
      if ($isMethod) {
        $isData = json_decode(file_get_contents('php://input'), true);
        if ($isData) {
          $isUser = mUser::getUserByEmail($isData['email']);
          if ($isUser) {
            $isData['userId'] = $isUser->id;
            $isUpdate = mPost::updateHeader($isData);
          }
        }
      }
    }


    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isUpdate' => $isUpdate,
    ]);
  }

  public function updateAboutAction($args = array())
  {

    $args['template'] = "Secure";
    $args['view'] = "Post";
    $args['page'] = "Update";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('PUT');
      if ($isMethod) {
        $isData = json_decode(file_get_contents('php://input'), true);
        if ($isData) {
          $isUpdate = mPost::updateAbout($isData);
        }
      }
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isUpdate' => $isUpdate,
    ]);
  }

  public function updateImageAction($args = array())
  {

    $args['template'] = "Secure";
    $args['view'] = "Post";
    $args['page'] = "Update";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('PUT');
      if ($isMethod) {
        $isData = json_decode(file_get_contents('php://input'), true);
        if ($isData) {
          $isUpdate = mPost::updateImage($isData);
        }
      }
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isUpdate' => $isUpdate,
    ]);
  }

  public function updateBodyAction($args = array())
  {

    $args['template'] = "Secure";
    $args['view'] = "Post";
    $args['page'] = "Update";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('PUT');
      if ($isMethod) {
        $isData = json_decode(file_get_contents('php://input'), true);
        if ($isData) {
          $isUpdate = mPost::updateBody($isData);
        }
      }
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isData' => $isData,
      'isUpdate' => $isUpdate,
    ]);
  }


  public function deleteAction($args = array())
  {
    $args['template'] = "Secure";
    $args['view'] = "Post";
    $args['page'] = "Delete";

    $isToken = Auth::isAuthByTokenBasic(getallheaders());
    if ($isToken) {
      $isMethod = Auth::isAuthMethod('DELETE');
      if ($isMethod) {
        $isHas = mCommon::hasTableById('post', $args['id']);
        if ($isHas["state"] === true) {
          $isCount = mCommon::countTableById('post', $args["id"]);
          if ($isCount["state"] === true && $isCount["data"][0] > 0) {
            $isData = mCommon::delete("post", $args["id"]);
          }
        }
      }
    }

    Api::render($args, [
      'isToken' => $isToken,
      'isMethod' => $isMethod,
      'isHas' => $isHas,
      'isCount' => $isCount,
      'isData' => $isData
    ]);
  }

  protected function after()
  {
  }
  //
  //END CLASS
}