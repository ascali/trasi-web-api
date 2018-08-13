<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    /**
     * Create a new auth instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Get all data from News
     */
    public function index(Request $request)
    {
      $news = new News;
      $res['status'] = true;
      $res['data'] = $news->all();
      return response($res);
    }
    /**
     * Insert database forRole
     * Url : /News
     */
    public function create(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|unique:news',
        'category' => 'required',
        'main' => 'required',
        'image' => 'required',
        'updated_by' => 'required'
      ]);
      $news = new News;
      $news->fill([
        'title' => $request->input('title'),
        'category' => $request->input('category'),
        'main' => $request->input('main'),
        'image' => $request->input('image'),
        'created_by' => $request->input('updated_by'),
        'updated_by' => $request->input('updated_by'),
      ]);
      if($news->save()){
        $res['status'] = true;
        $res['data'] = 'Success add new News!';
        return response($res);
      }
    }
    /**
     * Get one News by id
     * Url : /News/{id}
     */
    public function read(Request $request, $id)
    {
      $news =News::where('news_id',$id)->first();
      if ($news !== null) {
        $res['status'] = true;
        $res['data'] = $news;
        return response($res);
      }else{
        $res['status'] = false;
        $res['data'] = [];
        return response($res);
      }
    }
    /**
     * Update News by ud
     */
    public function update(Request $request)
    {
      $this->validate($request, [
        'news_id' => 'required',
        'title' => 'required',
        'category' => 'required',
        'main' => 'required',
        'image' => 'required',
        'updated_by' => 'required'
      ]);
      $id = $request->input('news_id');
      $news = News::find($id);
      if ($news !== null) {
        $news->update([
          'title' => $request->input('title'),
          'category' => $request->input('category'),
          'main' => $request->input('main'),
          'image' => $request->input('image'),
          'updated_by' => $request->input('updated_by'),
        ]);
        $res['status'] = true;
        $res['data'] = 'Success update '.$request->input('title');
        return response($res);
      }else{
        $res['status'] = false;
        $res['data'] = 'Please fill id News!';
        return response($res);
      }
    }
    /**
     * Delete News by id
     */
    public function delete(Request $request, $id)
    {
      $news =News::find($id);
      if ($news->delete($id)) {
          $res['status'] = true;
          $res['data'] = 'Success delete News!';
          return response($res);
      }
    }
}