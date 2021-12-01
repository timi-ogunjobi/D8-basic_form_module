<?php

namespace Drupal\basic_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * Our custom basic form.
 */
class BasicForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return "basic_form_basicform";
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['rival_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Type one'),
    ];

    $form['rival_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Type two'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Which is better?'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $winner = rand(1, 2);
    drupal_set_message(
      'The better between ' . $form_state->getValue('rival_1') . ' and ' .
      $form_state->getValue('rival_2') . ' is: ' . $form_state->getValue('rival_' . $winner)
    );
  }
}
