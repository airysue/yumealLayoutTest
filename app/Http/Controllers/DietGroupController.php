<?php

namespace App\Http\Controllers;

use App\Models\DietGroup;
use Illuminate\Http\Request;

class DietGroupController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $DietGroups = DietGroup::orderBy('id', 'desc')->get();
    $DietGroups = DietGroup::orderBy('id', 'desc')->paginate(15);
    //return view('DietGroup.index');
    //return view('DietGroup.indexBasic', [
    return view('DietGroup.index', [
      'DietGroups' => $DietGroups,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('DietGroup.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //前面key區塊的名稱為表單名    //該表格4個欄位名 dg_no  dg_name  dg_type dg_remark
    $request->validate([
      'dg_no' => 'required',
      'dg_name' => 'required'
    ]);

    $DietGroup = new DietGroup();

    $DietGroup->dg_name = request('dg_name');
    $DietGroup->dg_no = request('dg_no');
    $DietGroup->dg_type = request('dg_type');
    $DietGroup->dg_remark = request('dg_remark');

    $DietGroup->save();  //存DB

    //return redirect('/DietGroup)->with('mssg', '感謝填寫!');
    return redirect('/DietGroup')->with('success', '新增資料成功'); //bootstrap alert



  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\DietGroup  $DietGroup
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $DietGroup = DietGroup::findOrFail($id);
    return view('DietGroup.show', [
      'DietGroup' => $DietGroup,
    ]);
  }


  public function edit($id)
  {
    $DietGroup = DietGroup::findOrFail($id);
    return view('DietGroup.edit', compact(['DietGroup']));
  }


  public function update(Request $request, $id)
  {
    $request->validate([
      'dg_no' => 'required',
      'dg_name' => 'required'
    ]);

    $DietGroup = DietGroup::findOrFail($id);
    $DietGroup->update(
      [
        'dg_no' => request('dg_no'),
        'dg_name' => request('dg_name'),
        'dg_type' => request('dg_type'),
        'dg_remark' => request('dg_remark')
      ]
    );
    return redirect('/DietGroup')->with('success', '更新資料成功');
  }


  public function destroy($id)
  {
    $DietGroup = DietGroup::findOrFail($id);
    $DietGroup->delete();
    return redirect('/DietGroup')->with('success', '刪除資料成功');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $DietGroups = DietGroup::query()
      ->where('dg_name', 'LIKE', "%{$search}%")  //要寫確實存在的欄位名稱
      ->orWhere('dg_remark', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('DietGroup.searchResult', compact('DietGroups'));
  }
}