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

function renderCart(items){

  let HTML = 'Empty'
  let count = 0
  let productCount = 0

  Object.keys(items).forEach(e => renderList(items[e], e)) 

  function renderList (product, id){
    productCount++
    count += product.price
    
    HTML += `<p>${ product.title}<br>
            ${product.count} X ${product.price}</p><div class="ex" data-id="${id}">X</div>`
    
  }

  if(productCount){
    HTML += `<p>Total: ${count} ‎€<br>`
    cartText.innerText = `Krepšelis | ${productCount}`
  }else{
    cartText.innerText = `Krepšelis`
  }

  cartBox.innerHTML = HTML
  exEvents()
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