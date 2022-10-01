<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Diner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DinerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $Diners = Diner::orderBy('id', 'desc')->get();
    $Diners = Diner::orderBy('id', 'desc')->paginate(15);
    //return view('Diner.index');
    //return view('Diner.indexBasic', [
    return view('Diner.index', [
      'Diners' => $Diners,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Diner.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //return $request->input();   exit;

    //前面key區塊的名稱為表單名
    //表格自建欄位 `din_no`, `din_name`, `din_intr`, `din_type`, `din_openTime`, `din_closeTime`, `din_addr`, `din_holiday`, `din_email`, `din_takeoutOnly`, `din_extraServiceFee`, `din_serviceFee`, `din_remark01`
    $request->validate([
      'din_no' => 'required',
      'din_name' => 'required'


    ]);

    $Diner = new Diner();

    $Diner->din_name = request('din_name');  //$Diner->欄名 = request('表單名');
    $Diner->din_no = request('din_no');
    $Diner->din_type = json_encode(request('din_type'), JSON_UNESCAPED_UNICODE);
    $Diner->din_intr = request('din_intr');

    //處理時間欄位(http://static.kancloud.cn/kancloud/laravel-5-learning-notes/50163)
    $Diner->din_openTime = Carbon::parse($request->input('din_openTime'))->toTimeString();
    $Diner->din_closeTime = Carbon::parse($request->input('din_closeTime'))->toTimeString();

    $Diner->din_tel = request('din_tel');
    $Diner->din_addr = request('din_addr');
    $Diner->din_holiday = request('din_holiday');
    $Diner->din_email = request('din_email');

    //用 enum 處理radio button
    $Diner->din_takeoutOnly = request('din_takeoutOnly');
    $Diner->din_extraServiceFee = request('din_extraServiceFee');
    $Diner->din_serviceFee = request('din_serviceFee');
    $Diner->user_id = Auth::user()->id;
    $Diner->din_url01 = request('din_url01');
    $Diner->din_remark01 = request('din_remark01');

    $Diner->save();  //存DB

    //return redirect('/Diner)->with('mssg', '感謝填寫!');
    return redirect('/Diner')->with('success', '新增資料成功'); //bootstrap alert



  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Diner  $Diner
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $Diner = Diner::findOrFail($id);
    return view('Diner.show', [
      'Diner' => $Diner,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Diner  $Diner
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $Diner = Diner::findOrFail($id);
    return view('Diner.edit', compact(['Diner']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Diner  $Diner
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'din_no' => 'required',
      'din_name' => 'required'

    ]);

    $Diner = Diner::findOrFail($id);
    $Diner->update(
      [
        'din_no' => request('din_no'),
        'din_name' => request('din_name'),
        'din_type' => json_encode(
          request('din_type'),
          JSON_UNESCAPED_UNICODE
        ),

        'din_openTime' => request('din_openTime'),
        'din_closeTime' => request('din_closeTime'),
        'din_tel' => request('din_tel'),
        'din_addr' => request('din_addr'),
        'din_holiday' => request('din_holiday'),
        'din_email' => request('din_email'),
        'din_takeoutOnly' => request('din_takeoutOnly'),
        'din_extraServiceFee' => request('din_extraServiceFee'),
        'din_serviceFee' => request('din_serviceFee'),
        'din_url01' => request('din_url01'),
        'din_remark01' => request('din_remark01')

      ]
    );
    return redirect('/Diner')->with('success', '更新資料成功');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Diner  $Diner
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $Diner = Diner::findOrFail($id);
    $Diner->delete();
    return redirect('/Diner')->with('success', '刪除資料成功');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $Diners = Diner::query()
      ->where('din_name', 'LIKE', "%{$search}%")  //要寫確實存在的欄位名稱
      ->orWhere('din_remark01', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('Diner.searchResult', compact('Diners'));
  }
}