<?php
/**
 * Created by PhpStorm.
 * User: sctap_000
 * Date: 8/6/2014
 * Time: 5:10 PM
 */

namespace Larabook\Statuses;


class PublishStatusCommand {

    public $body;
    public $userId;

    /**
     * @param $body
     * @param $userId
     */
    function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }
} 