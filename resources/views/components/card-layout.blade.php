<div class="flex items-center justify-center p-4">
  <div class="max-w-sm w-full bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all">
    <div class="relative">
      <img
        src="{{ env('APP_LOGO') }}"
        class="w-full h-52 object-cover"
      />
      <span class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">
        {{ config('app.name') }}
      </span>
    </div>

    <div class="space-y-4">
        {{ $slot }}
    </div>
  </div>
</div>
