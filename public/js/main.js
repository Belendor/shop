let axiosButtons = document.querySelectorAll(".axios-button")
let cartBox = document.querySelector(".cart-box")
let cartButton = document.querySelector(".cart-button")
let cartText = document.querySelector(".cart-text")

var mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  })

let changesMade = true

cartButton.addEventListener("mouseenter",()=>{
  cartBox.style.visibility = 'visible'

  if(changesMade){
    axios.get('/shop/public/api/session')
    .then(res=>{
   
      renderCart(res.data)
    })

    changesMade = false
  }
})

cartBox.addEventListener("mouseenter",()=>{
  cartBox.style.visibility = 'visible'
})
cartBox.addEventListener("mouseleave",()=>{
  cartBox.style.visibility = 'hidden'
})


for(let i = 0; i<axiosButtons.length;i++){

  axiosButtons[i].addEventListener('click', (e)=>{
    
    axios.post('/shop/public/api/session', JSON.parse(axiosButtons[i].dataset.json))
    .then(res=>{
      renderCart(res.data)
    })

    changesMade = true
  })
}


let firstSwitch = true;

function renderCart(items){

  let HTML = 'Empty'
  let count = 0
  let productCount = 0

  Object.keys(items).forEach(e => renderList(items[e], e)) 

  function renderList (product, id){

    productCount++
    count += product.price * product.count
    
    if(productCount === 1){
      HTML = "";
    }

    HTML += `<p>${ product.title}<br>
            ${product.count} X ${product.price}</p><div class="ex clickable" data-id="${id}">X</div> 
            <div class="plus clickable" data-id="${id}">+</div>    <div class="minus clickable" data-id="${id}">-</div>`
    
  }

  if(productCount){
    HTML += `<p>Total: ${count} ‎€<br>`
    cartText.innerText = `Krepšelis | ${productCount}`
  }else{
    cartText.innerText = `Krepšelis`
  }

  cartBox.innerHTML = HTML
  exEvents()
  plusEvents()
  minusEvents()
}


function exEvents (){
  
  let exes = document.querySelectorAll(".ex")

  for(let i = 0; i < exes.length; i++){
    exes[i].addEventListener('click', ()=>{
      axios.post('/shop/public/api/session/remove', {"id": exes[i].dataset.id})
      .then(res=>{
        renderCart(res.data)
      })
    })
  }
}

function plusEvents (){
  
  let plus = document.querySelectorAll(".plus")

  for(let i = 0; i < plus.length; i++){
    plus[i].addEventListener('click', ()=>{
      axios.post('/shop/public/api/session/add', {"id": plus[i].dataset.id})
      .then(res=>{
        renderCart(res.data)
      })
    })
  }
}

function minusEvents (){
  
  let minus = document.querySelectorAll(".minus")

  for(let i = 0; i < minus.length; i++){
    minus[i].addEventListener('click', ()=>{
      axios.post('/shop/public/api/session/substract ', {"id": minus[i].dataset.id})
      .then(res=>{
        renderCart(res.data)
      })
    })
  }
}