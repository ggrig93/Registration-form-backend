<?php
namespace App\DTO;

class BaseDto
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

}
