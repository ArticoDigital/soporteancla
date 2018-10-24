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
if (arrow) {
  arrow.addEventListener('click', function () {
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

