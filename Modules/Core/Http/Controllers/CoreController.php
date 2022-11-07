<?php

namespace Modules\Core\Http\Controllers;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $breadCrumbs = [
            'Home' => route('home'),
            'Test' => null
        ];
        return view('core::index')->with([
            'pageName' => 'Core Index',
            'breadcrumbs' => $breadCrumbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('core::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        $breadCrumbs = [
            'Home' => route('home'),
            'Test' => null
        ];
        return view('core::index')->with([
            'pageName' => 'Core Show',
            'breadcrumbs' => $breadCrumbs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('core::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
