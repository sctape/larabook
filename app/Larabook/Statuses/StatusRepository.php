<?php namespace Larabook\Statuses;


use Larabook\Users\User;

class StatusRepository {

    /**
     * Get all statuses created by given user
     *
     * @param User $user
     * @return mixed
     */
    public function getAllForUser(User $user)
    {
        return $user->statuses()->with('user')->latest()->get();
    }

    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
    }

    /**
     * Save a new status for a user
     *
     * @param Status $status
     * @param        $userId
     *
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)
            ->statuses()
            ->save($status);
    }

    public function leaveComment($user_id, $status_id, $body)
    {
        $comment = Comment::leave($body, $status_id);

        User::findOrFail($user_id)->comments()->save($comment);

        return $comment;
    }
} 