<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkStoreRequest;
use App\Repositories\LinkRepository;
use App\Services\Contracts\LinkServiceInterface;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function __construct(
        protected LinkServiceInterface $linkService,
        protected LinkRepository $linkRepository
    ) {}

    public function show(string $uuid): RedirectResponse
    {
        $url = $this->linkService->visit($uuid);

        return response()->redirectTo($url);
    }

    public function store(LinkStoreRequest $request): RedirectResponse
    {
        $link = $this->linkRepository->create($request->validated());

        return redirect()->back()->with('createdLink', $link);
    }
}
