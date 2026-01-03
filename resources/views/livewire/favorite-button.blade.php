<div>
    <button wire:click="toggleFavorite"
        wire:loading.attr="disabled" @click="clicked = true"
        class="btn btn-danger py-0">

        <span>{{ $is_favorited ? 'Unfavorite' : 'Favorite' }}</span>

        <span wire:loading class="spinner-border spinner-border-sm"></span>
    </button>
</div>