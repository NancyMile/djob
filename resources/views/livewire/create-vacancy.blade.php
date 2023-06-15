<form class="md:w-1/2 space-y-5" wire:submit.prevent='createVacancy'>
    <!-- Email Address -->
    <div>
        <x-input-label for="title" :value="__('Vacancy Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" placeholder="vacancy title" :value="old('title')" />
        @error('title')
            <livewire:display-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="salary" :value="__('Salary')" />
        <select wire:model="role" id="salary" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
        focus:border-indigo-500 dark:focus:border-indigo-600
        focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="">-- Select--</option>
            @foreach ($salaries as $salary )
                <option value="{{ $salary->id}}">{{ $salary->salary}}</option>
            @endforeach
        </select>
        @error('salary')
            <livewire:display-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select wire:model="category" id="category" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
        focus:border-indigo-500 dark:focus:border-indigo-600
        focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="">-- Select --</option>
            @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{ $category->category }}-</option>
                
            @endforeach
        </select>
        @error('category')
            <livewire:display-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" placeholder="company" :value="old('company')" />
        @error('company')
            <livewire:display-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="last_day" :value="__('Open until ')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')" />
        @error('last_day')
            <livewire:display-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="description" :value="__('description')" />
        <textarea id="description" wire:model="description" placeholder="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
        focus:border-indigo-500 dark:focus:border-indigo-600
        focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72">{{old('description')}}</textarea>
        @error('description')
            <livewire:display-alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="image" :value="__('image')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="image" />
        @error('image')
            <livewire:display-alert :message="$message" />
        @enderror
    </div>
    <x-primary-button>
        {{ __('Create Vacancy') }}
    </x-primary-button>
</form>
