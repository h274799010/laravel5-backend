<?php namespace App\Http\Controllers\Backend;

use Dingo\Api\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect, Input;
use App\Models\Comment;

class CommentController extends BaseController
{

    public function __construct($repository = '')
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return view('admin.comments.edit')->withComment(Comment::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate(
            $request,
            [
                'nickname' => 'required',
                'content' => 'required',
            ]
        );
        if (Comment::where('id', $id)->update(Input::except(['_method', '_token']))) {
            return Redirect::to('admin/comments');
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        $comment->delete();

        return Redirect::to('admin/comments');
    }

}
