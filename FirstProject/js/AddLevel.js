const addBtn = document.querySelector(".add-resource-btn");
const topic = document.querySelector("#topic-name");
const linkIn = document.querySelector("#link");
const platform = document.querySelector("#platform");
const resources = document.querySelector(".resources>.container");
const adding = document.querySelector(".add-resource");
const numberInput = document.getElementById("number");
const summaryInput = document.getElementById("summary");
const bodyH = document.querySelector("body");


addBtn.addEventListener("click",(e)=>{
    if(valid()){
        createResource();
        topic.value = "";
        linkIn.value = "";
        platform.value = "";
    }
})
resources.addEventListener("click",(e)=>{
    const element = getTrash(e.target);
    if(element.classList.contains("delete")){
        deleteResource(element);
    }
})

function getTrash(element){
    if (element.classList.contains("delete")) return element;
    else if(element.parentElement.classList.contains("delete")) return element.parentElement;
    else return element.parentElement.parentElement;
}


function valid(){
    return topic.value != "" && linkIn.value != "" && platform.value != "";
}
const button = "<div class=\"col-1\">\n" +
    "                            <button class=\"btn btn-danger delete\">\n" +
    "                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">\n" +
    "                                    <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z\"/>\n" +
    "                                    <path d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z\"/>\n" +
    "                                </svg>\n" +
    "                                <i class=\"bi bi-trash\"></i>\n" +
    "                            </button>\n" +
    "                        </div>"



function createResource(){
    const om = document.createElement("div");
    om.classList.add("row");
    om.classList.add("rounded");
    om.classList.add("resource");
    om.classList.add("container");
    const row = document.createElement("div");
    row.classList.add("row");
    row.classList.add("align-items-center");
    om.appendChild(row);
    const esmTopicContainer = document.createElement("div");
    esmTopicContainer.classList.add("col-4");
    const header = document.createElement("h3");
    header.innerText = topic.value;
    esmTopicContainer.appendChild(header);
    row.appendChild(esmTopicContainer);
    const linkContainer = document.createElement("div");
    linkContainer.classList.add("col-7");
    const link = document.createElement("a");
    link.href = linkIn.value;
    link.target="_blank";
    link.innerText = platform.value;
    linkContainer.appendChild(link);
    row.appendChild(linkContainer);
    row.innerHTML += button;
    resources.insertBefore(om,adding);
    console.log(resources);


}

function checkTrash(item){
    return item
}

function deleteResource(e){
    const bouh = e.parentElement.parentElement.parentElement;
    bouh.remove();
}

const response = fetch("AddLevel.php");
console.log(Response);

function checkSave(e){
    return e.classList.contains("save-btn");
}

bodyH.addEventListener("click",(e)=>{
    if (checkSave(e.target)){
        let child;
        const b = [];
        for(child of resources.children){
            if(child.classList.contains("resource")){
                let currentChild = child.firstChild.firstChild;
                let k = currentChild.firstChild;
                const map = []
                map["topic"] = k.innerText;
                currentChild  = currentChild.nextElementSibling;
                k = currentChild.firstChild;
                map["link"] = currentChild.firstChild.href;
                map["platform"] = currentChild.firstChild.innerText;
                b.push(map);
            }

        }
        const data = {
            number : numberInput.value,
            summary : summaryInput.value,
            res : b

        };
        fetch('/AddLevelScript.php',{
            method : 'POST',
            body : JSON.stringify(data)
        }).then(response => response.json())
            .then(responseData => {
                console.log(responseData);
            })
    }
})

