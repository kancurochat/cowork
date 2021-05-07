import { TimepickerUI } from "timepicker-ui";

const start = document.querySelector('#start');
const end = document.querySelector('#end');

const myTimePickerStart = new TimepickerUI(start);
const myTimePickerEnd = new TimepickerUI(end);

myTimePickerStart.create();
myTimePickerEnd.create();
