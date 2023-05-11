<?php

namespace Drupal\employee\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a employee form.
 */
class EmployeeForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'employee_employee';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    /**
     * First name field to take the employee's first name as input
     */
    $form['emp_fname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#required' => TRUE,
      '#maxlength' => 50,
    ];

    /**
     * Last name field to take the employee's last name as input
     */
    $form['emp_lname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last name'),
      '#required' => TRUE,
      '#maxlength' => 50,
    ];

     /**
     * Email Input Field
     */
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email Id'),
      '#required' => TRUE,
      '#maxlength' => 100,
    ];

     /**
     * ZipCode Of the Employee
     */
    $form['zipcode'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Zip Code'),
      '#required' => TRUE,
      '#maxlength' => 10,
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $formFields = $form_state->getValues();
    $fname = trim($formFields['emp_fname']);
    $lname = trim($formFields['emp_lname']);
    $email = trim($formFields['email']);
    $zipcode = trim($formFields['zipcode']);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t('Employee data registered.'));
    $form_state->setRedirect('<front>');
  }

}
