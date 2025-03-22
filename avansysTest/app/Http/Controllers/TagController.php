<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;

    public function __construct()
    {
        $this->tagService = new TagService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->tagService->getAllTags();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->tagService->createTag($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->tagService->getTagById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->tagService->updateTag($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->tagService->deleteTag($id);
    }
}
