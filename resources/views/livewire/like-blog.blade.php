<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <button wire:click="like" class="btn {{ $likes ? 'btn-danger' : 'btn-primary' }}">
        <i class="fa {{ $likes ? 'fa-heart' : 'fa-heart-o' }}"></i> {{ $likes ? 'I Liked' : 'Like' }}
        ({{ $blog->likes()->count() }})
    </button>
</div>
