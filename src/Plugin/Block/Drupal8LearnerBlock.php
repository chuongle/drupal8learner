<?php

/**
 * @file
 * Contains Drupal\drupal8learner\Plugin\Block\Drupal8LearnercBlock.
 */

namespace Drupal\drupal8learner\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Drupal8LearnerBlock' block.
 *
 * @Block(
 *  id = "drupal8learner_block",
 *  admin_label = @Translation("Drupal 8 Learner Block"),
 * )
 */
class Drupal8LearnerBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t(''),
      '#default_value' => isset($this->configuration['title']) ? $this->configuration['title'] : '',
    );
    $form['description'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#description' => $this->t(''),
      '#default_value' => isset($this->configuration['description']) ? $this->configuration['description'] : '',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['title'] = $form_state->getValue('title');
    $this->configuration['description'] = $form_state->getValue('description');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['drupal8learner_block_title']['#markup'] = '<p>' . $this->configuration['title'] . '</p>';
    $build['drupal8learner_block_description']['#markup'] = '<p>' . $this->configuration['description'] . '</p>';

    return $build;
  }

}