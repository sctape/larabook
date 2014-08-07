<?php
/**
 * Created by PhpStorm.
 * User: sctap_000
 * Date: 8/7/2014
 * Time: 12:06 PM
 */

namespace Larabook\Statuses\Events;


class StatusWasPublished {


    public $body;

    function __construct($body)
    {

        $this->body = $body;
    }
} 