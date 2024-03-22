<?php

namespace Drupal\employee_registration\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Ajax\InvokeCommand;

/**
 * Provides a default form.
 */
class DefaultForm extends FormBase
{

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'default_form';
    }

    public function myAjaxCallback(array &$form, FormStateInterface $form_state)
    {
        // Return the prepared textfield.
        // Try to get the selected text from the select element on our form.
        $selectedText = 'nothing selected';
        if ($selectedValue = $form_state->getValue('example_select')) {
            // Get the text of the selected option.
            $selectedText = $form['example_select']['#options'][$selectedValue];
        }

        // Attach the javascript library for the dialog box command
        // in the same way you would attach your custom JS scripts.
        $dialogText['#attached']['library'][] = 'core/drupal.dialog.ajax';
        // Prepare the text for our dialogbox. 
        $dialogText['#markup'] = "You selected: $selectedText";

        // If we want to execute AJAX commands our callback needs to return
        // an AjaxResponse object. let's create it and add our commands.
        $response = new AjaxResponse();
        // Issue a command that replaces the element #edit-output
        // with the rendered markup of the field created above.
        // ReplaceCommand() will take care of rendering our text field into HTML.
        $response->addCommand(new ReplaceCommand('#edit-output', $form['output']));
        // Show the dialog box.
        $response->addCommand(new OpenModalDialogCommand('My title', $dialogText, ['width' => '300']));

        // Finally return the AjaxResponse object.
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['#attached']['library'][] = 'employee_registration/employee_registration';
        $form['#attributes'] = [
            'onsubmit' => 'return false',
        ];

        // Create a select field that will update the contents
        // of the textbox below.
        $form['example_select'] = [
            '#type' => 'select',
            '#title' => $this->t('Select element'),
            '#options' => [
                '1' => $this->t('One'),
                '2' => $this->t('Two'),
                '3' => $this->t('Three'),
                '4' => $this->t('From New York to Ger-ma-ny!'),
            ],

            '#ajax' => [
                'callback' => '::myAjaxCallback', // don't forget :: when calling a class method.
                //'callback' => [$this, 'myAjaxCallback'], //alternative notation
                'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
                'event' => 'change',
                'wrapper' => 'edit-output', // This element is updated with this AJAX callback.
                'progress' => [
                    'type' => 'throbber',
                    'message' => $this->t('Verifying entry...'),
                ],
            ]

        ];

        // Create a textbox that will be updated
        // when the user selects an item from the select box above.
        $form['output'] = [
            '#type' => 'textfield',
            '#size' => '60',
            '#value' => 'One',
            '#prefix' => '<div id="edit-output">',
            '#suffix' => '</div>',
        ];

        // If there's a value submitted for the select list let's set the textfield value.
        if ($selectedValue = $form_state->getValue('example_select')) {
            // Get the text of the selected option.
            $selectedText = $form['example_select']['#options'][$selectedValue];
            // Place the text of the selected option in our textfield.
            $form['output']['#value'] = $selectedText;
        }

        $form['search_product'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Search product'),
            '#description' => $this->t('Enter search text and hit enter key.'),
            '#maxlength' => 64,
            '#size' => 64,
            '#weight' => '0',
            // Attach AJAX callback.
            '#ajax' => [
              'callback' => '::updateSearchString',
              // Set focus to the textfield after hitting enter.
              'disable-refocus' => FALSE,
              // Trigger when user hits enter key.
              'event' => 'change',
              // Trigger after each key press.
              // 'event' => 'keyup'
              'progress' => [
                'type' => 'throbber',
                'message' => $this->t('Searching products ...'),
              ],
            ],
        ];

        //Create the submit button.
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];

        return $form;
    }


    public function updateSearchString(array &$form, FormStateInterface $form_state) {
        // Get value from search textbox.
        $searchText = $form_state->getValue('search_product');
        // Invoke the callback function.
        $response = new AjaxResponse();
        $response->addCommand(new InvokeCommand(NULL, 'MyJavascriptCallbackFunction', [$searchText]));
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        parent::validateForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
            \Drupal::messenger()->addStatus($key . ': ' . $value);
        }
    }
}
