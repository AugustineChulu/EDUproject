<div class="w-full block mt-8">

    <div id="tileWrapper" class="flex flex-wrap sm:flex-wrap justify-start">

        <div class="dashboardTile">

            <div class="cardIcon">
                <i class="fa-solid fa-user-graduate fa-3x"></i>
            </div>
            
            <span class="text-5xl font-bold sm:pr-1">{{ sprintf("%02d", count($pupils)) }}</span>
            <span class="leading-tight">Pupils</span>

        </div>
        
        <div class="dashboardTile">

            <div class="cardIcon">
                <i class="fa-solid fa-chalkboard-user fa-3x"></i>
            </div>
            
            <span class="text-5xl font-bold sm:pr-1">{{ sprintf("%02d", count($teachers)) }}</span>
            <span class="leading-tight">Teachers</span>

        </div>

        <div class="dashboardTile">

            <div class="cardIcon">
                <i class="fa-solid fa-window-restore fa-3x"></i>
            </div>
            
            <span class="text-5xl font-bold sm:pr-1">{{ sprintf("%02d", count($subjects)) }}</span>
            <span class="leading-tight">Subjects</span>

        </div>

        <div class="dashboardTile">

            <div class="cardIcon">
                <i class="fa-solid fa-graduation-cap fa-3x"></i>
            </div>
            
            <span class="text-5xl font-bold sm:pr-1">{{ sprintf("%02d", count($classes)) }}</span>
            <span class="leading-tight">Classes</span>

        </div>
        
    </div>

</div>

{{-- <div class="w-full block mt-8">
    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        <div class="w-full bg-gray-200 text-center px-8 py-6 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
            <svg class="fill-current float-left" style="width:39px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                <span class="text-4xl">{{ sprintf("%02d", count($subjects)) }}</span>
                <span class="leading-tight">Subjects</span>
            </h3>
        </div>
        <div class="w-full bg-gray-200 text-center px-8 py-6 mx-0 sm:mx-6 my-4 sm:my-0 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
            <svg class="fill-current float-left" style="width:39px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
                <span class="text-4xl">{{ sprintf("%02d", count($classes)) }}</span>
                <span class="leading-tight">Classes</span>
            </h3>
        </div>
        
    </div>
</div> --}}