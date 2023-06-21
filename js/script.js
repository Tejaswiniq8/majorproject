// navbar
let menu_open =document.querySelector('.navbar .menu_open');
let menu_close =document.querySelector('.navbar .menu_close');
let links =document.querySelector('.navbar .links');

// console.log(menu_open);
// console.log(menu_close);
// console.log(links);
// menu_open.addEventListener('click',function(){
// // console.log("It is working");
// // console.log(links.classList);
// links.classList.toggle('active');
// console.log(links.classList)
// });

menu_open.addEventListener('click',()=>{
    // console.log("It is working");
    // console.log(links.classList);
    links.classList.toggle('active');
    console.log(links.classList)
    });

    menu_close.addEventListener('click',()=>{
        // console.log("It is working");
        // console.log(links.classList);
        links.classList.toggle('active');
        console.log(links.classList)
        });
        // slider
        //images=4(0,1,2,3,4,5,6,7)
let flag = 0;
function controller(x) {
    flag = flag + x;
    slideshow(flag);
    //left
    //flag= 2 + (-1) = 1
    //right
    //flag =2 + 1 = 3
}

slideshow(flag);

function slideshow(num) {
    let slides = document.getElementsByClassName('slide');
    // console.log(slides);
    if (num == slides.length) {
        flag = 0;
        num = 0;
    }
    if(num < 0){
        flag = slides.length-1;
        num= slides.length-1;
    }
    for (let y of slides) {
        y.style.display = "none";
    }
    console.log(num);
    slides[num].style.display = "block";
}