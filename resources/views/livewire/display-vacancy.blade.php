<div class="p-10">
    <div class="mb-5">
        <h1 class=" text-3xl font-bold text-gray-800 my-3">{{ $vacancy->title }}</h1>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class=" font-bold text-sm text-gray-800 my-3 uppercase">
                Company: <span class="normal-case font-normal">{{ $vacancy->company }}</span>
            </p>
            <p class=" font-bold text-sm text-gray-800 my-3 uppercase">
                Last Day: <span class="normal-case font-normal">{{ $vacancy->last_date->toFormattedDateString() }}</span>
            </p>
            <p class=" font-bold text-sm text-gray-800 my-3 uppercase">
                Category: <span class="normal-case font-normal">{{ $vacancy->category->category }}</span>
            </p>
            <p class=" font-bold text-sm text-gray-800 my-3 uppercase">
                Salary: <span class="normal-case font-normal">{{ $vacancy->salary->salary }}</span>
            </p>
            <p class=" font-bold text-sm text-gray-800 my-3 uppercase">
                Company: <span class="normal-case font-normal">{{ $vacancy->company }}</span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacancies/'.$vacancy->image) }}" alt="{{$vacancy->title}}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold  mb-5">Description</h2>
            <p>{{ $vacancy->description }}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>Apply  <a href="{{ route('register') }}" class="font-bold text-indigo-600"> Create Account</a></p>
        </div>
    @endguest
    @cannot('create','App\\Models\Vacancy')
        <livewire:apply-vacancy/>
    @endcannot
</div>
