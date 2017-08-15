<?php
namespace Drupal\barago\Controller;

use Drupal\Core\Controller\ControllerBase;

class produitController extends ControllerBase {
    public function index(){
        return array(
          '#type' => 'markup',
          '#markup' => $this->t('Hello, World!'),
        );
    }
}
