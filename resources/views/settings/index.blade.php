<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('settings.updateAll') }}" method="POST">
                @csrf
                <table class="table-auto w-full border-collapse mb-4">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-left">Setting Name</th>
                            <th class="border px-4 py-2 text-left">Text</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settings as $setting)
                            <tr>
                                <td class="border px-4 py-2 font-semibold">{{ $setting->name }}</td>
                                <td class="border px-4 py-2">
                                    <textarea name="settings[{{ $setting->id }}]" rows="2" class="w-full border rounded px-3 py-2">{{ $setting->text }}</textarea>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
            </form>
        </div>
    </body>

</x-app-layout>
