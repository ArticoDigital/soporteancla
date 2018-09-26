import flatpickr from "flatpickr";
import { Spanish } from "flatpickr/dist/l10n/es"

flatpickr(".dates", {
    altInput: true,
    "locale": "es",
    mode: "range",
    dateFormat: "Y-m-d",
});