<?php

namespace App\Http\Controllers;

use App\Models\DinerType;
use Illuminate\Http\Request;

class DinerTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $DinerTypes = DinerType::orderBy('id', 'desc')->get();
    $DinerTypes = DinerType::orderBy('id', 'desc')->paginate(15);
    //return view('DinerType.index');
    //return view('DinerType.indexBasic', [
    return view('DinerType.index', [
      'DinerTypes' => $DinerTypes,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('DinerType.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    //前面key區塊的名稱為表單名    //該表格4個欄位名 dt_no  dt_name  dt_sort dt_remark
    $request->validate([
      'dt_no' => 'required',
      'dt_typename' => 'required'
    ]);

    $DinerType = new DinerType();

    $DinerType->dt_typename = request('dt_typename');
    $DinerType->dt_no = request('dt_no');
    $DinerType->dt_sort = request('dt_sort');
    $DinerType->dt_remark = request('dt_remark');

    $DinerType->save();  //存DB

    //return redirect('/DinerType)->with('mssg', '感謝填寫!');
    return redirect('/DinerType')->with('success', '新增資料成功'); //bootstrap alert



  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\DinerType  $DinerType
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $DinerType = DinerType::findOrFail($id);
    return view('DinerType.show', [
      'DinerType' => $DinerType,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\DinerType  $DinerType
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $DinerType = DinerType::findOrFail($id);
    return view('DinerType.edit', compact(['DinerType']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DinerType  $DinerType
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //return $request->input();     exit;

    $request->validate([
      'dt_no' => 'required',
      'dt_typename' => 'required'
    ]);

    $DinerType = DinerType::findOrFail($id);
    $DinerType->update(
      [
        'dt_no' => request('dt_no'),
        'dt_typename' => request('dt_typename'),
        'dt_sort' => request('dt_sort'),
        'dt_remark' => request('dt_remark')
      ]
    );
    return redirect('/DinerType')->with('success', '更新資料成功');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\DinerType  $DinerType
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $DinerType = DinerType::findOrFail($id);
    $DinerType->delete();
    return redirect('/DinerType')->with('success', '刪除資料成功');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $DinerTypes = DinerType::query()
      ->where('dt_typenname', 'LIKE', "%{$search}%")  //要寫確實存在的欄位名稱
      ->orWhere('dt_remark', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('DinerType.searchResult', compact('DinerTypes'));
  }
}