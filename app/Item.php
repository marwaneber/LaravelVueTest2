<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function item()
    {
        return $this->belongsTo(Category::class);
    }

    public function createItem(array $details) : self
    {
        $item = new self([
            'description' => $details['description'],
            'title' => $details['title']
        ]);
        $item->save();
        return $item;
    }
}
