<?php

namespace Pingpong\Support\Traits;

use Carbon\Carbon;

trait Publishable
{
    /**
     * Query scope for only published data.
     *
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeOnlyPublished($query)
    {
        return $query->whereNotNull(self::PUBLISHED_AT);
    }

    /**
     * Query scope for only drafted data.
     *
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeOnlyDrafted($query)
    {
        return $query->whereNull(self::PUBLISHED_AT);
    }

    /**
     * Determine whether the current model/data is published.
     *
     * @return bool
     */
    public function published()
    {
        return !$this->drafted();
    }

    /**
     * Determine whether the current model/data is unpublished.
     * 
     * @return bool
     */
    public function unpublished()
    {
        return $this->drafted();
    }

    /**
     * Unpublish current data.
     * 
     * @return void
     */
    public function unpublish()
    {
        $this->{self::PUBLISHED_AT} = null;
        $this->save();
    }

    /**
     * Publish current data.
     * 
     * @return void
     */
    public function publish()
    {
        $this->{self::PUBLISHED_AT} = Carbon::now();
        $this->save();
    }

    /**
     * Determine whether the current model/data is drafted.
     *
     * @return bool
     */
    public function drafted()
    {
        return is_null($this->{self::PUBLISHED_AT});
    }
}
