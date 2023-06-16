<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @foreach ($vacancies as $vacancy )
        <div class="p-6  bg-white  border-b border-gray-200">
            <div class="leading-10">
                <a href="" class="text-xl font-bold">
                    {{ $vacancy->title }}
                </a>

            </div>
        </div>
    @endforeach
    
    
</div>
