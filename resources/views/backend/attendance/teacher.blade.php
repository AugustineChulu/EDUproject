<x-app-layout>

    <div class="w-full block">
        <div class="flex flex-wrap sm:flex-no-wrap justify-between">
    
            <div class="w-full sm:w-1/2 mr-2 mb-6">
                <h3 class="text-gray-700 uppercase font-bold mb-2">Class List</h3>
                <div class="flex flex-wrap items-center">
                    @foreach ($teacher->classes as $class)
                        <div class="w-full sm:w-1/2 text-center border border-gray-400 rounded">
                            <div class="text-gray-800 uppercase font-semibold px-4 py-4 mb-2">{{ $class->class_name }}</div>
                            <a href="{{ route('teacher.attendance.create',$class->id) }}" class="bg-green-600 inline-block mb-4 text-xs text-white uppercase font-semibold px-4 py-2 border border-gray-200 rounded">Manage Attendence</a>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="w-full sm:w-1/2 ml-2 mb-6">
                <h3 class="text-gray-700 uppercase font-bold mb-2">Subject List</h3>
                <div class="flex items-center bg-gray-600 rounded-tl rounded-tr">
                    <div class="w-1/3 text-left text-white py-2 px-4 font-semibold">Code</div>
                    <div class="w-1/3 text-left text-white py-2 px-4 font-semibold">Subject</div>
                    <div class="w-1/3 text-right text-white py-2 px-4 font-semibold">Teacher</div>
                </div>
                @foreach ($teacher->subjects as $subject)
                    <div class="flex items-center justify-between border border-gray-200">
                        <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->subject_code }}</div>
                        <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->name }}</div>
                        <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-medium">{{ $subject->teacher->user->name }}</div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>

</x-app-layout>