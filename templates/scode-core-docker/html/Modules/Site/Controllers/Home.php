<?php

namespace Modules\Site\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Core\Translation;

use App\Core\Meta;


/**
 *  Home
 */
class Home extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {

    $args['template'] = 'Frontend';
    //MetaData
    $meta = array();
    $meta = (new Meta($args))->getMeta();

    // Extra data
    $data = array();

    View::render($args, $meta, [
      'data' => $data
    ]);
  }

  protected function after()
  {
  }

  //END-Class
}
