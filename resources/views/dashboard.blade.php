@php
    $date = new DateTime();

    // Create an array to hold the dates for the next week
    $nextWeek = array();

    for ($i = 1; $i <= 7; $i++) {
        // Clone the current date
        $nextDay = clone $date;

        // Add the necessary number of days to get to the next day of the week
        $nextDay->add(new DateInterval("P{$i}D"));

        // Add the next day to the array
        $nextWeek[] = $nextDay;
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <p class="inline-flex justify-center px-4 text-sm font-medium text-white shadow">
        Here you can register for dinner for upcoming week
        </p>
        <p class="justify-center px-4 text-sm font-medium text-white shadow">
        Remember, you can register before 9 AM for today.
        </p>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 1g:px-8 flex flex-col gap-1">
            @foreach ($nextWeek as $day)
                <div class="bg-gray-600 sm:rounded-lg basis-full">,
                    <div class="p-6 bg-gray-400">
                        <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ $day->format('l, d/m/Y') }}</h3>
                    </div>
                        <div class="md:grid md:grid-cols-1 sm:px-2 lg:px-6 sm:my-2 lg:my-4">
                            <div class="md:col-span-1">
                                <a href="{{ route('meals.create') }}" 
                                    class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm">Register</a>
                                <a href= ""
                                    class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm">Remove</a>
                            </div>
                        </div>
                </div>

            @endforeach
        </div>
    </div>
</x-app-layout>