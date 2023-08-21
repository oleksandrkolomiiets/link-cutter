<?php

namespace App\Repositories;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Support\Str;

class LinkRepository
{
    public function get(string $uuid): Link
    {
        return Link::where('uuid', $uuid)
            ->where('valid_until', '>', Carbon::now())
            ->where('limit', '>', -1)
            ->firstOrFail();
    }

    public function create(array $values): Link
    {
        $link = new Link();
        $link->fill($values);

        $link->save();

        return $link;
    }
}
