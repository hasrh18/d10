<?php

namespace Drupal\sample_rest_resource\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Psr\Log\LoggerInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Render\Markup;
/**
 * Provides a resource to get view modes by entity and bundle.
 * @RestResource(
 *   id = "custom_get_rest_resource",
 *   label = @Translation("Custom Get Rest Resource"),
 *   uri_paths = {
 *     "canonical" = "/vb-rest"
 *   }
 * )
 */
class SampleGetRestResource extends ResourceBase {
    /**
   * Responds to entity GET requests.
   * @return \Drupal\rest\ResourceResponse
   */
  public function get() {
    // dump("hello");
    $response = ['message' => 'Hello, this is a rest service'];
    return new ResourceResponse($response);
  }

  public function post() {

    // You must to implement the logic of your REST Resource here.
    // Use current user after pass authentication to validate access.

    /*
    if(!$this->currentUser->hasPermission($permission)) {
        throw new AccessDeniedHttpException();
    }
    */

    // Throw an exception if it is required.
    // throw new HttpException(t('Throw an exception if it is required.'));
    return new ResourceResponse("Implement REST State POST!");
  }

}