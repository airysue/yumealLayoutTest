<?php

namespace App\Http\Controllers;

use App\Models\DislikeFood;
use Illuminate\Http\Request;

class DislikeFoodController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $DislikeFoods = DislikeFood::orderBy('id', 'desc')->get();
    $DislikeFoods = DislikeFood::orderBy('id', 'desc')->paginate(25);
    //return view('DislikeFood.index');
    //return view('DislikeFood.indexBasic', [
    return view('DislikeFood.index', [
      'DislikeFoods' => $DislikeFoods,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('DislikeFood.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //前面key區塊的名稱為表單名    //該表格4個欄位名 df_no  df_name  df_type df_remark
    $request->validate([
      'df_no' => 'required',
      'df_name' => 'required'
    ]);

    $DislikeFood = new DislikeFood();

    $DislikeFood->df_name = request('df_name');
    $DislikeFood->df_no = request('df_no');
    $DislikeFood->df_type = request('df_type');
    $DislikeFood->df_remark = request('df_remark');

    $DislikeFood->save();  //存DB

    //return redirect('/DislikeFood)->with('mssg', '感謝填寫!');
    return redirect('/DislikeFood')->with('success', '新增資料成功'); //bootstrap alert



  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\DislikeFood  $DislikeFood
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $DislikeFood = DislikeFood::findOrFail($id);
    return view('DislikeFood.show', [
      'DislikeFood' => $DislikeFood,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\DislikeFood  $dislikeFood
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $DislikeFood = DislikeFood::findOrFail($id);
    return view('DislikeFood.edit', compact(['DislikeFood']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DislikeFood  $dislikeFood
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    //return $request->input();    exit;
    $request->validate([
      'df_no' => 'required',
      'df_name' => 'required'

    ]);

    $DislikeFood = DislikeFood::findOrFail($id);
    $DislikeFood->update(
      [
        'df_no' => request('df_no'),
        'df_name' => request('df_name'),
        'df_type' => request('df_type'),
        'df_remark' => request('df_remark')
      ]
    );
    return redirect('/DislikeFood')->with('success', '更新資料成功');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\DislikeFood  $dislikeFood
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $DislikeFood = DislikeFood::findOrFail($id);
    $DislikeFood->delete();
    return redirect('/DislikeFood')->with('success', '刪除資料成功');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $DislikeFoods = DislikeFood::query()
      ->where('df_name', 'LIKE', "%{$search}%")  //要寫確實存在的欄位名稱
      ->orWhere('df_remark', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('DislikeFood.searchResult', compact('DislikeFoods'));
  }
}