<?php

/**
 * @file
 * Contains Drupal\drupal8learner\Form\Drupal8LearnerForm.
 */

namespace Drupal\drupal8learner\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class Drupal8LearnerForm.
 *
 * @package Drupal\drupal8learner\Form
 */
class Drupal8LearnerForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'drupal8learner.drupal8learner_config'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupal8learner_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('drupal8learner.drupal8learner_config');
    $form['first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name'),
      '#required' => TRUE,
    );
    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name'),
      '#required' => TRUE,
    );
    $form['biography'] = array(
      '#type' => 'textarea',
      '#title' => t('Biography'),
      '#required' => TRUE,
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $submission = $form_state->getValues();
    $this->config('drupal8learner.drupal8learner_config')
      ->set('form_submit', $submission)
      ->save();

    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  }
}
