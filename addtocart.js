const product = [
    {
        id: 0,
        image: 'uploads/r1.jpg',
        title: 'Women Bag',
        price:'1000ETB',
    },
    {
        id:1,
        image: 'uploads/r2.jpg',
        title: 'Fashion Bag',
        price: '1200,ETB'
    },
    {
        id:2,
        image: 'uploads/r3.jpg',
        title: 'Best women Bag',
        price: '1000ETB',
    },
    {
        id:3,
        image: 'uploads/r4.jpg',
        title: 'Brand women Bag',
        price: 1000,
    },

];
const categories = [...new Set(product.map((item)=> {return item}))]
let i =0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
    var {image,title,price} = item;
    total=total+price;z
    return(
        `<div class='box'>
          <div class='img-box'>
            <img class='images' src=${image}></img>
          </div>
          <div class='bottom'>
          <p>${title}</p>
          <h2> ${price}.00</h2>`+
          "<button onclick ='addtocart("+(i++)+")'>Add to Cart</button>"+
          `</div>
          </div>`
        );
}).join('')

var cart = [];

function addtocart(a){
    cart.push({...categories[a]})
    displaycart();
}
function delElement(a){
    cart.push({...categories[a]})
}

function displaycart(){
    let j = 0, total=0; 
    document.getElementById("count").innerHTML =cart.length;
    if(cart.length==0){
        document.getElementById('cartItem').innerHTML = "Your cart is empty";
        document.getElementById("total").innerHTML = "ETB"+0+".00";
    }
    else{
        document.getElementById("cartItem").innerHTML = cart.map((items)=>
        {
            var {image, title, price} = items;
            return(
                `<div class ='cart-item'>
                <div class='row-img'>
                   <img class='rowimg' src=${image}>
                </div>
                <p style = 'font-size:12px;'>${title}</p>
                <h2 style='font-size:15px;> ${price}.00</h2>`+
                "<button class = 'fa-solid fa-trash' onclick = 'delElement("+ (j++) +")'>cancel</button></div>"
            );

        }).join('')
    }
}