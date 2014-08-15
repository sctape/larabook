<?php namespace Larabook\Users;

class FollowUserCommand {

    /**
     * @var string
     */
    public $userId;

    /**
     * @var string
     */
    public $userIdToFollow;

    /**
     * @param string userId
     * @param string userIdToFollow
     */
    public function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }

}