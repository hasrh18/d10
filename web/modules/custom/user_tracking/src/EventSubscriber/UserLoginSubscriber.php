<?php

namespace Drupal\user_tracking\EventSubscriber;

use Drupal\user_tracking\Event\UserLoginEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\Core\Url;

/**
 * Class UserLoginSubscriber.
 *
 * @package Drupal\user_tracking
 */
class UserLoginSubscriber implements EventSubscriberInterface {

  /**
   * Reacts on user login event.
   *
   * @param \Drupal\user_tracking\Event\UserLoginEvent $event
   *   The event.
   */
  public function onUserLogin(UserLoginEvent $event) {
    $uid = $event->getUid();

    $current_time = \Drupal::time()->getCurrentTime();
    $loginTime = date('Y-m-d H:i:s', $current_time); 
    $ip_address = $event->getClientIp();
    
    /**
     * Get the current route path.
     */
    function get_current_route_path() {
        $currentPath = \Drupal::service('path.current')->getPath();
        return $currentPath;
    }
  
    // Usage:
    // $current_url = get_current_route_path();
    $current_url = 'http://' .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

  // $currentPath will contain the path of the current route as a string.
    // Save to custom table.
    $this->saveLoginData($uid, $loginTime, $ip_address, $current_url);
  }

  /**
   * Saves login data to custom table.
   *
   * @param int $uid
   *   The user ID.
   * @param int $loginTime
   *   The login timestamp.
   * * @param varchar $ip_address
   *   The ip_address .
   */
  protected function saveLoginData($uid, $loginTime, $ip_address, $current_url) {
    $connection = \Drupal::database();
    $connection->insert('userinfo')
      ->fields([
        'uid' => $uid,
        'login_time' => $loginTime,
        'ip_address' => $ip_address,
        'history' => $current_url,
      ])
      ->execute();
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events = [ 
      'user_tracking.user_login' => 'onUserLogin',
    ];
    return $events;
  }

}
