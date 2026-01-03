<div>
    <button wire:click="toggleWishlist"
        wire:loading.attr="disabled"
        class="btn btn-primary py-0">

        <span>{{ $is_wishlist ? 'Unwishlist' : 'Wishlist' }}</span>

        <span wire:loading class="spinner-border spinner-border-sm"></span>
    </button>
</div>