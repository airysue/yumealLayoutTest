<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- 很單純的頁面標題 --}}
            {{ __('個人檔案') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
<!-- 內容開始 -->


                    <div class="card mt-4">
                        <div class="card-header">
                            餐飲店基本資料
                        </div>
                        <div class="card-body">
                         {{-- `din_intr`, ``, ``, ``, ``, ``, ``, ``, ``, ``, --}}

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">名稱：{{ $Diner->din_name }}</li>
                                <li class="list-group-item">編號：{{ $Diner->din_no }}</li>
                                <li class="list-group-item">類型：{{ $Diner->din_type }}</li>
                                <li class="list-group-item">特色介紹：{{ $Diner->din_intr }}</li>
                                <li class="list-group-item">開店時間：{{ $Diner->din_openTime }}</li>
                                <li class="list-group-item">關店時間：{{ $Diner->din_closeTime }}</li>
                                <li class="list-group-item">地址：{{ $Diner->din_addr }}</li>
                                <li class="list-group-item">公休日：{{ $Diner->din_holiday }}</li>
                                <li class="list-group-item">email：{{ $Diner->din_email }}</li>
                                <li class="list-group-item">能否內用：{{ $Diner->din_takeoutOnly }}</li>
                                <li class="list-group-item">外加服務費：{{ $Diner->din_extraServiceFee }}</li>
                                <li class="list-group-item">服務費率：{{ $Diner->din_serviceFee }}</li>
                                <li class="list-group-item">網址：{{ $Diner->din_url01 }}</li>
                                <li class="list-group-item">備註：{{ $Diner->din_remark }}</li>
                                <li class="list-group-item">備註：{{ $Diner->din_photo }}</li>
                                <li class="list-group-item">備註：
                                {{-- <img src="{{ asset($Diner->din_photo) }}" alt="" style="max-width: 500px"></li> --}}
                                <img src="{{ asset($Diner->din_photo_path) }}" alt="" style="max-width: 500px"></li>

                            </ul>
                        </div>
                    </div>

          <div class="my-2 ml-2"><a href={{ url('/Diner') }} style="text-align: left;" >Back to HOME</a></div>





<!-- 內容結束 -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
