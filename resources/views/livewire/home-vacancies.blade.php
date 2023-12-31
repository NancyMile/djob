<div>
    <livewire:vacancy-filter/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12">Vacancies</h3>
            <div class="bg-white shadow rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacancies as $vacancy)
                    <div class="md:flex md:justify-between md:items-center py-5 ">
                        <div class="md:flex-1">
                            <a href="{{ route('vacancies.show',$vacancy->id) }}" class=" text-3xl font-extrabold text-gray-600">
                                {{ $vacancy->title}}
                            </a>
                            <p class="text-base text-gray-600 mb-3">
                                {{ $vacancy->company }}
                            </p>
                            <p class="text-xs text-gray-600 font-bold mb-3">
                                {{ $vacancy->category->category }}
                            </p>
                            <p class="text-xs text-gray-600 mb-3">
                                {{ $vacancy->salary->salary }}
                            </p>
                            <p class="font-bold text-xs text-gray-600">
                                Open till: <span class="font-normal">{{ $vacancy->last_date->format('d-m-Y')}}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a href="{{ route('vacancies.show',$vacancy->id) }}" class="bg-indigo-500 uppercase text-sm font-bold rounded-lg p-3 border text-white block text-center">
                                Vacancy
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No Vacancies at The moment.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
