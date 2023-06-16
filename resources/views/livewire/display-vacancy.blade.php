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
</div>
