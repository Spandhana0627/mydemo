<?php

namespace Drupal\custom_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
* Implements the custom form.
*/
class CustomForm extends FormBase {


public function getFormId() {
return 'custom_form';
}


public function buildForm(array $form, FormStateInterface $form_state) {
$form['first_name'] = [
'#type' => 'textfield',
'#title' => $this->t('First Name'),
'#required' => TRUE,
];
$form['last_name'] = [
'#type' => 'textfield',
'#title' => $this->t('Last Name'),
'#required' => TRUE,
];
$form['email'] = [
'#type' => 'email',
'#title' => $this->t('Email'),
'#required' => TRUE,
];
$form['zip_code'] = [
'#type' => 'textfield',
'#title' => $this->t('Zip Code'),
'#required' => TRUE,
];
$form['submit'] = [
'#type' => 'submit',
'#value' => $this->t('Submit'),
];

return $form;
}

/**
* {@inheritdoc}
*/
public function validateForm(array &$form, FormStateInterface $form_state) {
// Validate the email field.
$email = $form_state->getValue('email');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $form_state->setErrorByName('email', $this->t('Please enter a valid email address.'));
}

// Validate the zip code field.
$zip_code = $form_state->getValue('zip_code');
if (!preg_match('/^\d{5}(?:[-\s]\d{4})?$/', $zip_code)) {
    $form_state->setErrorByName('zip_code', $this->t('Please enter a valid zip code.'));
}

// Validate the first name field.
$first_name = $form_state->getValue('first name');
if (empty($first_name)) {
    $form_state->setErrorByName('first_name', $this->t('Please enter a valid first name.'));
}

// Validate the last name field.
$last_name = $form_state->getValue('last name');
if (empty($last_name)) {
    $form_state->setErrorByName('last_name', $this->t('Please enter a valid last name.'));
}
}

/**
* {@inheritdoc}
*/

public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage(t('Form submitted successfully.'));
  }

}
