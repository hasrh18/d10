<?php

namespace Drupal\user_tracking\Event;

use Drupal\Component\EventDispatcher\Event;

/**
 * Event that is fired when a user logs in.
 */
class UserLoginEvent extends Event {

  CONST USER_LOGIN = 'user_tracking.user_login';

  /**
   * The user ID.
   *
   * @var int
   */
  protected $uid;

  
  

  /**
   * The login time.
   *
   * @var int
   */
  protected $ip_address;

  /**
   * Constructs a new UserLoginEvent object.
   *
   * @param int $uid
   *   The user ID.
   * @param int $loginTime
   *   The login time.
   */
  public function __construct($uid, $ip_address) {
    $this->uid = $uid;
    $this->ip_address = $ip_address;
  }

  /**
   * Gets the user ID.
   *
   * @return int
   *   The user ID.
   */
  public function getUid() {
    return $this->uid;
  }

  /**
   * Gets the login time.
   *
   * @return int
   *   The login time.
   */
  public function getClientIp() {
    return $this->ip_address;
  }
}
