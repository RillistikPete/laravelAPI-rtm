<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repo;
use App\Http\Resources\Repo as RepoResource;

class RepoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repo = Repo::paginate(15);

        //return collection of repos (array) as a resource
        return RepoResource::collection($repo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repo = $request->isMethod('put') ? Repo::findOrFail($request->repo_id) : new Repo;

        $repo->title = $request->input('title');
        $repo->body = $request->input('body');

        if($repo->save()){
            return new RepoResource($repo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get single article
        $repo = Repo::findOrFail($id);

        return new RepoResource($repo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get single article
        $repo = Repo::findOrFail($id);

        if($repo->delete()){
            return new RepoResource($repo);
        }
    }
}
