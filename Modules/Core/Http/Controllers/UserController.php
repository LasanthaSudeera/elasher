<?php

namespace Modules\Core\Http\Controllers;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Modules\Core\Features\UpdateUserFeature;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('core::index');
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
    public function show($id)
    {
        return view('core::show');
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
    public function update($id)
    {
        $this->serve(UpdateUserFeature::class, ['id' => $id]);
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

    public function myProfile()
    {
        $pageName = 'My Profile';
        $breadcrumbs = [
            'My Profile' => null
        ];
        return view('core::user.profile')->with([
            'pageName' => $pageName,
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
