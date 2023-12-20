// SWIPERS
const swiperMainSmall = new Swiper('.swiper__main-small', {
  slidesPerView: 4,
  spaceBetween: 40,
  navigation: {
    nextEl: '.swiper__main-small-next',
    prevEl: '.swiper__main-small-prev',
  },
  scrollbar: {
    el: '.swiper-scrollbar__main-small',
  },
})
const swiperMainBig = new Swiper('.swiper__main-big', {
  slidesPerView: 3,
  spaceBetween: 40,
  navigation: {
    nextEl: '.swiper__main-big-next',
    prevEl: '.swiper__main-big-prev',
  },
  scrollbar: {
    el: '.swiper-scrollbar__main-big',
  },
})
const swiperMainHotNews = new Swiper('.swiper__main-hot-news', {
  slidesPerView: 3,
  spaceBetween: 40,
  navigation: {
    nextEl: '.swiper__main-hot-news-next',
    prevEl: '.swiper__main-hot-news-prev',
  },
})
const swiperFilterCategory = new Swiper('.swiper__filter-category', {
  slidesPerView: 'auto',
  spaceBetween: 12,
})
const swiperFilterSize = new Swiper('.swiper__filter-size', {
  slidesPerView: 'auto',
  spaceBetween: 12,
})
const swiperSearchPopular = new Swiper('.swiper__search-popular', {
  slidesPerView: 'auto',
  spaceBetween: 12,
})

// CHANGE IMAGE ON PRODUCT
function setupProductCard(card) {
  const mainImage = card.querySelector('.hl__product-images-big-image img')
  const thumbnails = card.querySelectorAll(
    '.hl__product-images-thumbnail-item-img'
  )

  if (thumbnails.length > 0) {
    thumbnails[0].parentElement.classList.add('active')
    mainImage.src = thumbnails[0].src
    mainImage.alt = thumbnails[0].alt
  }

  thumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener('click', () => {
      mainImage.src = thumbnail.src
      mainImage.alt = thumbnail.alt

      const otherThumbnails = card.querySelectorAll(
        '.hl__product-images-thumbnail-item'
      )
      otherThumbnails.forEach((otherThumbnail) => {
        if (otherThumbnail !== thumbnail.parentElement) {
          otherThumbnail.classList.remove('active')
        }
      })

      thumbnail.parentElement.classList.add('active')
    })
  })
}

const productCards = document.querySelectorAll('.hl__product')
productCards.forEach(setupProductCard)

// RANGE SLIDER
var rangeSlider = document.getElementById('hl__range-slider')

rangeSlider &&
  noUiSlider.create(rangeSlider, {
    start: [1000, 5000],
    // tooltips: [true, true],
    margin: 100,
    step: 100,
    connect: true,
    range: {
      min: 0,
      max: 10000,
    },
  })

var valueMin = document.getElementById('hl__range-slider-min'),
  valueMax = document.getElementById('hl__range-slider-max')

rangeSlider &&
  rangeSlider.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      valueMax.value = values[handle] + '₴'
    } else {
      valueMin.value = values[handle] + '₴'
    }
  })

// FILTER
document.addEventListener('DOMContentLoaded', () => {
  const fog = document.createElement('div')
  fog.className = 'hl__fog'
  document.body.appendChild(fog)

  const filterButton = document.querySelector('.hl__filter-button')
  const filter = document.querySelector('.hl__filter')
  const fogElement = document.querySelector('.hl__fog')
  const closeButton = document.querySelector('.hl__filter-close')

  const elementsToToggle = [filterButton, closeButton, fogElement]

  function toggleFilter() {
    const isOpen = filter.style.transform === 'translateX(0%)'
    const transformValue = isOpen ? 'translateX(100%)' : 'translateX(0%)'
    const opacityValue = isOpen ? 0 : 1

    filter.style.transform = transformValue
    filter.style.opacity = opacityValue
    fogElement.style.opacity = opacityValue
    fogElement.style.pointerEvents = isOpen ? 'none' : 'auto'
    document.body.style.overflow = isOpen ? 'auto' : 'hidden'
  }

  elementsToToggle.forEach((element) => {
    element && element.addEventListener('click', toggleFilter)
  })
})

function clearFilterForm() {
  const form = document.getElementById('filterForm')
  form.reset()
  rangeSlider.noUiSlider.reset()
}
const clearFormButton = document.getElementById('clearFormButton')
clearFormButton && clearFormButton.addEventListener('click', clearFilterForm)

// SEARCH
document.addEventListener('DOMContentLoaded', function () {
  var openSearchButton = document.querySelector('hl__open-search')
  var searchContainer = document.querySelector('.hl__search')
  var closeSearchButton = document.querySelector('.hl__search-form-close')

  openSearchButton.addEventListener('click', function () {
    document.body.style.overflow = 'hidden'
    searchContainer.classList.add('open')
  })

  closeSearchButton.addEventListener('click', function () {
    document.body.style.overflow = 'auto'
    searchContainer.classList.remove('open')
  })
})

// BURGER MENU
document.addEventListener('DOMContentLoaded', () => {
  const burgerMenu = document.querySelector('.hl__burger-menu')
  const burgeButton = document.querySelector('.hl__header-burger-ico')
  const closeBurgerButton = document.querySelector('.hl__burger-menu-close')

  const elementsToToggle = [burgeButton, closeBurgerButton]

  function toggleBurgerMenu() {
    const isOpen = burgerMenu.style.transform === 'translateX(0%)'
    const transformValue = isOpen ? 'translateX(100%)' : 'translateX(0%)'
    const opacityValue = isOpen ? 0 : 1

    burgerMenu.style.transform = transformValue
    burgerMenu.style.opacity = opacityValue
    document.body.style.overflow = isOpen ? 'auto' : 'hidden'
  }

  elementsToToggle.forEach((element) => {
    element && element.addEventListener('click', toggleBurgerMenu)
  })
})
