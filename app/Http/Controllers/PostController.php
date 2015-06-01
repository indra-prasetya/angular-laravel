<?php namespace Camp\Http\Controllers;

use Illuminate\Http\Request;
use Camp\Http\Requests;
use Camp\Post;

class PostController extends Controller
{

    private $request;

    function __construct(Request $request)
    {
        $this->request = $request;	
		$this->middleware('jwtauth', ['except' => ['show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {    	
        return Post::all();
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
    public function store()
    {
        $input = $this->request->all();
        $post = new Post($input);
        if (!$post->save()) {
            abort(500, "Saving failed.");
        }
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Post::find($id);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $post = Post::find((int)$id);
        $post->title = $this->request->input('title');
        $post->body = $this->request->input('body');
        if (!$post->save()) {
            abort(500, "Saving failed");
        }
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Post::destroy($id);
    }

}
