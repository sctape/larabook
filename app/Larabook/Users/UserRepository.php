<?php namespace Larabook\Users;


class UserRepository {

    /**
     * Persist a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Get a paginated list of all users
     *
     * @param int $howMany
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }

    /**
     * Fetch a user given a username
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with(['statuses' => function($query)
            {
                $query->latest();
            }])->whereUsername($username)->first();
    }

    /**
     * Find a user by ID
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Follow a Larabook user
     *
     * @param      $userIdToFollow
     * @param User $user
     *
     * @return mixed
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->follows()->attach($userIdToFollow);
    }
} 