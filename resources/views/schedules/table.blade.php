<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <!-- CONTENT -->
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h2 class="text-2xl font-bold text-center">Schedules for {{ $school->name }}</h2>

                <table class="min-w-full mt-4 table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Subject</th>
                            <th class="px-4 py-2">Teacher</th>
                            <th class="px-4 py-2">Day</th>
                            <th class="px-4 py-2">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($school->schedules as $schedule)
                            <tr>
                                <td class="border px-4 py-2">{{ $schedule->subject->name }}</td>
                                <td class="border px-4 py-2">{{ $schedule->teacher->name }}</td>
                                <td class="border px-4 py-2">{{ $schedule->day }}</td>
                                <td class="border px-4 py-2">{{ $schedule->time }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</x-app-layout>
