<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold  text-2xl text-center my-10">My Notifications</h1>
                        @forelse ( $notifications as $notification )
                            <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                                <div>
                                    <p>
                                        New Applicant: <span class="font-bold">{{ $notification->data['vacancy_title'] }}</span>
                                    </p>
                                    <p>
                                        Created at: <span class="font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a href="#" class="bg-indigo-500 uppercase text-sm font-bold rounded-lg p-3 border text-white">
                                        Applicants
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">No Notifications at the moment.</p>
                        @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>