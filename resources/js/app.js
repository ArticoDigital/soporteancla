import flatpickr from "flatpickr";
import {Spanish} from "flatpickr/dist/l10n/es"
import subcategories from './subcategories'
import {Delete} from "./Delete";


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

