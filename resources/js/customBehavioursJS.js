const activateTab = (tab) =>{

    var selectedTab = document.querySelector(`a[tab*="${tab}"]`);

    if(selectedTab != null){
        selectedTab.classList.add("activeTab");
    }else{
        console.log(` ${tab} \n no tab identified`)
    }
}

document.addEventListener('DOMContentLoaded', () => {

    // control behavior for the user input field transitions on the login page
    const userInputFields = document.querySelectorAll('input[class*="userInput"]');

    const hoverlabel = (id)=>{

        document.querySelector(`label[for="${id}"]`).classList.add('hover');
    }

    userInputFields.forEach(field => {

        if(field.parentElement.children[0].tagName != 'DIV'){

            if(!field.value == null || !field.value == ""){
                hoverlabel(field.id);
            }
    
            field.onfocus = ()=>{
    
                document.querySelector(`label[for="${field.id}"]`).classList.add('hover');
            }
    
            field.onblur = ()=>{
    
                if(field.value == null || field.value == ""){
                    document.querySelector(`label[for="${field.id}"]`).classList.remove('hover');
                }
                
            }

        }
            
    });
    ///////////////////////////////////////////////////////////////////////////////

    var currentRoute = document.body.dataset.route;
    
    if(currentRoute != null){
        var firstPart = currentRoute.split('.')[0];
        activateTab(firstPart)
    }
    
});

  console.log('running')
