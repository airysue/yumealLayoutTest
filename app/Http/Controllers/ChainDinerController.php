<?php

namespace App\Http\Controllers;

use App\Models\ChainDiner;
use Illuminate\Http\Request;

class ChainDinerController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $ChainDiners = ChainDiner::orderBy('id', 'desc')->get();
    $ChainDiners = ChainDiner::orderBy('id', 'desc')->paginate(10);
    //return view('ChainDiner.index');
    //return view('ChainDiner.indexBasic', [
    return view('ChainDiner.index', [
      'ChainDiners' => $ChainDiners,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('ChainDiner.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //前面key區塊的名稱為表單名    //該表格4個欄位名 cd_no  cd_name  cd_type cd_remark
    $request->validate([
      'cd_no' => 'required',
      'cd_name' => 'required',
      'cd_type' => 'required',
    ]);

    $ChainDiner = new ChainDiner();

    $ChainDiner->cd_name = request('cd_name');
    $ChainDiner->cd_no = request('cd_no');
    $ChainDiner->cd_type = request('cd_type');
    $ChainDiner->cd_remark = request('cd_remark');

    $ChainDiner->save();  //存DB

    //return redirect('/ChainDiner)->with('mssg', '感謝填寫!');
    return redirect('/ChainDiner')->with('success', '新增資料成功'); //bootstrap alert



  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ChainDiner  $ChainDiner
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $ChainDiner = ChainDiner::findOrFail($id);
    return view('ChainDiner.show', [
      'ChainDiner' => $ChainDiner,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ChainDiner  $ChainDiner
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $ChainDiner = ChainDiner::findOrFail($id);
    return view('ChainDiner.edit', compact(['ChainDiner']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ChainDiner  $ChainDiner
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'cd_no' => 'required',
      'cd_name' => 'required',
      'cd_type' => 'required',
    ]);

    $ChainDiner = ChainDiner::findOrFail($id);
    $ChainDiner->update(
      [
        'cd_no' => request('cd_no'),
        'cd_name' => request('cd_name'),
        'cd_type' => request('cd_type'),
        'cd_remark' => request('cd_remark')
      ]
    );
    return redirect('/ChainDiner')->with('success', '更新資料成功');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ChainDiner  $ChainDiner
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $ChainDiner = ChainDiner::findOrFail($id);
    $ChainDiner->delete();
    return redirect('/ChainDiner')->with('success', '刪除資料成功');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');
    // Search in the title and body columns from the posts table
    $ChainDiners = ChainDiner::query()
      ->where('cd_name', 'LIKE', "%{$search}%")  //要寫確實存在的欄位名稱
      ->orWhere('cd_remark', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('ChainDiner.searchResult', compact('ChainDiners'));
  }
}