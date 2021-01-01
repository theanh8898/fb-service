const btnHamburger = document.querySelector('#btnHamburger');
const body = document.querySelector('body');
const header = document.querySelector('.header');
const overlay = document.querySelector('.overlay');
const fadeElems = document.querySelectorAll('.has-fade');

if (btnHamburger) {
  btnHamburger.addEventListener('click', function () {
    if (header.classList.contains('open')) {
      // Close Hamburger Menu
      body.classList.remove('noscroll');
      header.classList.remove('open');
      fadeElems.forEach(function (element) {
        element.classList.remove('fade-in');
        element.classList.add('fade-out');
      })
    }
    else {
      // Open Hamburger Menu
      body.classList.add('noscroll');
      header.classList.add('open');
      fadeElems.forEach(function (element) {
        element.classList.remove('fade-out');
        element.classList.add('fade-in');
      })
    }
  
  });
}




$( () => {
	
	//On Scroll Functionality
	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 100 ? $('.header').addClass('sticky') : $('.header').removeClass('sticky');

	});
	

});


// login


// left sidebar 
$dropdownMenu = document.querySelectorAll('.dropdown-menu');

if($dropdownMenu) {

  $dropdownMenu.forEach(function(item){
    item.addEventListener('click', function() {
      item.classList.toggle('show');
      item.querySelector('.dropdown-icon').classList.toggle('rotate');
      
    })
  })
}



const tabs = document.querySelectorAll('[data-tab-target]');
const tabContents = document.querySelectorAll('[data-tab-content]');

if(tabs) {
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {

    
      
      tabs.forEach(item => item.classList.remove('active'));

      tab.classList.add('active');

      const target = document.querySelector(tab.dataset.tabTarget);
      tabContents.forEach(tabContent => tabContent.classList.remove('active'))
      target.classList.add('active');
    })
  })
}



// Toggle modal 

function toggleModal() {
  let elementModal = document.querySelector('.modal');

  if (elementModal) {
    elementModal.classList.toggle('modal--open')
  }
}

// close Modal 

function closeModal () {
  let elementModal = document.querySelector('.modal--open');

  if(elementModal) {
    elementModal.classList.remove('modal--open');
  }
}

function redirectModal (url) {
  let elementModal = document.querySelector('.modal--open');
  if(elementModal) {
    window.open(url, '_blank');
    elementModal.classList.remove('modal--open');
  }
}