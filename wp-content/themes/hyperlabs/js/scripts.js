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
  rewind: false,
  navigation: {
    nextEl: ".swiper__main-hot-news-nex",
    prevEl: ".swiper__main-hot-news-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1.2,
      spaceBetween: 0,
    },
    1024: {
      slidesPerView: 1.2,
      spaceBetween: 0,
    }
  },
  thumbs: {
    swiper: swiperProductSmall,
  },
})
const swiperFilterSizeProduct = new Swiper('.swiper__filter-size-product', {
  slidesPerView: 'auto',
  spaceBetween: 12,
})
const swiperFilterColorProduct = new Swiper('.swiper__filter-color-product', {
  slidesPerView: 2,
  spaceBetween: 12,
})
const swiperAccountAdaptiveMenu = new Swiper('.swiper__account-adaptive-menu', {
  slidesPerView: 'auto',
  spaceBetween: 16,
})
const swiperAccountHistorySort = new Swiper('.swiper__account-history-sort', {
  slidesPerView: 'auto',
  spaceBetween: 10,
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

document.addEventListener('DOMContentLoaded', () => {
  // POPUPS
  const state = {
    search: false,
    filter: false,
    auth: false,
    registration: false,
    burger: false,
    size: false,
    color: false,
    forgetPassword: false,
  }

  const fog = document.createElement('div')
  fog.className = 'hl__fog'
  document.body.appendChild(fog)
  const fogElement = document.querySelector('.hl__fog')
  fogElement.addEventListener('click', closeAll)

  function closeAll() {
    Object.keys(state).forEach((key) => {
      state[key] = false
    })

    fogElement.classList.toggle('open', false)

    allPopups.forEach((element) => {
      element && element.classList.toggle('open', false)
    })

    document.body.style.overflow = 'auto'
  }

  function togglePopups(popupElement, popupType) {
    const tempState = state[popupType]

    closeAll()

    if (tempState) {
      document.body.style.overflow = 'auto'
    } else {
      document.body.style.overflow = 'hidden'
    }

    popupElement && popupElement.classList.toggle('open', !tempState)
    fogElement.classList.toggle('open', !tempState)

    popupType === 'search'
      ? (fogElement.style.zIndex = 10)
      : (fogElement.style.zIndex = 800)

    state[popupType] = !tempState
  }

  function addToggleEventListener(elements, container, popupType) {
    elements.forEach((element) => {
      element &&
        element.addEventListener('click', () => {
          togglePopups(container, popupType)
        })
    })
  }

  // SEARCH
  const searchContainer = document.querySelector('.hl__search')
  const searchButton = document.querySelector('.hl__open-search')
  const searchButtonBurger = document.querySelector('.hl__open-search-burger')
  const searchCloseButton = document.querySelector('.hl__search-form-close')

  addToggleEventListener(
    [searchButton, searchCloseButton, searchButtonBurger],
    searchContainer,
    'search'
  )

  // FILTER
  const filterContainer = document.querySelector('.hl__filter')
  const filterButton = document.querySelector('.hl__filter-button')
  const filterCloseButton = document.querySelector('.hl__filter-close')

  addToggleEventListener(
    [filterButton, filterCloseButton],
    filterContainer,
    'filter'
  )

  // AUTH
  const authContainer = document.querySelector('#auth')
  const authButton = document.querySelector('.hl__open-auth')
  const authButtonBurger = document.querySelector('.hl__open-auth-burger')
  const authCloseButton = document.querySelector('#authClose')
  const authGoButton = document.querySelector('#goToAuth')
  const goToAuthFromForgetPassword = document.querySelector(
    '#goToAuthFromForgetPassword'
  )

  addToggleEventListener(
    [
      authButton,
      authCloseButton,
      authGoButton,
      authButtonBurger,
      goToAuthFromForgetPassword,
    ],
    authContainer,
    'auth'
  )

  // REGISTRATION
  const regContainer = document.querySelector('#registration')
  const regCloseButton = document.querySelector('#registrationClose')
  const regGoButton = document.querySelector('#goToRegistration')

  addToggleEventListener(
    [regCloseButton, regGoButton],
    regContainer,
    'registration'
  )

  // BURGER
  const burgerContainer = document.querySelector('.hl__burger-menu')
  const burgerButton = document.querySelector('.hl__header-burger-ico')
  const burgerCloseButton = document.querySelector('.hl__burger-menu-close')

  addToggleEventListener(
    [burgerButton, burgerCloseButton],
    burgerContainer,
    'burger'
  )

  // SIZE
  const sizeContainer = document.querySelector('#size')
  const sizeCloseButton = document.querySelector('#sizeClose')
  const sizeGoButton = document.querySelector('#goToSize')
  const sizeButtonSave = document.querySelector('#saveSizeButton')

  addToggleEventListener(
    [sizeCloseButton, sizeGoButton, sizeButtonSave],
    sizeContainer,
    'size'
  )

  // COLOR
  const colorContainer = document.querySelector('#color')
  const colorCloseButton = document.querySelector('#colorClose')
  const colorGoButton = document.querySelector('#goToColor')
  const colorButtonSave = document.querySelector('#saveColorButton')

  addToggleEventListener(
    [colorCloseButton, colorGoButton, colorButtonSave],
    colorContainer,
    'color'
  )

  // FORGET PASSWORD
  const forgetPasswordContainer = document.querySelector('#forgetPassword')
  const forgetPasswordCloseButton = document.querySelector(
    '#forgetPasswordClose'
  )
  const forgetPasswordGoButton = document.querySelector('#goToForgetPassword')

  addToggleEventListener(
    [forgetPasswordCloseButton, forgetPasswordGoButton],
    forgetPasswordContainer,
    'color'
  )

  const allPopups = [
    searchContainer,
    filterContainer,
    authContainer,
    regContainer,
    burgerContainer,
    sizeContainer,
    colorContainer,
    forgetPasswordContainer,
  ]

  setTimeout(() => {
    // VALIDATION
    function validateFields(fields) {
      let allFieldsValid = true

      fields.forEach((field) => {
        const input = document.getElementById(field.inputId)
        const container = input.closest('.hl__auth-item-container')

        if (input.value.trim() === '') {
          container.classList.add('error')
          allFieldsValid = false
        } else {
          container.classList.remove('error')
        }

        if (field.inputId === 'inputRegConfirmPassword') {
          if (
              input.value.trim() ===
              document.getElementById('inputRegPassword').value.trim()
          ) {
            container.classList.remove('error-match')
          } else {
            container.classList.add('error-match')
            allFieldsValid = false
          }
        }

        if (field.inputId === 'formAccountChangePasswordNewSecond') {
          if (
              input.value.trim() ===
              document.getElementById('formAccountChangePasswordNew').value.trim()
          ) {
            container.classList.remove('error-match')
          } else {
            container.classList.add('error-match')
            allFieldsValid = false
          }
        }
      })

      return allFieldsValid
    }

    function updateSubmitButtonState(fields, button) {
      button.disabled = !validateFields(fields)
    }

    // AUTH VALIDATION
    const authFields = [
      { inputId: 'inputAuthEmail' },
      { inputId: 'inputAuthPassword' },
    ]

    const authSubmitButton = document.getElementById('authSubmitButton')

    authFields.forEach((field) => {
      const input = document.getElementById(field.inputId)

      input.addEventListener('input', function () {
        updateSubmitButtonState(authFields, authSubmitButton)
      })
    })

    // REGISTRATION VALIDATION
    const regFields = [
      { inputId: 'inputRegEmail' },
      { inputId: 'inputRegPassword' },
      { inputId: 'inputRegPasswordConfirm' },
    ]

    const regSubmitButton = document.getElementById('regSubmitButton')

    regFields.forEach((field) => {
      const input = document.getElementById(field.inputId)

      if (typeof (input) !== 'undefined' && input != null) {
        // console.log(input)
        input.addEventListener('input', function () {
          updateSubmitButtonState(regFields, regSubmitButton)
        })
      }

    })

    // FORGET PASSWORD VALIDATION
    const forgetPasswordFields = [{ inputId: 'inputForgetPasswordEmail' }]

    const forgetPasswordSubmitButton = document.getElementById(
        'forgetPasswordSubmitButton'
    )

    forgetPasswordFields.forEach((field) => {
      const input = document.getElementById(field.inputId)

      if (typeof (input) !== 'undefined' && input != null) {
        // console.log(input)
        input.addEventListener('input', function () {
          updateSubmitButtonState(forgetPasswordFields, forgetPasswordSubmitButton)
        })
      }
    })

    // CHANGE PASSWORD VALIDATION
    const formAccountChangePasswordFields = [
      {
        inputId: 'formAccountChangePasswordOld',
      },
      {
        inputId: 'formAccountChangePasswordNew',
      },
      {
        inputId: 'formAccountChangePasswordNewSecond',
      },
    ]

    const formAccountChangePasswordSubmitButton = document.getElementById(
        'formAccountChangePasswordButton'
    )

    formAccountChangePasswordFields.forEach((field) => {
      const input = document.getElementById(field.inputId)

      input &&
      input.addEventListener('input', function () {
        updateSubmitButtonState(
            formAccountChangePasswordFields,
            formAccountChangePasswordSubmitButton
        )
      })
    })
  }, 100);

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

  // SIZE & COLOR
  const sizeAndColor = {
    size: null,
    color: null,
  }
  const sizeRadioButtons = document.querySelectorAll(
    'input[name="sizeProduct"]'
  )
  const colorRadioButtons = document.querySelectorAll(
    'input[name="colorProduct"]'
  )
  const sizeInputs = document.querySelectorAll('.inputForSizeView')
  const colorInputs = document.querySelectorAll('.inputForColorView')

  function conditionalFunction(property, value) {
    if (property === 'size') {
      sizeInputs.forEach((item) => {
        item.value = value
      })
    } else if (property === 'color') {
      colorInputs.forEach((item) => {
        item.value = value
        item.style.backgroundColor = value
      })
    }
  }

  const sizeAndColorProxy = new Proxy(sizeAndColor, {
    set: function (target, property, value) {
      conditionalFunction(property, value)
      target[property] = value
      return true
    },
  })

  sizeRadioButtons.forEach((radio) => {
    radio.addEventListener('change', function () {
      sizeAndColorProxy.size = this.value
    })
  })
  colorRadioButtons.forEach((radio) => {
    radio.addEventListener('change', function () {
      sizeAndColorProxy.color = this.value
    })
  })

  if (sizeRadioButtons.length) {
    sizeRadioButtons[0].checked = true
    sizeAndColorProxy.size = sizeRadioButtons[0].value
  }
  if (colorRadioButtons.length) {
    colorRadioButtons[0].checked = true
    sizeAndColorProxy.color = colorRadioButtons[0].value
  }

  function clearFilterForm() {
    const form = document.getElementById('filterForm')
    form.reset()
    rangeSlider.noUiSlider.reset()
  }
  const clearFormButton = document.getElementById('clearFormButton')
  clearFormButton && clearFormButton.addEventListener('click', clearFilterForm)

// SELECT
  const genderSelect = document.getElementById('selectRegGender')
  const countrySelect = document.getElementById('selectRegCountry')
  const countryAccountSelect = document.getElementById('selectAccountCountry')
  const cityAccountSelect = document.getElementById('selectAccountCity')

  genderSelect &&
  NiceSelect.bind(genderSelect, {
    searchable: false,
  })
  countrySelect &&
  NiceSelect.bind(countrySelect, {
    searchable: false,
  })
  countryAccountSelect &&
  NiceSelect.bind(countryAccountSelect, {
    searchable: false,
  })
  cityAccountSelect &&
  NiceSelect.bind(cityAccountSelect, {
    searchable: false,
  })

})


// success or error popups
window.onload = function() {
  const urlParams = new URLSearchParams(window.location.search);
  const popupDelay = 3000;

  if (urlParams.get('registered') === 'true') {

    document.body.classList.add('hl__view-success-registration');

    setTimeout(function() {
      document.body.classList.remove('hl__view-success-registration');
      window.location.href = '/my-account';
    }, popupDelay);
  } else if (urlParams.get('password-recovery') === 'success') {
    history.replaceState(null, null, window.location.pathname)

    document.body.classList.add('hl__view--success-password-recovery');

    setTimeout(function() {
      document.body.classList.remove('hl__view--success-password-recovery');
    }, popupDelay);
  } else if (urlParams.get('send-form') === 'error') {
    history.replaceState(null, null, window.location.pathname)

    document.body.classList.add('hl__view--error-popup');

    setTimeout(function() {
      document.body.classList.remove('hl__view--error-popup');
    }, popupDelay);
  }
};