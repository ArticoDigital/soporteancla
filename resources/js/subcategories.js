const subCategoriesEl = document.querySelector('#service_subcategory'),
    categoriesEl = document.querySelector('#service_category_id'),
    type_category = document.querySelector('#type_category'),
    spreadsheets = document.querySelector('#spreadsheets'),
    other = document.querySelector('#other'),
    album = document.querySelector('#album')
;
let categoriesJson = {};

export default function () {
    if (categoriesEl) {

        categoriesJson = JSON.parse(categoriesEl.dataset.json);

        if (categoriesEl.value !== '') {
            change()

        }
        categoriesEl.addEventListener('change', change);
        subCategoriesEl.addEventListener('change', changeSubcategory)
    }
}

function changeSubcategory() {

    let subCategoryId = subCategoriesEl.options[subCategoriesEl.selectedIndex].value;

    if (parseInt(subCategoryId) === 6) {
        spreadsheets.classList.remove('is-hidden')
        album.classList.remove('is-hidden')
        type_category.classList.remove('is-hidden')
        other.classList.remove('is-hidden')
    } else {
        spreadsheets.classList.add('is-hidden');
        album.classList.add('is-hidden')
        other.classList.add('is-hidden')
    }
}

function change() {
    const oldSubCategories = subCategoriesEl.dataset.old;
    let categoryId = categoriesEl.options[categoriesEl.selectedIndex].value;
    if (categoryId) {
        const c = categoriesJson.find((c) => c.id === parseInt(categoryId));
        subCategoriesEl.disabled = false;
        subCategoriesEl.options.length = 0;
        c.subcategories.forEach(function (el) {
            let option = document.createElement("option");
            option.text = el.name;
            option.value = el.id;
            if (+oldSubCategories === el.id) {
                option.selected = true;
                subCategoriesEl.dataset.old = '';

            }
            subCategoriesEl.add(option);

        });



    } else {
        subCategoriesEl.disabled = true;
    }

    changeSubcategory();
}
