<?php

/**
 * @file
 * Contains Drupal\drupal8learner\Controller\DefaultController.
 */

namespace Drupal\drupal8learner\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\drupal8learner\Controller
 */
// class DefaultController extends ControllerBase implements ContainerInjectionInterface  {
class DefaultController extends ControllerBase {

  public function hello($name) {
    return [
      '#theme' => 'drupal8learner_custom_page_render',
      '#name' => $name,
      '#job'  =>  'developer',
    ];
  }
  public function greeting() {
    $config = $this->config('drupal8learner.drupal8learner_config');
    $form_submission = $config->get('form_submit');
    // $markup = '';
    // foreach ($form_submission as $key => $value) {
    //   $markup = $markup . '<br>'. 'keys: ' . $key . '-------' . $value;
    // }
    // return array(
    //   '#markup' => $markup,
    // );
    return [
      '#theme' => 'drupal8learner_custom_form_render',
      '#first_name' => $form_submission['first_name'],
      '#last_name'  => $form_submission['last_name'],
      '#biography'  => $form_submission['biography'],
    ];
  }
}
