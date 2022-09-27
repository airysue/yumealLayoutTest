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


                    <div style="width:85%;margin: auto;" class="d-flex justify-content-between align-items-end mb-2 mt-5">
                        <a href="{{ route('DislikeFood.create') }}" class="btn "
                            style="border-radius: 0;background-color: #999;color:#fff">
                            <span class="d-flex align-items-center mx-2"><i class="material-icons">&#xE147;</i><span class="ml-2">新增不討喜食物</span></span>
                        </a>
                        <form action="{{ route('search') }}" method="GET" class="">
                            <div class="input-group  mb-0">
                                <input type="text" name="search" id="searchBtn" placeholder="Search" required />
                                <button class="btn  ml-2" type="submit" style="border-radius: 0;background-color:#999;color:white;">搜尋</button>
                            </div>
                        </form>
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
                                            <i class="fa-sharp fa-solid fa-eye" style="color:#36304A;"
                                                data-toggle="tooltip" title="檢視"></i></a>


                                        <a href="{{ route('DislikeFood.edit', $DislikeFood->id) }}" class="edit mr-3">
                                            <i class="fa-solid fa-pen-to-square" style="color:#36304A;"
                                                data-toggle="tooltip" title="編輯"></i></a>

                                        <form id="del_icon"
                                            action="{{ route('DislikeFood.destroy', $DislikeFood->id) }}"
                                            method="post" style="display: inline-block;">
                                            @csrf @method('DELETE')

                                            <a href="{{ 'DislikeFood/delete/' }}{{ $DislikeFood->id }}"
                                                onclick="return confirm('確定要刪除此筆資料嗎?')">
                                                <i class="fa-solid fa-trash" style="color:#36304A;"
                                                    data-toggle="tooltip" title="刪除"></i></a>
                                        </form>
                                    </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    <div style="width:85%;margin:auto;  class=" mt-1" class="d-flex">
                        <div class="card-body d-flex justify-content-end mr-0">
                            {{ $DislikeFoods->appends(['search' => request()->search])->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
