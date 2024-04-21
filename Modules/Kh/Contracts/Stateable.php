<?php

namespace Modules\Kh\Contracts;

interface Stateable
{
    /**
     * Get the state id
     * @return mixed
     */
    public function getEntityId();

    /**
     * Get the foreign key
     * @return string
     */
    public function getForeignKey();

    /**
     * Get the entity key
     * @return string
     */
    public function getEntityKey();
}
