<x-app-layout>
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Teachers</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('teacher.create') }}" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Add New Teacher</span>
                </a>
            </div>
        </div>
        
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-600 text-white rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3">Name</div>
                <div class="w-3/12 px-4 py-3">Email</div>
                <div class="w-3/12 px-4 py-3">Subject Code</div>
                <div class="w-2/12 px-4 py-3">Phone</div>
                <div class="w-2/12 px-4 py-3 text-right">Actions</div>
            </div>
            @foreach ($teachers as $teacher)
                <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $teacher->user->name }}</div>
                    <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $teacher->user->email }}</div>
                    <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                        @foreach ($teacher->subjects as $subject)
                            <span class="bg-gray-200 text-sm mr-1 mb-1 px-2 border rounded-full">{{ $subject->subject_code }}</span>
                        @endforeach
                    </div>
                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $teacher->phone }}</div>
                    <div class="w-2/12 flex items-center justify-end px-3">

                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="text-gray-700 ml-2 bg-gray-400 block px-2 py-1 rounded">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        
                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deletebtn text-white ml-2 bg-red-600 block px-2 py-1 rounded" onclick="return confirm('Are you sure you want to delete?');">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $teachers->links() }}
        </div>

        @include('backend.modals.delete',['name' => 'teacher'])
    </div>
</x-app-layout>

@push('scripts')
<script>
    $(function() {
        $( ".deletebtn" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
            var url = $(this).attr('data-url');
            $(".remove-record").attr("action", url);
        })        
        
        $( "#deletemodelclose" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
        })
    })
</script>
@endpush