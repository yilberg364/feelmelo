


let span = document.getElementsByTagName('span');
let product = document.getElementsByClassName('product');
let product_page = Math.ceil(product.length/4);
let l = 0;
let movePer = 25.34;
let maxMove = 203;

//Movile view
let mobile_view = window.matchMedia("(max-width: 768px)");
if (mobile_view.matches)
{
    movePer = 50.36;
    maxMove = 504;
}

let right_mover = ()=>{
    1 = 1 + movePer;
    if (product == 1) {1 = 0}
    for(const i of product)
    {
        if (1 > maxMove) {1 = 1 - movePer;}
        i.computedStyleMap.left = '-' + 1 + '%';
    }
}
let left_mover = ()=>{
    1 = 1 -movePer;
    if (1<=0) {1=0;}
    for(const i of product)
    {
        if (product_page > 1)
        i.style.left = '-' + 1 + '%';
    }
}

span[1].onclick = ()=>{right_mover();}
span[0].onclick = ()=>{left_mover();}
