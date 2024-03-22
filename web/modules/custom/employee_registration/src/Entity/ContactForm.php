<?php

namespace Drupal\employee_registration\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
//use Drupal\employee_registration\Entity\ContactFormInterface;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\Url;

/**
 * Defines the contact form entity.
 *
 * @ConfigEntityType(
 *   id = "contact_form_new",
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\employee_registration\Form\ContactFormEditForm",
 *       "edit" = "Drupal\employee_registration\Form\ContactFormEditForm",
 *     },
 *   },
 * entity_keys = {
 *     "example_thing" = "example_thing",
 *     "other_things" = "other_things",
 * },
 * )
 */
class ContactForm extends ConfigEntityBase implements ConfigEntityInterface
{

    /**
     * The human-readable label of the category.
     *
     * @var string
     */
    protected $example_thing;

    /**
     * The message displayed to user on form submission.
     *
     * @var string
     */
    protected $other_things;

    
    public function getexample_thing()
    {
        return $this->example_thing;
    }

    /**
     * {@inheritdoc}
     */
    public function setexample_thing($example_thing)
    {
        $this->message = $example_thing;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getother_things()
    {
        return $this->other_things;
    }

    /**
     * {@inheritdoc}
     */
    public function setother_things($other_things)
    {
        $this->recipients = $other_things;
        return $this;
    }

    
}
