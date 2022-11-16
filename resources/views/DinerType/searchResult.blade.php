<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- 很單純的頁面標題 --}}
            {{ __('餐館類型搜尋') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- 內容開始 -->

                    <div class="card">
                        <div class="card-header">
                            搜尋結果
                        </div>
                        <ul class="list-group list-group-flush">
                            @if ($DinerTypes->isNotEmpty())
                                @foreach ($DinerTypes as $DinerType)
                                    <li class="list-group-item">
                                        <h4 class="card-title"> 編號：{{ $DinerType->dt_no }} /
                                            餐館類型名稱：{{ $DinerType->dt_typename }}</h4>
                                    </li>
                                @endforeach
                            @else
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item my-3">
                                        <h4>找不到資料</h4>
                                    </li>

                            @endif

                        </ul>
                    </div>


                    <div class="mt-2 ml-2"><a href="{{ url('/DinerType') }}" style="text-align: left;">Back to HOME</a></div>

                    <!-- 內容結束 -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
