<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
  public function index()
  {
    $Meals = Meal::orderBy('id', 'desc')->get();
    $Meals = Meal::orderBy('id', 'desc')->paginate(10);
    //return view('Meal.index');
    //return view('Meal.indexBasic', [
    return view('Meal.index', [
      'Meals' => $Meals,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Meal.create');
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

    $request->validate([
      'mea_photo' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'mea_name' => 'required',
      'mea_photo' => 'required'
    ]);

    //處理圖片上傳 start
    $file = $request->file('mea_photo');
    $file_ready = $request->hasFile('mea_photo'); //先判斷圖片有沒有上傳成功
    // dd($Meal->mea_photo);dd($file);
    if ($file_ready) {
      //$file_ext = $file->getClientOriginalExtension();
      $file_name = time() . '-mea_' . $request->file('mea_photo')->getClientOriginalName();
      //$fileName = time() . '-mea_' . $request->file('mea_photo')->getClientOriginalName();  //1664897691-mea_期盼.png
      //寫法1：
      //$file_path = public_path('/images'); //系統會自動在public\目錄下 建立一個images 資料夾 （前提是）filessystems有設定為 public。路徑顯示方式不太友善需要再調整。
      //寫法2：
      $file_path = $request->file('mea_photo')->storeAs('images', $file_name, 'public'); //這個寫法會將存放資料夾和檔名一起呈現。
      // $file->move(
      //   $file_path,
      //   $file_name
      // );
      //echo '$file_path=  ' . $file_path;
      //寫法1印出：$file_path=  V:\xampp8017\htdocs\laravel\yumealLayoutTest\public\/files
      //寫法2印出：$file_path=  files/1665038316-mea_期盼.png
      //echo '<br>$file=  ' . $file;
      //寫法1印出：$file= V:\xampp8017\tmp\phpA3B1.tmp
      //寫法2印出：$file= V:\xampp8017\tmp\phpEAF4.tmp
      //exit;

      //File::move($source,$destination)

      //$path = $request->file('mea_photo')->storeAs('images', $fileName, 'public');  //照片已存入public\storage\images\1664897691-mea_期盼.png
      //echo '$path=' . $path;  //印出  $path=images/1664897691-mea_期盼.png
      //dd($path);
      //$Meal->mea_photo =  '/storage/' . $path;


      $Meal = new Meal();

      //$Meal-> = request('');
      $Meal->mea_name = request('mea_name');  //$Meal->欄名 = request('表單名');up`,
      $Meal->mea_no = request('mea_no');
      $Meal->mea_type = json_encode(request('mea_type'), JSON_UNESCAPED_UNICODE);
      $Meal->mea_intr = request('mea_intr');
      $Meal->mea_price = request('mea_price');
      $Meal->mea_DislikeFood = json_encode(request('mea_DislikeFood'), JSON_UNESCAPED_UNICODE);
      $Meal->mea_DietGroup = json_encode(request('mea_DietGroup'), JSON_UNESCAPED_UNICODE);
      $Meal->user_id = Auth::user()->id;
      $Meal->mea_remark01 = request('mea_remark01');
      $Meal->mea_photo = $file_name; //只存檔名
      $Meal->mea_photo_path =  '/storage/' . $file_path; //檔名連同圖檔所在資料夾路徑

      //dd($Meal->mea_photo);
    } else {
      return redirect()->route('Meal.index')->with('warning', "File upload error");
    }
    //處理圖片上傳 end

    $Meal->save();  //存DB

    //return redirect('/Meal)->with('mssg', '感謝填寫!');
    return redirect('/Meal')->with('success', '新增資料成功'); //bootstrap alert

  }



  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Meal  $Meal
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $Meal = Meal::findOrFail($id);
    return view('Meal.show', [
      'Meal' => $Meal,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Meal  $Meal
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $Meal = Meal::findOrFail($id);
    return view('Meal.edit', compact(['Meal']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Meal  $Meal
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    $Meal = Meal::findOrFail($id);


    //$file_name = $Meal->mea_photo;
    //$file_path = $Meal->mea_photo_path;
    //資料庫的簡單連結路徑，並無法使用在 unlink()方法上，要想辦法將路徑弄成真實在硬碟上存在的路徑
    //php無法正常顯示一條倒斜線，解決方法：利用兩個倒斜線來轉譯，頁面上看到的字串會變成一個倒斜線

    $file_path = public_path() . '\\storage\\images\\' . $Meal->mea_photo;
    echo '$file_path=' . $file_path;
    //會印出$file_path=V:\xampp8017\htdocs\laravel\yumealLayoutTest\public\storage\images\1665041647-mea_多行不義必自斃.png
    //exit;

    if ($request->hasFile('mea_photo')) {  //如果本來就有檔案存在

      unlink($file_path); //字面上看似是解除與該檔案的連結，實際上實體的檔案也會被刪掉


      $file_name = time() . '-mea_' . $request->file('mea_photo')->getClientOriginalName();

      $file_path = $request->file('mea_photo')->storeAs('images', $file_name, 'public');

      $Meal->mea_photo = $file_name;
      $Meal->mea_photo_path =  '/storage/' . $file_path; //public之後的檔名路徑，檔名連同圖檔所在資料夾路徑
      echo '<br>$file_name=' . $file_name;
      echo '<br>$Meal->mea_photo=' . $Meal->mea_photo;
      echo '<br>$Meal->mea_photo_path=' . $Meal->mea_photo_path; //exit;

    } else {  //如果沒有新的檔案被傳入，就顯示原來舊有的檔案資料
      $Meal->mea_photo = $request->ori_mea_photo;
    }
    //dd($file_path);


    $Meal->update(
      [
        'mea_no' => request('mea_no'),
        'mea_name' => request('mea_name'),
        'mea_type' => json_encode(
          request('mea_type'),
          JSON_UNESCAPED_UNICODE
        ),
        'mea_DislikeFood' => json_encode(
          request('mea_DislikeFood'),
          JSON_UNESCAPED_UNICODE
        ),
        'mea_DietGroup' => json_encode(
          request('mea_DietGroup'),
          JSON_UNESCAPED_UNICODE
        ),

        'mea_photo' => $Meal->mea_photo,
        'mea_photo_path' => $Meal->mea_photo_path,
        'mea_remark01' => request('mea_remark01')
      ]
    );
    //dd($Meal);

    return redirect('/Meal')->with('success', '更新資料成功');
  }



  public function destroy($id)
  {
    $Meal = Meal::findOrFail($id);

    $real_file_path = public_path() . '\\storage\\images\\' . $Meal->mea_photo;
    echo '$real_file_path=' . $real_file_path;
    //exit;
    unlink($real_file_path);

    $Meal->delete();
    return redirect(url('/Meal'))->with('success', '刪除資料成功');
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $Meals = Meal::query()
      ->where('mea_name', 'LIKE', "%{$search}%")  //要寫確實存在的欄位名稱
      ->orWhere('mea_remark01', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('Meal.searchResult', compact('Meals'));
  }
}