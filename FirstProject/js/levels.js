
const container = document.querySelector(".bfcontainer");
container.addEventListener("click" , (e) =>{
    if(checkTrash(e)){
        const lvlId = getLevelId(e.target);
        deleteLevel(lvlId);
        editNumber(lvlId);
    }
    if(add(e)){
        window.location.href = "AddLevel.php";
    }
})

function checkTrash(e){
    return (e.target.classList.contains("delete") || 
    e.target.parentElement.classList.contains("delete") || 
    e.target.parentElement.parentElement.classList.contains("delete"));
}
function add(e){
    return(e.target.classList.contains("add-level-btn"));
}

function getLevelId(e){
    if (e.classList.contains("lvl")){
        return e.id;
    }
    return getLevelId(e.parentElement);
}

function getChildById(element){
    
}

function deleteLevel(id){
    const childElement = document.querySelector(`#${id}`);
    container.removeChild(childElement);
}

function editNumber(id){
    let arr = container.children;
    for(let i = 0 ; i < arr.length ;i++){
        if (arr[i].id > id){
            const buttonHolder = document.querySelector(`.lvl#${arr[i].id}`);
            console.log(buttonHolder);
            let number = parseInt(arr[i].id.slice(1));
            const h2 = document.querySelector(`div#${arr[i].id}>div>div>div>h2`);
            number--;
            arr[i].id = 'l' + number;
            buttonHolder.id = 'l' + number;
            h2.innerText = "Level " + number;
            console.log(h2.innerText);
        }
    }
}