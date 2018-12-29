import flatpickr from "flatpickr";
import {Spanish} from "flatpickr/dist/l10n/es"
import subcategories from './subcategories'
import {Delete} from "./Delete";
import animateScrollTo from 'animated-scroll-to';


flatpickr(".dates", {
  altInput: true,
  "locale": "es",
  mode: "range",
  dateFormat: "Y-m-d",
});

const errorClose = document.querySelector('.Error-close');
if (errorClose) {
  errorClose.addEventListener('click', function () {
    document.querySelector('.alert-error').remove();
  });
}

subcategories();

const deleteElement = document.querySelectorAll('.delete');
if (deleteElement) {
  deleteElement.forEach(function (el) {
    el.addEventListener('click', function (e) {
      e.preventDefault();
      Delete({
        title: 'Estas seguro de eliminar?',
        text: 'Recuerda que no podrás volver a recuperar la info',
        formId: el
      });
    });
  })
}
const arrow = document.querySelector('#arrowToScroll');
const bannerButton = document.querySelector('.Banner-button');
if (arrow) {
  arrow.addEventListener('click', function () {
    animateScrollTo(document.querySelector('.target'));
  });
  bannerButton.addEventListener('click', function () {
    animateScrollTo(document.querySelector('.target'));
  })
}

const otherForm = document.querySelector('#cities');
if (otherForm) {
  otherForm.addEventListener('change', function () {
    
    const otherFormInput = document.querySelector('#otherForm');
    if (otherForm.value === '1124') {
      otherFormInput.classList.remove('is-hidden')
    } else {
      otherFormInput.value = '';
      otherFormInput.classList.add('is-hidden')
    }
  });
}


const ticketState = document.querySelector('#ticket_state');
const is_invoiced = document.querySelector('#is_invoiced');
if (ticketState) {
  
  ticketState.addEventListener('change', function () {
    const isfinished = document.querySelector('#isfinished');
    const invoice_cost = document.querySelector('#invoice_cost');
    
    
    if (ticketState.value === '4') {
      is_invoiced.classList.remove('is-hidden')
      isfinished.classList.remove('is-hidden');
      //invoice_cost.classList.remove('is-hidden');
      
      
    } else {
      is_invoiced.value = '';
      is_invoiced.classList.add('is-hidden')
      invoice_cost.value = '';
      invoice_cost.classList.add('is-hidden')
      isfinished.classList.add('is-hidden')
      
    }
  });
}
if (is_invoiced) {
  is_invoiced.addEventListener('change', function () {
    const invoice_cost = document.querySelector('#invoice_cost');
    if (this.checked) {
      invoice_cost.classList.remove('is-hidden');
      invoice_cost.attributes.add('required');
    } else {
      invoice_cost.value = '';
      invoice_cost.classList.add('is-hidden')
      invoice_cost.attributes.remove('required');
      
    }
  });
}

const downloadExcel = document.querySelector('#downloadExcel');
const filtersForm = document.querySelector('#FiltersForm');
if (downloadExcel) {
  const buttonSubmit = document.querySelector('#downloadExcelButton');
  buttonSubmit.addEventListener('click', function (e) {
    e.preventDefault();
    let form = addElementForm(filtersForm, downloadExcel);
    form.submit()
  })
  
}

function addElementForm(filtersForm, newForm) {
  
  const elements = filtersForm.querySelectorAll("input, select, textarea");
  
  while (newForm.firstChild) {
    newForm.removeChild(newForm.firstChild);
  }
  for (let i = 0; i < elements.length; ++i) {
    let x = document.createElement("INPUT");
    x.setAttribute("type", 'hidden');
    x.setAttribute("name", elements[i].name);
    x.setAttribute("value", elements[i].value);
    newForm.appendChild(x)
  }
  return newForm;
}

const ButtonMenu = document.querySelector('#ButtonMenu');
if (ButtonMenu) {
  const HeaderContainer = document.querySelector('#Header-container');
  ButtonMenu.addEventListener('click', function () {
    HeaderContainer.classList.toggle('open')
  })
}