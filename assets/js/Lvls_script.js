const rectangleIcons = document.querySelectorAll('.rectangle-icon');

rectangleIcons.forEach((icon, index) => {

    // Add click event listener
    index++;
    if (index<9){
    icon.addEventListener('mouseover', () => {
        let chorliya=document.getElementById("chorliya"+index.toString());
        const error_msg=document.getElementById("msg"+index.toString());
        // Perform actions you want here
        console.log(index);
        if (chorliya.style.display!=="none"){
            error_msg.style.display="flex";
        }
    });
    icon.addEventListener('mouseout', () => {
        let chorliya=document.getElementById("chorliya"+index.toString());
        const error_msg=document.getElementById("msg"+index.toString());
        // Perform actions you want here
        if (chorliya.style.display!=="none"){
            error_msg.style.display="none";
        }
    });}
    else{
        icon.addEventListener('mouseover', () => {
            let chorliya=document.getElementById("chorliya"+index.toString());
            const error_msg=document.getElementById("msgtopic"+(index-8).toString());
            // Perform actions you want here
            console.log(index);
            if (chorliya.style.display!=="none"){
                error_msg.style.display="flex";
            }
        });
        icon.addEventListener('mouseout', () => {
            let chorliya=document.getElementById("chorliya"+index.toString());
            const error_msg=document.getElementById("msgtopic"+(index-8).toString());
            // Perform actions you want here
            if (chorliya.style.display!=="none"){
                error_msg.style.display="none";
            }
        });
    }
});
