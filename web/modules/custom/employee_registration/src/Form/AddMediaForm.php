<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * @ContentEntityType(
 *   id = "myentity",
 *   ...
 *   handlers = {
 *   ...
 *     "form" = {
 *       "add_media" = "Drupal\mymodule\Form\AddMediaForm",
 *       ...
 *     },
 *   ...
 *   },
 *   ...
 * )
 */



/**
 * Form controller for the entity add media form.
 */
class AddMediaForm extends ContentEntityForm {

   // Add any special customization on form validate, submit in this form.
   public function getFormId()
   {
       return 'add_media_form';
   }

   public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['first_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('first_name'),
            '#required' => TRUE,
        ];

        $form['last_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('last_name'),
            '#required' => TRUE,
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
        ];

        return $form;
    }

     /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        foreach ($form_state->getValues() as $key => $value) {
            $this->messenger()->addMessage($key . ': ' . $value);
        }
    }
}