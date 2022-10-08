<?php

namespace App\Http\Controllers;

use App\Models\FoodType;
use Illuminate\Http\Request;

class FoodTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $FoodTypes = FoodType::orderBy('id', 'desc')->get();
    $FoodTypes = FoodType::orderBy('id', 'desc')->paginate(15);
    //return view('FoodType.index');
    //return view('FoodType.indexBasic', [
    return view('FoodType.index', [
      'FoodTypes' => $FoodTypes,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('FoodType.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //前面key區塊的名稱為表單名    //該表格4個欄位名 ft_no  ft_name  ft_type ft_remark
    $request->validate([
      'ft_no' => 'required',
      'ft_typename' => 'required',

    ]);

    $FoodType = new FoodType();

    $FoodType->ft_typename = request('ft_typename');
    $FoodType->ft_no = request('ft_no');
    $FoodType->ft_sort = request('ft_sort');
    $FoodType->ft_remark = request('ft_remark');

    $FoodType->save();  //存DB

    //return redirect('/FoodType)->with('mssg', '感謝填寫!');
    return redirect('/FoodType')->with('success', '新增資料成功'); //bootstrap alert



  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\FoodType  $FoodType
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $FoodType = FoodType::findOrFail($id);
    return view('FoodType.show', [
      'FoodType' => $FoodType,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\FoodType  $FoodType
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $FoodType = FoodType::findOrFail($id);
    return view('FoodType.edit', compact(['FoodType']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\FoodType  $FoodType
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'ft_no' => 'required',
      'ft_typename' => 'required'
    ]);

    $FoodType = FoodType::findOrFail($id);
    $FoodType->update(
      [
        'ft_no' => request('ft_no'),
        'ft_typename' => request('ft_typename'),
        'ft_sort' => request('ft_sort'),
        'ft_remark' => request('ft_remark')
      ]
    );
    return redirect('/FoodType')->with('success', '更新資料成功');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\FoodType  $FoodType
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $FoodType = FoodType::findOrFail($id);
    $FoodType->delete();
    return redirect('/FoodType')->with('success', '刪除資料成功');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $FoodTypes = FoodType::query()
      ->where('ft_typenname', 'LIKE', "%{$search}%")  //要寫確實存在的欄位名稱
      ->orWhere('ft_remark', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('FoodType.searchResult', compact('FoodTypes'));
  }
}