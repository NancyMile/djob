<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacancies as $vacancy )
        <div class="p-6  bg-white  border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="" class="text-xl font-bold">
                    {{ $vacancy->title }}
                </a>
                <p class="text-sm text-gray-600 font-bold"> {{ $vacancy->company }}</p>
                <p class=" text-sm text-gray-500">Last day: {{ $vacancy->last_date->format('d/m/Y')}}</p>
            </div>
            <div class=" flex flex-col items-stretch gap-3 items-center mt-5 md:mt-0 md:flex-row">
                <a href="" class=" text-center bg-slate-600 p-2 text-white rounded-lg text-xs font-bold uppercase py-2 px-4">
                    Applicants
                </a>
                <a href="" class=" text-center bg-blue-600 p-2 text-white rounded-lg text-xs font-bold uppercase py-2 px-4">
                    Edit
                </a>
                <a href="" class=" text-center bg-red-600 p-2 text-white rounded-lg text-xs font-bold uppercase py-2 px-4">
                    Delete
                </a>
            </div>
        </div>
    @empty
        <p class="text-sm p-3 text-center text-gray-600 ">No vacancies at the moment.</p>
    @endforelse
</div>
<div class="mt-10">
    {{ $vacancies->links() }}
</div>
