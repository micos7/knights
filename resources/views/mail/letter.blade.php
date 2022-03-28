<div class="max-w-screen mx-auto sm:px-6 lg:px-8">

    <table class="w-full text-sm text-center text-gray-800 dark:text-gray-400">
        <thead class="
              text-xs text-gray-900
              uppercase
              bg-gray-50
              dark:bg-gray-700 dark:text-gray-400
            ">
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Age</th>
            <th scope="col" class="px-6 py-3">Health</th>
            <th scope="col" class="px-6 py-3">Courage</th>
            <th scope="col" class="px-6 py-3">Justice</th>
            <th scope="col" class="px-6 py-3">Mercy</th>
            <th scope="col" class="px-6 py-3">Generosity</th>
            <th scope="col" class="px-6 py-3">Faith</th>
            <th scope="col" class="px-6 py-3">Nobility</th>
            <th scope="col" class="px-6 py-3">Hope</th>
            <th scope="col" class="px-6 py-3">Strength</th>
            <th scope="col" class="px-6 py-3">Defence</th>
            <th scope="col" class="px-6 py-3">Battle</th>
            <th scope="col" class="px-6 py-3">Picture</th>
            <th scope="col" class="px-6 py-3">Virtues</th>
            <th scope="col" class="px-6 py-3">Exclude</th>
        </thead>
        @foreach ($knights as $knight)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">{{ $knight->id }}</td>
            <td class="px-6 py-4">{{ $knight->name }}</td>
            <td class="px-6 py-4">{{ $knight->age }}</td>
            <td class="px-6 py-4">{{ $knight->health }}</td>
            <td class="px-6 py-4">{{ $knight->courage }}</td>
            <td class="px-6 py-4">{{ $knight->justice }}</td>
            <td class="px-6 py-4">{{ $knight->mercy }}</td>
            <td class="px-6 py-4">{{ $knight->generosity }}</td>
            <td class="px-6 py-4">{{ $knight->faith }}</td>
            <td class="px-6 py-4">{{ $knight->nobility }}</td>
            <td class="px-6 py-4">{{ $knight->hope }}</td>
            <td class="px-6 py-4">{{ $knight->strength }}</td>
            <td class="px-6 py-4">{{ $knight->defence }}</td>
            <td class="px-6 py-4">{{ $knight->battle }}</td>
            <td class=""><img src="{{$knight->picture}}" alt="" /></td>
            <td>{{ $knight->virtues }}</td>
            <td class="px-6 py-4"><a href="http://localhost:8000/exclude/{{$knight->id}}" onclick="return confirm('Are you sure you want to exclude this knight?')">Exclude</a></td>
        </tr>
        @endforeach
    </table>
</div>