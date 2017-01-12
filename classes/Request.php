<?php

/**
 * Holds request properties to be passed between dispatcher and elevators,
 * plus receives updates as work happens.
 */
class Request
{
    private $id;
    private $created;
    private $started;
    private $completed;
    private $floor;
    private $action;

    public function __construct(array $params)
    {
        // Initialize the request from params map.
        foreach ($params as $k => $v) {
            $this->$k = $v;
        }
    }

}