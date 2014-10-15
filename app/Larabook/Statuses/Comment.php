<?php namespace Larabook\Statuses;

class Comment extends \Eloquent {
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'status_id', 'body'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User', 'user_id');
    }

    /**
     * @param $body
     * @param $statusId
     *
     * @return static
     */
    public static function leave($body, $statusId)
    {
        return new static([
                'body' => $body,
                'status_id' => $statusId
            ]);
    }
}