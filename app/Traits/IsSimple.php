<?php

namespace App\Traits;

/**
 * Trait FilterableTrait
 *
 * @package App\Traits
 *
 */
trait IsSimple
{
    public bool $is_simple = false;

    public function setIsSimple($is_simple): static
    {
        $this->is_simple = $is_simple;
        return $this;
    }

    public function checkSimple($value)
    {
        return $this->when(!$this->is_simple , $value);
    }
}
