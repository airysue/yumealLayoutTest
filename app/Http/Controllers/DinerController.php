<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Diner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


// use Intervention\Image\ImageManagerStatic as Image;

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
    $Diners = Diner::orderBy('id', 'desc')->paginate(10);
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

  /*
  public function store(Request $request)
  {
    //return $request->input();   exit;

    //前面key區塊的名稱為表單名
    //表格自建欄位 `din_no`, `din_name`, `din_intr`, `din_type`, `din_openTime`, `din_closeTime`, `din_addr`, `din_holiday`, `din_email`, `din_takeoutOnly`, `din_extraServiceFee`, `din_serviceFee`, `din_remark01`
    $request->validate([
      'din_photo' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      //'file' => 'required|csv,txt,xlx,xls,pdf|max:2048', //一般檔案的寫法，還沒試是否能成功
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
    $Diner->din_photo = request('din_photo');

    //處理圖片上傳 start
    $file = $request->hasFile('din_photo'); //先判斷圖片有沒有上傳成功
    // dd($Diner->din_photo);dd($file);
    if ($file) {
      $requestData = $request->din_photo;
      $fileName = time() . '-din_' . $request->file('din_photo')->getClientOriginalName();  //1664897691-din_期盼.png
      $path = $request->file('din_photo')->storeAs('images', $fileName, 'public');  //照片已存入public\storage\images\1664897691-din_期盼.png
      echo '$path=' . $path;  //印出  $path=images/1664897691-din_期盼.png
      //dd($path);

      $Diner->din_photo =  '/storage/' . $path;
      //dd($Diner->din_photo);
    } else {
      return redirect()->route('Diner.index')->with('warning', "File upload error");
    }
    //處理圖片上傳 end

    $Diner->save();  //存DB

    //return redirect('/Diner)->with('mssg', '感謝填寫!');
    return redirect('/Diner')->with('success', '新增資料成功'); //bootstrap alert

  }
   */

  //重新改寫
  public function store(Request $request)
  {
    //return $request->input();   exit;

    //前面key區塊的名稱為表單名

    $request->validate([
      'din_photo' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      //'file' => 'required|csv,txt,xlx,xls,pdf|max:2048', //一般檔案的寫法，還沒試是否能成功
      'din_no' => 'required',
      'din_name' => 'required',
      'din_photo' => 'required'
    ]);

    //處理圖片上傳 start
    $file = $request->file('din_photo');
    $file_ready = $request->hasFile('din_photo'); //先判斷圖片有沒有上傳成功
    // dd($Diner->din_photo);dd($file);
    if ($file_ready) {
      //$file_ext = $file->getClientOriginalExtension();
      $file_name = time() . '-din_' . $request->file('din_photo')->getClientOriginalName();
      //$fileName = time() . '-din_' . $request->file('din_photo')->getClientOriginalName();  //1664897691-din_期盼.png
      //寫法1：
      //$file_path = public_path('/images'); //系統會自動在public\目錄下 建立一個images 資料夾 （前提是）filessystems有設定為 public。路徑顯示方式不太友善需要再調整。
      //寫法2：
      $file_path = $request->file('din_photo')->storeAs('images', $file_name, 'public'); //這個寫法會將存放資料夾和檔名一起呈現。
      $file->move(
        $file_path,
        $file_name
      );
      echo '$file_path=  ' . $file_path;
      //寫法1印出：$file_path=  V:\xampp8017\htdocs\laravel\yumealLayoutTest\public\/files
      //寫法2印出：$file_path=  files/1665038316-din_期盼.png
      echo '<br>$file=  ' . $file;
      //寫法1印出：$file= V:\xampp8017\tmp\phpA3B1.tmp
      //寫法2印出：$file= V:\xampp8017\tmp\phpEAF4.tmp
      //exit;

      //File::move($source,$destination)

      //$path = $request->file('din_photo')->storeAs('images', $fileName, 'public');  //照片已存入public\storage\images\1664897691-din_期盼.png
      //echo '$path=' . $path;  //印出  $path=images/1664897691-din_期盼.png
      //dd($path);
      //$Diner->din_photo =  '/storage/' . $path;


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
      $Diner->din_photo = request('din_photo');
      $Diner->din_photo = $file_name; //只存檔名
      $Diner->din_photo_path =  '/storage/' . $file_path; //檔名連同圖檔所在資料夾路徑






      //dd($Diner->din_photo);
    } else {
      return redirect()->route('Diner.index')->with('warning', "File upload error");
    }
    //處理圖片上傳 end

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
  /* 修改前
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
 */

  public function update(Request $request, $id)
  {

    $Diner = Diner::findOrFail($id);
    // $request->validate([
    //   'din_no' => 'required',
    //   'din_name' => 'required'
    // ]);
    $file = $request->file('din_photo');
    $file_ready = $request->hasFile('din_photo');

    $file_name = $Diner->din_photo;
    //$file_path = $Diner->din_photo_path;
    $file_path = public_path() . '\\storage\\images\\' . $Diner->din_photo;
    echo '$file_path=' . $file_path;  //$file_path=images/1665040741-din_多行不義必自斃.png
    //$file_path01 = public_path('\images' . $file_name);
    echo '<br>$file_path01=' . $file_path;  //$file_path01=images/1665040741-din_多行不義必自斃.png
    //exit;$file_path = app_path().'/images/news/'.$news->photo;

    if ($request->hasFile('din_photo')) {


      unlink($file_path);

      $new_upload = $request->file('din_photo');
      $file_name = time() . '-din_' . $request->file('din_photo')->getClientOriginalName();

      $file_path = $request->file('din_photo')->storeAs('images', $file_name, 'public');

      $Diner->din_photo = $file_name;
      $Diner->din_photo_path =  '/storage/' . $file_path; //檔名連同圖檔所在資料夾路徑
      echo 'here i am__' . $file_name;
      echo '<br>$Diner->din_photo=' . $Diner->din_photo;
      echo '<br>$Diner->din_photo_path=' . $Diner->din_photo_path;
      //exit;
    } else {
      $Diner->din_photo = $request->ori_din_photo;
    }
    //dd($file_path);

    // $Diner->din_name = request('din_name');  //$Diner->欄名 = request('表單名');
    // $Diner->din_no = request('din_no');
    // $Diner->din_type = json_encode(request('din_type'), JSON_UNESCAPED_UNICODE);
    // $Diner->din_intr = request('din_intr');

    // //處理時間欄位(http://static.kancloud.cn/kancloud/laravel-5-learning-notes/50163)
    // $Diner->din_openTime = Carbon::parse($request->input('din_openTime'))->toTimeString();
    // $Diner->din_closeTime = Carbon::parse($request->input('din_closeTime'))->toTimeString();

    // $Diner->din_tel = request('din_tel');
    // $Diner->din_addr = request('din_addr');
    // $Diner->din_holiday = request('din_holiday');
    // $Diner->din_email = request('din_email');

    // //用 enum 處理radio button
    // $Diner->din_takeoutOnly = request('din_takeoutOnly');
    // $Diner->din_extraServiceFee = request('din_extraServiceFee');
    // $Diner->din_serviceFee = request('din_serviceFee');
    // $Diner->user_id = Auth::user()->id;
    // $Diner->din_url01 = request('din_url01');
    // $Diner->din_remark01 = request('din_remark01');
    // $Diner->din_photo = request('din_photo');
    // //$Diner->din_photo = $file_name; //只存檔名






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
        'din_photo' => request('din_photo'),
        'din_photo_path' => $Diner->din_photo_path,
        'din_remark01' => request('din_remark01')

      ]
    );
    //dd($Diner);
    /**/
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
    return redirect(url('/Diner'))->with('success', '刪除資料成功');
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



  // public function uploadimage(Request $request)
  // //public function uploadimage(Request $imagerequest)
  // {
  //   $imagefile = $request->din_photo;
  //   if ($imagefile != NULL) {
  //     $image = $request->file('din_photo');
  //     $filename = time() . '.' . $request->photo->extension();
  //     $image_resize = Image::make($image->getRealPath());
  //     $image_resize->fit(250);
  //     $image_resize->save(public_path($filename));
  //     //$image_resize->save(public_path('users_photo/' . $filename));
  //   }
  // }
}