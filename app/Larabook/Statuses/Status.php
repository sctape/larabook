<?php namespace Larabook\Statuses;


use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status Extends \Eloquent {

    use EventGenerator, PresentableTrait;

    /**
     * Fillable fields for a new status
     *
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * Path to the presenter for a status
     *
     * @var string
     */
    protected $presenter = 'Larabook\Statuses\StatusPresenter';

    /**
     * A status belongs to a user
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }

    /**
     * Publish a new status
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(['body' => $body]);

        $status->raise(new StatusWasPublished($body));

        return $status;
    }
} 