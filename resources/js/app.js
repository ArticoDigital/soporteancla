import flatpickr from "flatpickr";
import {Spanish} from "flatpickr/dist/l10n/es"
import subcategories from './subcategories'


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

