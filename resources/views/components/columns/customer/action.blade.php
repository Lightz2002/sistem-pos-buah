@props(['id', 'row'])

@php
  $statusObj = (object) [];

  switch($row->status) {
    case 'packing':
      $statusObj->actionName = 'Delivering';
      $statusObj->actionIcon = '<path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />';
      break;
    case 'verifying':
      $statusObj->actionName = 'Packing';
      $statusObj->actionIcon = '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />';
      break;
      break;
  }
@endphp

<div class="inline-flex align-items-center">
    <a href={{ route("orders.show", ['order' => $id]) }}
        class="inline-flex me-4 border bg-blue-400 hover:bg-blue-500 text-white px-4 py-2 text-xs rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white me-1">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span>View</span>
    </a>
    @if (auth()->user()->hasRole('sales') && in_array($row->status, ['packing', 'verifying']))
      <span data-order-id={{ $id }} data-order-status={{ strtolower($statusObj->actionName) }} class="show-status-modal inline-flex me-4 border bg-indigo-400 hover:bg-indigo-500 text-white px-4 py-2 text-xs rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 font-bold">
          {!! $statusObj->actionIcon !!}
        </svg>
        <span>{{ $statusObj->actionName }}</span>
      </span>

      @if ($row->status === 'verifying')
        <span data-order-id={{ $id }} data-order-status='rejected' class="show-status-modal inline-flex me-4 border bg-red-400 hover:bg-red-500 text-white px-4 py-2 text-xs rounded-md show-reject-modal">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 font-bold">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
          </svg>
          <span>Reject</span>
        </span>
      @endif
    @endif

    @if (auth()->user()->hasRole('customer') && $row->status === 'delivering')
      <span data-order-id={{ $id }} data-order-status='received' class="show-status-modal inline-flex me-4 border bg-green-400 hover:bg-green-500 text-white px-4 py-2 text-xs rounded-md show-reject-modal">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 font-bold">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>Receive</span>
      </span>
    @endif
</div>

