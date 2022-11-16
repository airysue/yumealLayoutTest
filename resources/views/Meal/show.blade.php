<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- 很單純的頁面標題 --}}
            {{ __('餐點基本資料') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
<!-- 內容開始 -->


                    <div class="card mt-4">
                        <div class="card-header">
                            餐點基本資料
                        </div>
                        <div class="card-body">
                         {{-- <li class="list-group-item">：{{ $Meal-> }}</li> --}}

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">名稱：{{ $Meal->mea_name }}</li>
                                <li class="list-group-item">編號：{{ $Meal->mea_no }}</li>
                                <li class="list-group-item">類型：{{ $Meal->mea_type }}</li>
                                <li class="list-group-item">特色介紹：{{ $Meal->mea_intr }}</li>

                                <li class="list-group-item">餐點價格：{{ $Meal->mea_price }}</li>
                                <li class="list-group-item">餐點包含食材：{{ $Meal->mea_DislikeFood }}</li>
                                <li class="list-group-item">餐點適合族群：{{ $Meal->mea_DietGroup }}</li>
                                <li class="list-group-item">備註：{{ $Meal->mea_remark }}</li>
                                <li class="list-group-item">餐點圖片名稱：{{ $Meal->mea_photo }}</li>
                                <li class="list-group-item">餐點圖片：
                                {{-- <img src="{{ asset($Meal->mea_photo) }}" alt="" style="max-width: 500px"></li> --}}
                                <img src="{{ asset($Meal->mea_photo_path) }}" alt="" style="max-width: 500px"></li>

                            </ul>
                        </div>
                    </div>

          <div class="my-2 ml-2"><a href="{{ url('/Meal') }}"  style="text-align: left;" >Back to HOME</a></div>





<!-- 內容結束 -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
