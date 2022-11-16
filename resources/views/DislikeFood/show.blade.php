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
                            不討喜食物小檔案
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">名稱：{{ $DislikeFood->df_name }}</li>
                                <li class="list-group-item">編號：{{ $DislikeFood->df_no }}</li>
                                <li class="list-group-item">類型：{{ $DislikeFood->df_type }}</li>
                                <li class="list-group-item">備註：{{ $DislikeFood->df_remark }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="my-2 ml-2"><a href="/DislikeFood" style="text-align: left;">Back to HOME</a></div>





<!-- 內容結束 -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
