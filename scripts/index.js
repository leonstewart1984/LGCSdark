/*document.getElementsByName('submit').onclick
const name = document.getElementsByName('fname')
const surname = document.getElementsByName('surname')
const telephone = document.getElementsByName('tel')
const email = document.getElementsByName('email')
const puse = document.getElementsByName('puse')
const propnumber = document.getElementsByName('property_num')
const address = document.getElementsByName('address')
const city = document.getElementsByName('city')
const postcode = document.getElementsByName('postcode')
const proptype = document.getElementsByName('property_type')
const bathrooms = document.getElementsByName('bathrooms')
const bedrooms = document.getElementsByName('bedrooms')
const pictures = document.getElementsByName('pictures')
const cleantype = document.getElementsByName('cleantype')
const windows = document.getElementsByName('windows')
const oven = document.getElementsByName('oven')
const laundry = document.getElementsByName('laundry')
const prefdate = document.getElementsByName('prefdate')
const prefdate2 = document.getElementsByName('prefdate2')
const comments = document.getElementsByName('comments')
const submit = document.getElementsByName('submit')
const data = document.getElementsByName('data')*/

function renderOption() {
    const extraOption = document.querySelector('.ownProductsOff');
    if (extraOption.classList.contains('ownProductsOn')) {
        return;
    }
    else {
    extraOption.classList.add('ownProductsOn');
}}
function removeOption() {
    const extraOption = document.querySelector('.ownProductsOff');
    if (extraOption.classList.contains('ownProductsOn')) {
    extraOption.classList.remove('ownProductsOn');
    document.querySelector('#ownproducts').checked = false;
}}


