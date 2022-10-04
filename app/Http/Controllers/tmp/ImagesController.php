<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Intervention\Image\ImageManagerStatic as Image;

class ImagesController extends Controller
{
  public function uploadimage(Request $request)
  {
    // if (Input::hasfile('image')) {
    //   $request->file('image')->move(public_path('img/s/'), $request->file('image')->getClientOriginalName());

    //   $product->image = 'img/products/' . $request->file('image')->getClientOriginalName();
    // }


    $imagefile = $request->photo;
    echo $imagefile;
    if ($imagefile != NULL) {
      $image = $request->file('photo');
      $filename = time() . '.' . $request->photo->extension();
      $image_resize = Image::make($image->getRealPath());
      $image_resize->fit(250);
      //$image_resize->save(public_path($filename));
      $image_resize->save(public_path('users_photo/' . $filename));
      echo "<img src='" . $filename . "'>";
    }
  }
}