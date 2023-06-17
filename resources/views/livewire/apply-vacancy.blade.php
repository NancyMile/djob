<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Apply to this vacancy</h3>
    <form wire:submit.prevent='apply' class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="resume" :value="__('resume (PDF)')" />
            <input type="file" wire:model="resume" id="resume" accept=".pdf" class="block mt-1 w-full"/>
        </div>
        @error('resume')
            <livewire:display-alert :message="$message"/>
        @enderror
        <x-primary-button>
            {{ __('Send') }}
        </x-primary-button>
    </form>
</div>
