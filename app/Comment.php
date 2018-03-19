<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *
     */
    public function allow()
    {
        $this->status = 1;
        $this->save();
    }

    /**
     *
     */
    public function disAllow()
    {
        $this->status = 0;
        $this->save();
    }

    /**
     *
     */
    public function toggleStatus()
    {
        if($this->status == 0)
        {
            return $this->allow();
        }

        return $this->disAllow();
    }

    /**
     * @throws \Exception
     */
    public function remove()
    {
        $this->delete();
    }
}
