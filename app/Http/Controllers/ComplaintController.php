<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Complaint;

class ComplaintController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

	public function get_complaint(Request $request)
  {
    // $m_complaint = Complaint::orderBy('complaint_id', 'DESC')->get();
    $m_complaint = app('db')->select("SELECT c.*, u.* FROM complaints c join users u ON c.user_id=u.user_id ORDER BY c.complaint_id DESC");
		if (count($m_complaint) == 0) {
      $res['status'] = false;
      $res['data'] = [];
      return response($res);
		} else {
			$res['status'] = true;
			$res['data'] = $m_complaint;
			return response($res);
		}
  }

  public function get_complaint_user_id(Request $request, $id){
    $m_complaint = app('db')->select("SELECT c.*, u.*, c.created_at, c.updated_at FROM complaints c join users u ON c.user_id=u.user_id WHERE c.user_id = '$id' ORDER BY c.complaint_id DESC");
    if (count($m_complaint) == 0) {
      $res['status'] = false;
      $res['data'] = [];
      return response($res);
    } else {
      $res['status'] = true;
      $res['data'] = $m_complaint;
      return response($res);
    }
  }

  public function get_complaint_id(Request $request, $id)
  {
    $m_complaint = Complaint::where('complaint_id', $id)->get();
    if (count($m_complaint) == 0) {
      $res['status'] = false;
      $res['data'] = [];
      return response($res);
    } else {
      $res['status'] = true;
      $res['data'] = $m_complaint;
      return response($res);
    }
  }

    public function sos_complaint(Request $request)
    {
      // you can insert the user last position here
      // ... code
      // then you insert the complaint with last position user
      $complaint = new Complaint;
      $complaint->fill([
        'user_id' => $request->input('user_id'),
        'complaint_type' => 1,
        // 'in_charge_police' => $request->input('in_charge_police'),
        // 'description' => $request->input('description'),
        'complaint_status' => 0,
        'latitude' => $request->input('latitude'),
        'longitude' => $request->input('longitude'),
        'address' => $request->input('address'),
        'created_by' => $request->input('updated_by'),
        'updated_by' => $request->input('updated_by')
      ]);
      if($complaint->save()){
        $res['status'] = true;
        $res['data'] = [];
        return response($res);
      }
    }

    public function update(Request $request)
    {

      $id = $request->input('complaint_id');
      $Complaint = Complaint::find($id);
      if ($Complaint !== null) {
        $Complaint->update([
          'in_charge_police' => $request->input('in_charge_police'),
          'complaint_status' => 1,
          'updated_by' => $request->input('updated_by'),
        ]);
        $res['status'] = true;
        $res['data'] = 'Success update '.$request->input('in_charge_police');
        return response($res);
      }else{
        $res['status'] = false;
        $res['data'] = 'Please fill field!';
        return response($res);
      }
    }

    
}