<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestMessage extends Model
{
    use \Spatie\Tags\HasTags;
    protected $table = 'guest_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'homepage', 'text', 'created_at'
    ];

    public function tagsToString() {
        $tagsModel = collect(json_decode($this->tags));
        $tagsName = $tagsModel->map(function ($item, $key) {
            return $item->name->en;
          });
        return $tagsName->implode(',');
    }
}
