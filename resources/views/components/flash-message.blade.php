@props(['type' => 'success', 'confetti' => false])
<div
  class="z-10 absolute h-20 left-0 right-0 mx-auto max-w-2xl w-full bg-green-200 flex items-center px-6 sm:px-8 rounded-none sm:rounded-lg"
  x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000); {{ $confetti ? 'setTimeout(() => party.confetti($el, {count: party.variation.range(50,100)}), 100);' : ""}}" x-show="show" x-transition.duration.300ms>
  <p class="flex-1 text-green-900">
    {{ $slot }}
  </p>
</div>
