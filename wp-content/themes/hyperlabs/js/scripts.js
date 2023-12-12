// SWIPERS
const swiperMainSmall = new Swiper('.swiper__main-small', {
  slidesPerView: 1.2,
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper__main-small-next',
    prevEl: '.swiper__main-small-prev',
  },
  scrollbar: {
    el: '.swiper-scrollbar__main-small',
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
})
const swiperMainBig = new Swiper('.swiper__main-big', {
  slidesPerView: 1.2,
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper__main-big-next',
    prevEl: '.swiper__main-big-prev',
  },
  scrollbar: {
    el: '.swiper-scrollbar__main-big',
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
  },
})
const swiperMainHotNews = new Swiper('.swiper__main-hot-news', {
  slidesPerView: 1.2,
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper__main-hot-news-next',
    prevEl: '.swiper__main-hot-news-prev',
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
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
const swiperProductSmall = new Swiper('.swiper__product-small', {
  direction: 'vertical',
  slidesPerView: 'auto',
  spaceBetween: 0,
  watchSlidesProgress: true,
})
const swiperProductBig = new Swiper('.swiper__product-big', {
  slidesPerView: 1,
  spaceBetween: 0,
  rewind: true,
  thumbs: {
    swiper: swiperProductSmall,
  },
  breakpoints: {
    768: {
      slidesPerView: 1.2,
      spaceBetween: 0,
    },
  },
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

// DOM LOADED
document.addEventListener('DOMContentLoaded', () => {
  // FILTER
  const fog = document.createElement('div')
  fog.className = 'hl__fog'
  document.body.appendChild(fog)

  const filterButton = document.querySelector('.hl__filter-button')
  const filter = document.querySelector('.hl__filter')
  const fogElement = document.querySelector('.hl__fog')
  const closeButton = document.querySelector('.hl__filter-close')

  const filterElementsToToggle = [filterButton, closeButton, fogElement]

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

  filterElementsToToggle.forEach((element) => {
    element && element.addEventListener('click', toggleFilter)
  })

  // SEARCH
  const searchFog = document.createElement('div')
  searchFog.className = 'hl__search-fog'
  document.body.appendChild(searchFog)

  const searchContainer = document.querySelector('.hl__search')
  const searchFogElement = document.querySelector('.hl__search-fog')
  const toggleSearchButtons = Array.from(
    document.querySelectorAll(
      '.hl__open-search, .hl__search-form-close, .hl__search-fog'
    )
  )

  function toggleSearch() {
    const isBurgerOpen = burgerMenu.style.transform === 'translateX(0%)'
    isBurgerOpen && toggleBurgerMenu()
    document.body.style.overflow =
      document.body.style.overflow === 'hidden' ? 'auto' : 'hidden'
    const opacityValue = document.body.style.overflow === 'hidden' ? 1 : 0
    searchFogElement.style.opacity = opacityValue
    searchFogElement.style.pointerEvents =
      document.body.style.overflow === 'hidden' ? 'auto' : 'none'
    searchContainer.classList.toggle('open')
  }

  toggleSearchButtons.forEach((element) => {
    element && element.addEventListener('click', toggleSearch)
  })

  // BURGER
  const burgerMenu = document.querySelector('.hl__burger-menu')
  const burgeButton = document.querySelector('.hl__header-burger-ico')
  const closeBurgerButton = document.querySelector('.hl__burger-menu-close')

  const burgerElementsToToggle = [burgeButton, closeBurgerButton]

  function toggleBurgerMenu() {
    const isOpen = burgerMenu.style.transform === 'translateX(0%)'
    const transformValue = isOpen ? 'translateX(100%)' : 'translateX(0%)'
    const opacityValue = isOpen ? 0 : 1

    burgerMenu.style.transform = transformValue
    burgerMenu.style.opacity = opacityValue
    document.body.style.overflow = isOpen ? 'auto' : 'hidden'
  }

  burgerElementsToToggle.forEach((element) => {
    element && element.addEventListener('click', toggleBurgerMenu)
  })

  // FAQ
  var faqItems = document.querySelectorAll('.hl__collections-faq-item')

  faqItems &&
    faqItems.forEach(function (item) {
      var header = item.querySelector('.hl__collections-faq-item-header')

      header.addEventListener('click', function () {
        faqItems.forEach(function (faqItem) {
          if (faqItem !== item) {
            faqItem.classList.remove('open')
          }
        })

        item.classList.toggle('open')
      })
    })
})

function clearFilterForm() {
  const form = document.getElementById('filterForm')
  form.reset()
  rangeSlider.noUiSlider.reset()
}
const clearFormButton = document.getElementById('clearFormButton')
clearFormButton && clearFormButton.addEventListener('click', clearFilterForm)
