<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler {

    protected $userRepo;

    /**
     * @param UserRepository $userRepo
     */
    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);

        $this->userRepo->follow($command->userIdToFollow, $user);

        return $user;
    }
}