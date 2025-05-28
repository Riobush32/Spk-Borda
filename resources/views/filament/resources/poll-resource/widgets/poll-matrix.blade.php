<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold mb-4">Poll Matrix</h2>

        @php
            $matrix = $this->getMatrixData();
        @endphp

        <div class="w-full overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300 dark:border-gray-600">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="border px-4 py-2 text-left bg-gray-200 dark:bg-gray-700 ">Alternative</th>
                        @foreach ($matrix['headers'] as $voter)
                            <th class="border px-4 py-2 text-center bg-gray-200 dark:bg-gray-700">{{ $voter }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matrix['rows'] as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row['alternative'] }}</td>
                            @foreach ($matrix['headers'] as $voter)
                                <td class="border px-4 py-2 text-center">{{ $row[$voter] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::card>
</x-filament::widget>
