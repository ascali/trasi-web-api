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
        // 'image' => 'required',
        'updated_by' => 'required'
      ]);

      // $image = Str::random(34);
      $request->file('image')->move('/', $_FILES['image']['name']);

      $news = new News;
      $news->fill([
        'title' => $request->input('title'),
        'category' => $request->input('category'),
        'main' => $request->input('main'),
        // 'image' => $_FILES['image'],
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
        // 'image' => 'required',
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

    public function newsImage(Request $request, $id)
    {
      $target_dir = "assets/images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              $res['data'] = "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              $res['data'] = "File is not an image.";
              $uploadOk = 0;
          }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
          $res['data'] = "Sorry, file already exists.";
          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          $res['data'] = "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          $res['data'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          $res['data'] = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $res['data'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          } else {
              $res['data'] = "Sorry, there was an error uploading your file.";
          }
      }
      $res['status'] = true;
      // $res['data'] = [];
      return response($res);
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