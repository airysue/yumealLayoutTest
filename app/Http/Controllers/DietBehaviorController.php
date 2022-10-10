<?php

namespace App\Http\Controllers;

use App\Models\DietBehavior;
use Illuminate\Http\Request;

class DietBehaviorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $DietBehaviors = DietBehavior::orderBy('id', 'desc')->get();
    $DietBehaviors = DietBehavior::orderBy('id', 'desc')->paginate(15);
    //return view('DietBehavior.index');
    //return view('DietBehavior.indexBasic', [
    return view('DietBehavior.index', [
      'DietBehaviors' => $DietBehaviors,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('DietBehavior.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //前面key區塊的名稱為表單名    //該表格4個欄位名 db_no  db_name  db_type db_remark
    $request->validate([
      // 'db_no' => 'required',
      'db_name' => 'required'

    ]);

    $DietBehavior = new DietBehavior();

    $DietBehavior->db_name = request('db_name');
    echo 'aa=' . $DietBehavior->id;
    //$DietBehavior->db_no = 'db_' . $DietBehavior->id;
    //dd($DietBehavior->db_no);
    $DietBehavior->db_type = request('db_type');
    $DietBehavior->db_remark = request('db_remark');

    $DietBehavior->save();  //存DB
    echo 'aaa=' . $DietBehavior->id;
    $DietBehavior = DietBehavior::findOrFail($DietBehavior->id);
    echo 'newaaa=' . $DietBehavior->id;
    $DietBehavior->db_no = 'db_' . $DietBehavior->id;
    echo 'newBBB=' . $DietBehavior->db_no;
    $DietBehavior->update(
      [
        'db_no' => $DietBehavior->db_no,
        'db_type' => $DietBehavior->db_type
      ]
    );



    echo 'ss=' . $DietBehavior->db_no;
    //exit;
    //return redirect('/DietBehavior)->with('mssg', '感謝填寫!');
    return redirect('/DietBehavior')->with('success', '新增資料成功'); //bootstrap alert



  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\DietBehavior  $DietBehavior
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $DietBehavior = DietBehavior::findOrFail($id);
    return view('DietBehavior.show', [
      'DietBehavior' => $DietBehavior,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\DietBehavior  $DietBehavior
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $DietBehavior = DietBehavior::findOrFail($id);
    return view('DietBehavior.edit', compact(['DietBehavior']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DietBehavior  $DietBehavior
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'db_no' => 'required',
      'db_name' => 'required'
    ]);

    $DietBehavior = DietBehavior::findOrFail($id);
    $DietBehavior->update(
      [
        'db_no' => request('db_no'),
        'db_name' => request('db_name'),
        'db_type' => request('db_type'),
        'db_remark' => request('db_remark')
      ]
    );
    return redirect('/DietBehavior')->with('success', '更新資料成功');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\DietBehavior  $DietBehavior
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $DietBehavior = DietBehavior::findOrFail($id);
    $DietBehavior->delete();
    return redirect('/DietBehavior')->with('success', '刪除資料成功');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $DietBehaviors = DietBehavior::query()
      ->where('db_name', 'LIKE', "%{$search}%")  //要寫確實存在的欄位名稱
      ->orWhere('db_remark', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('DietBehavior.searchResult', compact('DietBehaviors'));
  }
}