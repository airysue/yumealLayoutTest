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
          貼內容在這裡





          <!-- 內容結束 -->
        </div>
      </div>
    </div>
  </div>
</x-app-layout>