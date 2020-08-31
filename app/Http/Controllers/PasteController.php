<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePasteRequest;
use App\Models\Paste;
use App\Repositories\PasteRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PasteController extends Controller
{
    /** @var PasteRepository */
    private $pasteRepository;

    public function __construct() {
        $this->pasteRepository = app(PasteRepository::class);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(){
        return view('paste.create');
    }

    /**
     * @param CreatePasteRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreatePasteRequest $request){
        $attributes = $request->validated();
        $paste = $this->pasteRepository->store($attributes);
        return redirect('paste', 200)->with(['paste' => $paste->id]);
    }

    /**
     * @param Paste $paste
     * @return Application|Factory|View
     */
    public function paste(Paste $paste) {
        return view('paste.detail', ['PASTE' => $paste]);
    }

    /**
     * @param string $link
     * @return Application|Factory|View
     */
    public function linkedPaste(string $link) {
        $paste = $this->pasteRepository->getPasteByLink($link);
        return view('paste.detail', ['PASTE' => $paste]);
    }

}
