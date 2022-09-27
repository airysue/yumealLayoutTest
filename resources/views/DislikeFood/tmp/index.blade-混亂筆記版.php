<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('不討喜食物管理') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif


          <div style="width:85%;margin: auto;" class="mt-5 mb-2 d-flex flex-row ">
            <a href="{{ route('DislikeFood.create') }}" class="btn "
              style="border-radius: 0;background-color: #999;color:#fff">
              <span class="d-flex align-items-center mx-2"><i class="material-icons">&#xE147;</i><span
                  class="ml-2">新增不討喜食物</span></span>
            </a>
          </div>

          <table style="width:85%; margin: auto;">
            <thead>
              <tr>
                <th><label>編號</label></th>
                <th><label>名稱</label></th>
                <th><label>類型</label></th>
                <th><label>操作</label></th>

              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($DislikeFoods as $DislikeFood)
                <td data-label="編號"> {{ $DislikeFood->id }}</td>
                <td data-label="名稱"> {{ $DislikeFood->df_name }}</td>
                <td data-label="類型"> {{ $DislikeFood->df_type }}</td>
                <td data-label="操作">
                  <a href="{{ route('DislikeFood.show', $DislikeFood->id) }}" class="show mr-3">
                    <i class="fa-sharp fa-solid fa-eye" style="color:#36304A;" data-toggle="tooltip" title="檢視"></i></a>


                  <a href="{{ route('DislikeFood.edit', $DislikeFood->id) }}" class="edit mr-3">
                    <i class="fa-solid fa-pen-to-square" style="color:#36304A;" data-toggle="tooltip"
                      title="編輯"></i></a>





                  <form id="del_icon" action="{{ route('DislikeFood.destroy', $DislikeFood->id) }}" method="post"
                    style="display: inline-block;">
                    @csrf @method('DELETE')

                    <a href="{{ 'DislikeFood/delete/'}}{{ $DislikeFood->id }}" onclick="return confirm('確定要刪除此筆資料嗎?')">
                      <i class="fa-solid fa-trash" style="color:#36304A;" data-toggle="tooltip"
                        title="刪除04--不給刪，跑去show"></i></a>



                  </form>


                  <!--使用material-icons  只要沒有submi  或 input 就不會發生神秘底色的問題-->
                  <!--   <a href="{{ route('DislikeFood.edit', $DislikeFood->id) }}" class="edit">
      <i class="material-icons" data-toggle="tooltip" title="編輯"
          style="color:#36304A;background-color:rgba(255,255,255,0);;">&#xE254;</i></a>
-->


                  {{-- 其他有問題待釐清的寫法--}}
                  <form action="{{ route('DislikeFood.destroy', $DislikeFood->id) }}" method="post"> @csrf
                    @method('DELETE')
                    <!--
<a href="javascript:{}" onclick="document.getElementById('del_icon').submit();">
   <i class="fa-solid fa-trash" style="color:#36304A;"
   data-toggle="tooltip  title="刪除02-少了確認"></i></a>

 <a href="{{ 'DislikeFood/delete/'}}{{ $DislikeFood->id }}" onclick="return confirmation();">
     <i class="fa-solid fa-trash" style="color:#36304A;"
     data-toggle="tooltip" title="刪除00-確認突然不work"></i></a>


    -->
                    <!--
 <a href="{{ 'DislikeFood/delete/'}}{{ $DislikeFood->id }}"
   onclick="return confirm('確定要刪除此筆資料嗎?')">
   <i class="fa-solid fa-trash" style="color:#36304A;" data-toggle="tooltip"
            title="刪除04--不給刪，跑去show"></i></a>   -->


                  </form>

                  {{-- 另一種按下就刪除的按鈕 但CSS調不成功--}}
                  <!--
<form action="{{ route('DislikeFood.destroy', $DislikeFood->id) }}" method="post" onclick="return confirm('確定要刪除嗎?')" style="display: inline-block;" class="delete">
    @csrf
    @method('DELETE')
   <button class="btn mt-0" style="padding:0; border-radius:0;background-color: transprant;display: inline-block;" type="submit">
      <i class="material-icons" data-toggle="tooltip" title="刪除-刪不掉底色"
          style="background-color:rgba(255,255,255,0);display: inline-block;">delete</i>
  </button>
</form>
-->









                </td>
              </tr>
              @endforeach


            </tbody>
          </table>
          <div>

          </div>

          <div style="width:85%;margin:auto;  class=" mt-1" class="d-flex">
            <div class="card-body d-flex justify-content-end mr-0">
              {{ $DislikeFoods->appends(['search' => request()->search])->links('vendor.pagination.bootstrap-4') }}
            </div>
          </div>




        </div>
      </div>
    </div>
  </div>
</x-app-layout>