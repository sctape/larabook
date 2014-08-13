<?php namespace Larabook\Statuses;


use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{
    /**
     * Display how longs it's been since the published date
     *
     * @return mixed
     */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }

} 