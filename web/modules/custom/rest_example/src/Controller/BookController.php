<?php

namespace Drupal\rest_example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Field\FieldItemListInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookController extends ControllerBase {

  public function get($id = NULL) {
    // Load the book storage.
    $storage = $this->entityTypeManager()->getStorage('node');
    if ($id) {
      $book = $storage->load($id);
      if (!$book) {
        return new JsonResponse(['error' => 'Book not found.'], 404);
      }
      return new JsonResponse($book->toArray());
    }
    else {
      $books = $storage->loadByProperties(['type' => 'basic_page']);
      $data = [];
      foreach ($books as $book) {
        $data[] = $book->toArray();
      }
      return new JsonResponse($data);
    }
  }

  public function post() {
    // Create a new book.
    $data = \Drupal::request()->request->all();
    $book = \Drupal\node\Entity\Node::create([
      'type' => 'book',
      'title' => $data['title'],
      // Add more fields as needed.
    ]);
    $book->save();

    return new JsonResponse($book->toArray(), 201);
  }

//   public function patch($id) {
//     // Update a book.
//     $data = \Drupal::request()->request->all();
//     $storage = $this->entityTypeManager()->getStorage('node');
//     $book = $storage->load($id);
//     if (!$book) {
//       return new JsonResponse(['error' => 'Book not found.'], 404);
//     }
//     foreach ($data as $key => $value) {
//       if ($book->hasField($key)) {
//         $book->set($key, $value);
//       }
//     }
//     $book->save();

//     return new JsonResponse($book->toArray(), 200);
//   }

  public function delete($id) {
    // Delete a book.
    $storage = $this->entityTypeManager()->getStorage('node');
    $book = $storage->load($id);
    if (!$book) {
      return new JsonResponse(['error' => 'Book not found.'], 404);
    }
    $book->delete();

    return new JsonResponse(['message' => 'Book deleted.'], 204);
  }

}
