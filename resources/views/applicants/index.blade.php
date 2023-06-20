<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applicants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-bold  text-2xl text-center my-10">Applicants vacancy: {{ $vacancy->title }}</h1>
                    <div class="md:flex justify-center p-5">
                       <ul class="divide-y divide-gray-200 w-full">
                        @forelse ( $vacancy->applicants as $applicant)
                            <li class="p-3 flex items-center">
                                <div class="flex-1">
                                    <p class="text-xl font-medium text-gray-800">
                                        {{ $applicant->user->name}}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        {{ $applicant->user->email}}
                                    </p>
                                    <p class="text-sm text-gray-600 font-medium">
                                        Applied at:
                                        <span class="font-normal">{{ $applicant->created_at->diffForHumans()}} </span>
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ asset('storage/resumes/'.$applicant->resume)}}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm
                                    leading-5 font font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                    target="_blank" rel="noreferrer noopener">
                                        Resume
                                    </a>
                                </div>
                            </li>
                        @empty
                            <p class="text-sm p-3 text-center text-gray-600"> No Applicants at the moment.</p>
                        @endforelse
                       </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>