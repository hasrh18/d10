<?php

namespace Drupal\sample_rest_resource\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Provides a resource to do CRUD operations for a custom entity.
 *
 * @RestResource(
 *   id = "custom_rest_resource",
 *   label = @Translation("Custom REST Resource"),
 *   uri_paths = {
 *     "canonical" = "/api/custom/{id}"
 *   }
 * )
 */
class CustomRestResource extends ResourceBase {

  /**
   * Responds to GET requests.
   *
   * @param $id
   *   The ID of the entity to retrieve.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing the entity.
   */
  public function get($id = NULL) {
    // Load entity by ID.
    $entity = \Drupal::entityTypeManager()
      ->getStorage('custom_entity')
      ->load($id);

    if (!$entity) {
      throw new BadRequestHttpException("Entity with ID $id not found.");
    }

    // Return the entity as response.
    return new ResourceResponse($entity);
  }

  /**
   * Responds to POST requests.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing the saved entity.
   */
  public function post(Request $request) {
    // Create a new entity object.
    $entity = \Drupal::entityTypeManager()
      ->getStorage('custom_entity')
      ->create($request->request->all());

    $entity->save();

    // Return the saved entity as response.
    return new ResourceResponse($entity);
  }

  /**
   * Responds to PATCH requests.
   *
   * @param $id
   *   The ID of the entity to update.
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing the updated entity.
   */
//   public function patch($id, Request $request) {
//     // Load the entity by ID.
//     $entity = \Drupal::entityTypeManager()
//       ->getStorage('custom_entity')
//       ->load($id);

//     if (!$entity) {
//       throw new BadRequestHttpException("Entity with ID $id not found.");
//     }

//     // Update entity fields.
//     $entity->set($request->request->all());
//     $entity->save();

//     // Return the updated entity as response.
//     return new ResourceResponse($entity);
//   }

  /**
   * Responds to DELETE requests.
   *
   * @param $id
   *   The ID of the entity to delete.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response confirming deletion.
   */
  public function delete($id) {
    // Load the entity by ID.
    $entity = \Drupal::entityTypeManager()
      ->getStorage('custom_entity')
      ->load($id);

    if (!$entity) {
      throw new BadRequestHttpException("Entity with ID $id not found.");
    }

    // Delete the entity.
    $entity->delete();

    // Return response.
    return new ResourceResponse(["message" => "Entity with ID $id deleted."]);
  }

}
