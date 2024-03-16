<x-app-layout>

    @role('admin')
    
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Classes</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('classes.create') }}" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Add New Class</span>
                </a>
            </div>
        </div>
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-600 text-white rounded-tl rounded-tr">
                <div class="w-1/12 px-4 py-3">#</div>
                <div class="w-2/12 px-4 py-3">Class</div>
                <div class="w-1/12 px-4 py-3">Pupils</div>
                <div class="w-4/12 px-4 py-3 text-center">Subject Code/s</div>
                <div class="w-2/12 px-4 py-3">Teacher</div>
                <div class="w-2/12 px-4 py-3 text-right">Actions</div>
            </div>
            @foreach ($classes->reverse() as $class)
            
                <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">

                    <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $class->id }}</div>

                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $class->grade }}{{ $class->class }}</div>

                    <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                        <span class="bg-gray-200 text-sm mr-1 mb-1 px-2 font-semibold border rounded-full">
                            {{ $class->pupils_count }}
                        </span>
                    </div>

                    <div class="w-4/12 px-4 py-3 text-sm text-gray-600 text-center tracking-tight">
                        @foreach ($class->subjects as $subject)
                            <span class="bg-gray-200 text-sm mr-1 mb-1 px-2 font-semibold border rounded-full">{{ $subject->subject_code }}</span>
                        @endforeach
                    </div>
                    
                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $class->teacher->user->name ?? '' }}</div>
                    <div class="w-2/12 flex items-center justify-end px-3">

                        <a href="{{ route('classes.edit',$class->id) }}" title="Edit" class="text-gray-700 ml-2 bg-gray-400 block px-2 py-1 rounded">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <a href="{{ route('class.assign.subject',$class->id) }}" title="Assign Subject" class="text-gray-700 ml-2 bg-gray-400 block px-2 py-1 rounded">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <form action="{{ route('classes.destroy',$class->id) }}" method="POST" class="inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" class="deletebtn text-white ml-2 bg-red-600 block px-2 py-1 rounded" onclick="return confirm('Are you sure you want to delete?');">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $classes->links() }}
        </div>
    </div>

    @endrole
</x-app-layout>