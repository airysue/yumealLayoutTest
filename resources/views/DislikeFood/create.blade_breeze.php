<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{-- 很單純的頁面標題   這個檔案會發生css相衝突，無法使用，要重新刻寫表單 --}}
      {{ __('個人檔案') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="row">
            <div class="col-md-12">




              <form action="/DislikeFood" method="post">
                <h1>不討喜食物管理 </h1>
                @csrf
                <fieldset>

                  <legend><span class="number">1</span></legend>

                  <label for="df_name">名稱:<span style="color:red;">
                      @error('df_name')
                      {{ $message }}
                      @enderror
                    </span></label>
                  <input type="text" name="df_name" value="{{ old('df_name') }}">

                  <label for="df_no">編號:<span style="color:red;">
                      @error('df_no')
                      {{ $message }}
                      @enderror
                    </span></label>
                  <input type="text" name="df_no" value="{{ old('df_no') }}">

                  <label for="df_type">類型:
                    <span style="color:red;">
                      @error('df_type')
                      {{ $message }}
                      @enderror
                    </span></label>
                  <input type="text" name="df_type" value="{{ old('df_type') }}">
                  <label for="df_remark">備註: <span style="color:red;">

                    </span></label>
                  <textarea name="df_remark" value="">{{ old('df_remark') }}</textarea>


                  <fieldset>

                    <button type="submit">存檔送出</button>

              </form>
            </div>
          </div>





        </div>
      </div>
    </div>
  </div>
</x-app-layout>