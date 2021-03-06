<?php

namespace Figview\Http\Controllers;

use Figview\Repositories\UserRepository;
use Figview\Services\UserService;
use Illuminate\Http\Request;

use Figview\Http\Requests;
use Figview\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var UserService
     */
    private $service;

    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->service->find($userId);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
    }
}
