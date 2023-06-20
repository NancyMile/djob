[1mdiff --git a/app/Http/Livewire/HomeVacancies.php b/app/Http/Livewire/HomeVacancies.php[m
[1mindex 13a5b35..3775644 100644[m
[1m--- a/app/Http/Livewire/HomeVacancies.php[m
[1m+++ b/app/Http/Livewire/HomeVacancies.php[m
[36m@@ -22,7 +22,11 @@[m [mpublic  function filterSearch($word, $category, $salary)[m
 [m
     public function render()[m
     {[m
[31m-        $vacancies = Vacancy::all();[m
[32m+[m[32m        //$vacancies = Vacancy::all();[m
[32m+[m[32m        $vacancies = Vacancy::when($this->word, function($query){[m
[32m+[m[32m            $query->where('title','LIKE',"%".$this->word."%");[m
[32m+[m[32m        })->get();[m
[32m+[m
         return view('livewire.home-vacancies',[[m
             'vacancies' => $vacancies[m
         ]);[m
