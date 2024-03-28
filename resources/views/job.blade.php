<x-layout>
    <x-slot:heading>Job Listing</x-slot:heading>
    <h2 class="font-bold text-lg">{{$job['title']}}</h2>
    <p> This job Pays  ${{$job['salary']}} per year</p>
</x-layout>
