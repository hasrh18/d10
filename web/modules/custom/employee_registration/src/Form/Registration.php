<?php

namespace Drupal\employee_registration\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Implements a custom form.
 */
class Registration extends FormBase
{

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'employee_registration_form';
    }

    /**
     * {@inheritdoc}
     */

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['#attached']['library'][] = 'employee_registration/employee_registration';
        //     $form['actions']['extra_actions'] = array(
        //       '#type' => 'dropbutton',
        //       '#dropbutton_type' => 'small',
        //       '#links' => array(
        //         'simple_form' => array(
        //           'title' => $this
        //             ->t('Simple Form'),
        //         ),
        //         'demo' => array(
        //           'title' => $this
        //             ->t('Build Demo'),
        //         ),
        //       ),
        //     );

        //     $form['search'] = array(
        //         '#type' => 'search',
        //         '#title' => $this
        //           ->t('Search'),
        //       );
        //       $form['system_compact_link'] = [
        //         '#type' => 'system_compact_link',
        //       ];

        //     $form['id'] = array(
        //       '#type' => 'machine_name',
        //       // '#default_value' => $this->entity
        //       //   ->id(),
        //       // '#disabled' => !$this->entity
        //       //   ->isNew(),
        //       '#maxlength' => 64,
        //       '#description' => $this
        //         ->t('A unique name for this item. It must only contain lowercase letters, numbers, and underscores.'),
        //       '#machine_name' => array(
        //         'exists' => array(
        //           $this,
        //           'exists',
        //         ),
        //       ),
        //     );

        //     $form['emp_name'] = array(
        //       '#type' => 'fieldset',
        //       '#title' => $this
        //         ->t('Employee'),
        //     );

        //     $form['emp_name']['name'] = [
        //      '#type' => 'textfield',
        //      '#title' => $this->t('Enter Name'),
        //      '#placeholder' => $this->t('Name'),
        //      '#required' => TRUE,
        //    ];

           $form['pass'] = array(
            '#type' => 'password',
            '#title' => $this
              ->t('Password'),
            '#size' => 25,
          );

          $form['show'] = array(
            '#type' => 'checkbox',
            '#title' => $this
              ->t('Show password'),
          );

        //    $form['emp_no'] = array(
        //     '#type' => 'details',
        //     '#title' => $this
        //       ->t('employee number'),
        //   );

        //    $form['emp_no']['name'] = [
        //      '#type' => 'textfield',
        //      '#title' => $this->t('Enter Employee Number'),
        //      '#placeholder' => $this->t('Employee Number'),
        //      '#required' => TRUE,
        //      '#value' => $this->t('wpweb'),
        //      '#disabled'=> $this->t('true'),
        //    ];       

        //    $form['emp_mail'] = [
        //      '#type' => 'email',
        //      '#title' => $this->t('Enter Email ID'),
        //      '#placeholder' => $this->t('Email'),
        //      '#required' => TRUE,
        //    ];

        //    $form['emp_language'] = [
        //     '#type' => 'language_select',
        //     '#title' => $this->t('Enter Language'),
        //   ];

        //    $form['emp_phone'] = [
        //      '#type' => 'tel',
        //      '#title' => $this->t('Enter Contact Number'),
        //      '#placeholder' => $this->t('Number'),
        //    ];

        //    $form['emp_img'] = array(
        //     '#type' => 'managed_file',
        //     '#title' => $this
        //       ->t('Employee Image'),
        //   );

        //   $form['hello'] = [
        //     '#type' => 'html_tag',
        //     '#tag' => 'p',
        //     '#value' => $this
        //       ->t('Hello World'),
        //   ];

        //    $form['favorites']['colors'] = array(
        //     '#type' => 'checkboxes',
        //     '#options' => array('blue' => $this->t('Blue'), 'red' => $this->t('Red')),
        //     '#title' => $this->t('Which colors do you like?'),
        //   );

        $form['start_date'] = [
            '#type' => 'datetime',
            '#title' => $this->t('start date'),
            '#required' => TRUE,
        ];

        $form['end_date'] = [
            '#type' => 'datetime',
            '#title' => $this->t('end date'),
            '#required' => TRUE,
        ];

        //    $form['emp_gender'] = [
        //      '#type' => 'select',
        //      '#title' => $this->t('Select Gender'),
        //      '#options' => [
        //         '1' => $this
        //       ->t('male'),
        //     'female' => [
        //       '2.1' => $this
        //         ->t('female-1'),
        //       '2.2' => $this
        //         ->t('female-2'),
        //     ],
        //     '3' => $this
        //       ->t('other'),
        //      ],
        //    ];

        //    $form['settings']['emp_gender'] = array(
        //     '#type' => 'radios',
        //     '#title' => $this
        //       ->t('gender'),
        //     '#default_value' => 1,
        //     '#options' => array(
        //       0 => $this
        //         ->t('male'),
        //       1 => $this
        //         ->t('female'),
        //         2 => $this
        //         ->t('other'),
        //     ),
        //   );

        //    $form['color'] = array(
        //     '#type' => 'color',
        //     '#title' => $this
        //       ->t('Color'),
        //     '#default_value' => '#ffffff',
        //   );

        //   $form['needs_accommodation'] = [
        //     '#type' => 'checkbox',
        //     '#title' => $this
        //       ->t('Need Special Accommodations?'),
        //   ];
        //   $form['accommodation'] = [
        //     '#type' => 'container',
        //     '#attributes' => [
        //       'class' => [
        //         'accommodation',
        //       ],
        //     ],
        //     '#states' => [
        //       'invisible' => [
        //         'input[name="needs_accommodation"]' => [
        //           'checked' => FALSE,
        //         ],
        //       ],
        //     ],
        //   ];
        //   $form['accommodation']['diet'] = [
        //     '#type' => 'textfield',
        //     '#title' => $this
        //       ->t('Dietary Restrictions'),
        //   ];

           

        //   $form['contacts'] = [
        //     '#type' => 'table',
        //     '#caption' => $this
        //       ->t('Sample Table'),
        //     '#header' => [
        //       $this
        //         ->t('Name'),
        //       $this
        //         ->t('Phone'),
        //     ],
        //     '#rows' => [
        //         ['name' => 'harsh',
        //         'phone' => '1'    
        //         ],

        //     ],
        //     '#empty' => $this
        //       ->t('No entries available.'),
        //   ];


        //   $header = [
        //     'color' => $this
        //       ->t('Color'),
        //     'shape' => $this
        //       ->t('Shape'),
        //   ];
        //   $options = [
        //     1 => [
        //       'color' => 'Red',
        //       'shape' => 'Triangle',
        //     ],
        //     2 => [
        //       'color' => 'Green',
        //       'shape' => 'Square',
        //     ],
        //     // Prevent users from selecting a row by adding a '#disabled' property set
        //     // to TRUE.
        //     3 => [
        //       'color' => 'Blue',
        //       'shape' => 'Hexagon',
        //       '#disabled' => TRUE,
        //     ],
        //   ];
        //   $form['table'] = array(
        //     '#type' => 'tableselect',
        //     '#header' => $header,
        //     '#options' => $options,
        //     '#empty' => $this
        //       ->t('No shapes found'),
        //   );

        //   $form['quantity'] = array(
        //     '#type' => 'range',
        //     '#title' => $this
        //       ->t('Quantity'),
        //   );

        //   $form['homepage'] = array(
        //     '#type' => 'url',
        //     '#title' => $this->t('Home Page'),
        //     '#size' => 30,
        //     '#pattern' => '*.example.com',
        //   );

        //   $form['entity_id'] = array(
        //     '#type' => 'value',
        //     '#value' => '1',
        //   );

        //   $form['information'] = array(
        //     '#type' => 'vertical_tabs',
        //     '#default_tab' => 'edit-publication',
        //   );
        //   $form['author'] = array(
        //     '#type' => 'details',
        //     '#title' => $this
        //       ->t('Author'),
        //     '#group' => 'information',
        //   );
        //   $form['author']['name'] = array(
        //     '#type' => 'textfield',
        //     '#title' => $this
        //       ->t('Name'),
        //   );
        //   $form['publication'] = array(
        //     '#type' => 'details',
        //     '#title' => $this
        //       ->t('Publication'),
        //     '#group' => 'information',
        //   );
        //   $form['publication']['publisher'] = array(
        //     '#type' => 'textfield',
        //     '#title' => $this
        //       ->t('Publisher'),
        //   );

        //   $form['weight'] = array(
        //     '#type' => 'weight',
        //     '#title' => $this
        //       ->t('Weight'),
        //     '#default_value' => '2',
        //     '#delta' => 10,
        //   );

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
    //   public function validateForm(array &$form, FormStateInterface $form_state) {
    //     if (strlen($form_state->getValue('emp_phone')) < 10) {
    //       $form_state->setErrorByName('emp_phone', $this->t('The phone number is too short. Please enter a full phone number.'));
    //     }
    //   }

    /**
     * {@inheritdoc}
     */

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // Processing form data.
        // $a = $b = $c = $diff = "";
        // $this->messenger()->addMessage($this->t("Employee Registration Done!!"));
        // $a = new \DateTime();
        // foreach ($form_state->getValues() as $key => $value) {
        //     $this->messenger()->addMessage($key . ': ' . $value);
           
        //     if ($key == 'start_date') {
                // $Adate = $a->createFromFormat('Y-m-d', $value);
                // $a = $value;
            // }
            // if ($key == 'end_date') {
            //     $b = $a->createFromFormat('Y-m-d', $value);
                // $b = $value;
        //     }
        // }

        // $this->messenger()->addMessage($a . " " . $b);
        // $diff = $Adate->diff($b);
        // $c = $diff->format('%y years %m months %d days');
        
        // $this->messenger()->addMessage(" " . $c . " ");
        // foreach($c as $value){
        //     $this->messenger()->addMessage($value);
        // }
        
        // if($c < 31) {
        // $this->messenger()->addMessage("Date Diff: " . $c . " Days");
        // }
        // elseif($c < 365 && $c > 30) {   
        //     $e = floor($c / 30);
        //     $d = $c % 30;
        //     $this->messenger()->addMessage("Date Diff: " . $e . " Month ". $d ." Days");
        // }
        // elseif($c > 365) {   
        //     $e = floor($c / 365);
        //     $d = $c % 365;
        //     $this->messenger()->addMessage("Date Diff: " . $e . " Year ". $d ." Days");
        // }
        


        $a = $b = $c = $diff = "";
        $this->messenger()->addMessage($this->t("Employee Registration Done!!"));
        $date = new \DateTime();
        foreach ($form_state->getValues() as $key => $value) {
            $this->messenger()->addMessage($key . ': ' . $value);
           
            if ($key == 'start_date') {
                $a = $value->format('Y-m-d H:i:s');
                $a = $date->createFromFormat('Y-m-d H:i:s', $a);
            }
            if ($key == 'end_date') {
                $b = $value->format('Y-m-d H:i:s');
                $b = $date->createFromFormat('Y-m-d H:i:s', $b);
            }
        }
        // dump($a,$b);die();
        $diff = $a->diff($b);

        $c = $diff->format('%y years %m months %d days %H hour %i minuites %s second');
        
        $this->messenger()->addMessage($c);
    }
}
