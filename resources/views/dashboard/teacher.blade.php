<div class="w-full block mt-8">

    <div id="tileWrapper" class="flex flex-wrap sm:flex-wrap justify-start">

        <div class="dashboardTile">

            <div class="cardIcon">
                <i class="fa-solid fa-graduation-cap fa-3x"></i>
            </div>
            
            <span class="text-5xl font-bold sm:pr-1">{{ sprintf("%02d", $teacher->classes_count) }}</span>
            <span class="leading-tight">Classes</span>

        </div>

        <div class="dashboardTile">

            <div class="cardIcon">
                <i class="fa-solid fa-window-restore fa-3x"></i>
            </div>
            
            <span class="text-5xl font-bold sm:pr-1">{{ sprintf("%02d", $teacher->subjects_count) }}</span>
            <span class="leading-tight">Subjects</span>

        </div>

        <div class="dashboardTile">

            <div class="cardIcon">
                <i class="fa-solid fa-user-graduate fa-3x"></i>
            </div>
            
            <span class="text-5xl font-bold sm:pr-1">{{ ($teacher->pupils[0]->pupils_count) ?? 0 }}</span>
            <span class="leading-tight">Pupils</span>

        </div>
        
    </div>
 <!-- ./END TEACHER -->