<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Apply to this vacancy</h3>
    <form class="w-96 mt-5">
        <x-input-label for="resume" :value="__('resume (PDF)')" />
        <input type="file" name="resume" id="resume" accept=".pdf" class="block mt-1 w-full">
    </form>
</div>
