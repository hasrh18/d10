<?php

namespace Drupal\sample_rest_resource\Plugin\rest\resource;

use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "rest_samplepost",
 *   label = @Translation("Rest samplepost"),
 *   uri_paths = {
 *     "create" = "/rest/d10/api/post/items"
 *   }
 * )
 */
class RestSamplepost extends ResourceBase {

  /**
   * Responds to POST requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The HTTP response object.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\HttpException
   *   Throws exception expected.
   */
  public function post($data) {
    dump($data);

   // You must to implement the logic of your REST Resource here.
   $datal = ['message' => 'Hello, this is a rest service and parameter is: '.$data['name']];
	    
    $response = new ResourceResponse($datal);
    // In order to generate fresh result every time (without clearing 
    // the cache), you need to invalidate the cache.
    $response->addCacheableDependency($datal);
    return $response;
  }

}
