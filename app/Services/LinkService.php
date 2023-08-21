<?php

namespace App\Services;

use App\Repositories\LinkRepository;
use App\Services\Contracts\LinkServiceInterface;

class LinkService implements LinkServiceInterface
{
    public function __construct(protected LinkRepository $linkRepository) {}

    public function visit(string $uuid): string
    {
        $link = $this->linkRepository->get($uuid);

        if ($link->limit > 0) {
            $link->limit = $link->limit === 1 ? -1 : $link->limit - 1;

            $link->save();
        }

        return $link->url;
    }
}
